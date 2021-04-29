<?php
$menu = 'mywork';
//管理员授权//////////////////
include_once 'dbconfig.php';
//////////////////////////
if (filter_input(INPUT_POST, 'year')) {
	$data = $_POST;
	//数据补全
	session_start();
	$data["teacherId"]=$_SESSION['userLogined'];
	$data["recorder"]=$_SESSION['userLogined'];
	//强制数据状态
	if($data["status"]=="确认"){
		$data["status"]=="保存";
	}
	$statement = "INSERT INTO work(id, year, teacherId,bigType, typeName,rankName, content, amountClass, classHour,amountMoney, money,recorder,status)" .
			" VALUES (null, :year, :teacherId,:bigType,:typeName,:rankName,:content,:amountClass,:classHour,:amountMoney, :money,:recorder,:status)";
	$statementObject = $pdo->prepare($statement);
	$result = $statementObject->execute($data);
	if ($result) {
		$newId = $pdo->lastInsertId();
		if($data["status"]=="待审"){
			header("location:mywork.php?id=$newId");
		}else{
			header("location:editmywork.php?id=$newId");
		}
	} else {
		header("location:jump.php?error=数据保存失败&url=mywork.php&wait=2");
	}
	exit();
}

//查询basedata3中年份
$statementObject = $pdo->prepare("select * from basedata3");
$statementObject->execute();
$basedata3 = $statementObject->fetch(PDO::FETCH_ASSOC);
$workYear = $basedata3['content'];

//查询变量初始化
$bigType = "";
$type = "";
$name = "";
//查询大类
$queryType = "select distinct bigType from bigtype order by id";
$queryTypeObject = $pdo->prepare($queryType);
$queryTypeObject->execute();
$bigTypeList = $queryTypeObject->fetchAll();
include_once 'head.php';
?>
<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2 align='center'>录入非授课工作量</h2>
			</div>
		</div>
		<!-- /. ROW  -->
		<hr />
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>增加非授课工作量</strong>
					</div>
					<div class="panel-body">
						<form role="form" id='workform' action="insertmywork.php" method='post'>
							<br />
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag"> 年度</i></span>
								<select class="form-control" name="year">
            						<?php
									//用php代码来实现
									echo '<option value="'.($workYear-2).'" >'.($workYear-2).'年</option>';
									echo '<option value="'.($workYear-1).'" >'.($workYear-1).'年</option>';
									echo '<option value="'.$workYear.'" selected>'.$workYear.'年</option>';
									echo '<option value="'.($workYear+1).'" >'.($workYear+1).'年</option>';
									echo '<option value="'.($workYear+2).'" >'.($workYear+2).'年</option>';
									?>
            					</select>
								<span class="input-group-addon"><i class="fa fa-flag">&nbsp;大类</i></span>
								<select class="form-control" id="bigType" name="bigType" onchange="javascript:selectBigType();">
								    <?php 
								        echo "<option value=''>--请选择大类--</option>";
								        foreach ($bigTypeList as $row){
								            $bigTypeOption = $row['bigType'];
								           echo "<option value='$bigTypeOption'> $bigTypeOption </option>";
								        }
								    ?>
								</select>
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-flag">&nbsp;类别</i></span>
								<select class="form-control" name="typeName" id="typeNameOption" onchange="javascript:selectRank();" disabled="disabled">
								</select>
								<span class="input-group-addon"><i class="fa fa-level-up">
										&nbsp;级别</i></span> 
								<select class="form-control" name="rankName" id="rankNameOption" disabled="disabled" onchange="javascript:getLmitRange();">
								</select>
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-navicon">&nbsp;要求</i></span>
								<textarea class="form-control" rows="3" placeholder="绩效考核政策" id='policy'
									name='policy' disabled='disabled'></textarea>
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-navicon">&nbsp;内容</i></span>
								<textarea class="form-control" rows="5" placeholder="工作内容(本编辑框可缩放)" id='content'  maxlength="499" 
									name='content'></textarea>
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-clock-o">&nbsp;任务折算课时规则</i></span>
								<input class="form-control" class="form-control" style="width:50%;"  type="text" id="classHour" disabled="disabled"  maxlength="10" 
									name='classHour'  onkeyup="javascript:checkAmount(this);"/>
								<input  type="text"  class="form-control" style="width:50%;"  id="classUnit" name="classUnit"  disabled="disabled"  maxlength="10" />
							</div>
							<div class="form-group input-group" id="amountdiv">
							    <span class="input-group-addon"><i class="fa fa-clock-o">&nbsp;折算课时的任务量</i></span>
								<input type="text" class="form-control"  style="width:50%;"  id="amountClass" name="amountClass" maxlength="10"  value='1.0'
								onkeyup="javascript:checkAmount(this);"/>
								<input type="text" class="form-control"  style="width:50%;"  id="classUnit2" name="classUnit2"  disabled="disabled"  maxlength="10" />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-yen"> &nbsp;奖励分值计算规则</i></span>
								<input type="text" class="form-control"  style="width:50%;" id="money" 	name='money' maxlength="10"  
								disabled="disabled"  onkeyup="javascript:checkRange(this);"/>
								<input type="text" class="form-control"  style="width:50%;" id="moneyUnit" name="moneyUnit"  disabled="disabled"  maxlength="10" />
							</div>
							<div class="form-group input-group" id="amountdiv">
							    <span class="input-group-addon"><i class="fa fa-clock-o">&nbsp;计算分值的任务量</i></span>
								<input type="text" class="form-control"  style="width:50%;" id="amountMoney" name="amountMoney" maxlength="10" value='1.0' 
								onkeyup="javascript:checkAmount(this);"/>
								<input type="text" class="form-control"  style="width:50%;" id="moneyUnit2" name="moneyUnit2"  disabled="disabled"  maxlength="10" />
							</div>
							<input type="hidden" id="status" name="status" value="保存"/>
 							<input type='reset' class="btn btn-primary" value=' 重 置 ' />&nbsp;&nbsp;&nbsp;&nbsp;
							<input type='button' name="save" onclick="javascript:mysubmit(this);" class="btn btn-primary" value=' 保 存 ' />&nbsp;&nbsp;&nbsp;&nbsp;
							<a class='btn btn-primary btn-sm shiny' disabled="disabled" href='#'><i class='fa fa-edit'>上传材料</i></a>&nbsp;&nbsp;&nbsp;&nbsp;
							<input type='button' name="submitCheck" onclick="javascript:mysubmit(this);" class="btn btn-primary" value=" 送审" />&nbsp;&nbsp;&nbsp;&nbsp;
							<a class="btn btn-primary" href="mywork.php">放弃</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="foot-wrapper" align='center'>
			版权所有@2017-<?=date("Y")?>，计算机与设计学院<br /> 非授课工作量管理系统，网址：<a
		href='www.betgod.top/workload'>www.betgod.top/workload</a> <br /> <br />
</div>
<!-- /. PAGE WRAPPER  -->
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="./assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="./assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="./assets/js/jquery.metisMenu.js"></script>
</body>
</html>