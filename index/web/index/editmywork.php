<?php
$menu = 'mywork';
include_once 'head.php';
//管理员授权//////////////////
include_once 'dbconfig.php';

if (filter_input(INPUT_GET, 'id')) {
	// 查询数据
	$data = array(
			"id" => $_GET['id'],
			"teacherId" => $_SESSION['userLogined']
	);
	$statement = "select * from work where id = :id and teacherId=:teacherId";
	$statementObject = $pdo->prepare($statement);
	$statementObject->execute($data);
	$result = $statementObject->fetch();
	if (! $result) {
		header("location:jump.php?error=无有效数据&url=mywork.php&wait=2");
	}
	//上传地址
	$uploadurl = "upload.php?id=" . $result['id'];
	//查询限制范围
	$typeName = $result["typeName"];
	$rankName = $result["rankName"];
	$data2 = array(
			"typeName" => $typeName,
			"rank" => $rankName
	);
	$rangeStatement = "select * from worktype where typeName=:typeName and rank=:rank";
	$rangeObject = $pdo->prepare($rangeStatement);
	$rangeObject->execute($data2);
	$limitRange = $rangeObject->fetch();
} elseif (filter_input(INPUT_POST, 'year')) {
	//保存提交的数据
	$data = $_POST;
	//数据补全
	$data["teacherId"] = $_SESSION['userLogined'];
	$data["recorder"] = $_SESSION['userLogined'];
	//强制数据状态
	if($data["status"]=="确认"){
		$data["status"]=="保存";
	}
	$statement = "update work set year=:year, teacherId=:teacherId, bigType=:bigType, 
                typeName=:typeName,rankName=:rankName,".
			"content=:content, amountClass=:amountClass, classHour=:classHour,
 amountMoney=:amountMoney,money=:money,recorder=:recorder,status=:status where id=:id";
	$statementObject = $pdo->prepare($statement);
	$result = $statementObject->execute($data);
	if ($result) {
	    $newId = $pdo->lastInsertId();
	    if($data["status"]=="待审"){
	        header("location:mywork.php?id=$newId");
	    }else{
	        header("location:editmywork.php?id=$newId");
	    }
	
	exit();
}
}

//查询basedata3中年份
$statementObject = $pdo->prepare("select * from basedata3");
$statementObject->execute();
$basedata3 = $statementObject->fetch(PDO::FETCH_ASSOC);
$workYear = $basedata3['content'];

//查询大类
$queryType = "select distinct bigType from worktype order by bigType";
$queryTypeObject = $pdo->prepare($queryType);
$queryTypeObject->execute();
$bigTypeList = $queryTypeObject->fetchAll();
?>

<script src="assets/js/hu.js"></script>
<script>
function openmywindow(id) {
	var openUrl = "upload.php?id=" + id;
	var iWidth = 500; // 弹出窗口的宽度;
	var iHeight = 400; // 弹出窗口的高度;
	var iTop = (window.screen.availHeight - 30 - iHeight) / 2; // 获得窗口的垂直位置;
	var iLeft = (window.screen.availWidth - 10 - iWidth) / 2; // 获得窗口的水平位置;
	window.open(openUrl, "", "height=" + iHeight + ", width=" + iWidth
			+ ", top=" + iTop + ", left=" + iLeft
			+ ",location=no,menubar=no,titlebar=no,toolbar=no,resizable=no,scrollbars=no");
}
</script>
<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2 align='center'>修改非授课工作量</h2>
			</div>
		</div>
		<!-- /. ROW  -->
		<hr />
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>编辑非授课工作量</strong>
					</div>
					<div class="panel-body">
						<form role="form" id="workform" action="editmywork.php" method='post'>
						    <input type="hidden" name='id' value="<?=$result['id']?>" />
							<br />
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag"> 年度</i></span>
								<select class="form-control" name="year">
								<?php
            						echo '<option value="'.($workYear-2).'" >'.($workYear-2).'年</option>';
									echo '<option value="'.($workYear-1).'" >'.($workYear-1).'年</option>';
									echo '<option value="'.$workYear.'" selected>'.$workYear.'年</option>';
									echo '<option value="'.($workYear+1).'" >'.($workYear+1).'年</option>';
									echo '<option value="'.($workYear+2).'" >'.($workYear+2).'年</option>';
								?>
								</select>
								<span class="input-group-addon"><i class="fa fa-flag">&nbsp;大类</i></span>
								<select class="form-control" name="bigType" id="bigType"  onchange="javascript:selectBigType();">
								    <?php 
								        echo "<option value=''>--请选择大类--</option>";
                                        foreach ($bigTypeList as $row){
								            $bigTypeOption = $row['bigType'];
								           echo "<option value='$bigTypeOption'". ($result['bigType']==$bigTypeOption?"selected":"").">$bigTypeOption </option>";
								        }
								    ?>
								</select>
							</div>
							<div class="form-group input-group">	
								<span class="input-group-addon"><i class="fa fa-flag">&nbsp;类别</i></span>
								<select class="form-control" name="typeName" id="typeNameOption" onchange="javascript:selectRank();" disabled="disabled">
								<option value="<?=$result['typeName']?>" selected ><?=$result['typeName']?></option>
								</select>
								<span class="input-group-addon"><i class="fa fa-level-up">
										&nbsp;级别</i></span> 
								<select class="form-control" name="rankName" id="rankNameOption" disabled="disabled" 
								onchange="javascript:getLmitRange();">
								   <option value="<?=$result['rankName']?>" selected ><?=$result['rankName']?></option>
								</select>
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-navicon">&nbsp;要求</i></span>
								<textarea class="form-control" rows="3" placeholder="绩效考核政策" id='policy'
									name='policy' disabled='disabled'><?=$limitRange['content'] ?></textarea>
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-navicon">&nbsp;内容</i></span>
								<textarea class="form-control" rows="5"  placeholder="工作内容(本编辑框可缩放)"  id="content" maxlength="499" 
									name='content'><?=$result['content']?></textarea>
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-clock-o">&nbsp;任务折算课时规则</i></span>
								<input type="text" class="form-control"  style="width:50%;" id="classHour" maxlength="10" 
								name='classHour' onkeyup="javascript:checkRange(this);" 
								<?php 
								echo " value='".$result['classHour']."' ";
								if($limitRange['classHour']===""){
									echo "placeholder= '范围：[".$limitRange['minClassHour'].",".$limitRange['maxClassHour']."]' ";
								    echo " alt='' max='".$limitRange['maxClassHour']."' min='".$limitRange['minClassHour']."' ";  
								}else{
									echo ' disabled="disabled" '."alt='".$limitRange['classHour']."' max='' min='' ";
								}
								?>
								/>
								<input type="text" class="form-control" style="width:50%;" id="classUnit" name="classUnit"  disabled="disabled"  maxlength="10" 
								 value="课时  / <?=$limitRange['classUnit']?>" />
							</div>
							<div class="form-group input-group" id="amountdiv">
							    <span class="input-group-addon"><i class="fa fa-clock-o">&nbsp;折算课时的任务量</i></span>
								<input type="text" class="form-control" style="width:50%;" id="amountClass" name="amountClass" maxlength="10" 
								onkeyup="javascript:checkAmount(this);" 
								<?php
								echo " value='".$result['amountClass']."' ";
								if($limitRange['classHour']===""){
									//单价不固定,则数量一般会固定为1
									echo ' disabled="disabled" '." alt='".$limitRange['classHour']."' max='' min='' ";  
								}else{
									if($limitRange['maxClassHour']===$limitRange['minClassHour']){
										echo ' disabled="disabled" '." alt='".$limitRange['classHour']."' max='' min='' ";  
									}else{
										echo "placeholder= '范围：[".$limitRange['minClassHour'].",".$limitRange['maxClassHour']."]' ";
										echo " alt='' max='".$limitRange['maxClassHour']."' min='".$limitRange['minClassHour']."' ";  
									}
								}
								?>/>
								<input type="text" class="form-control" style="width:50%;" id="classUnit2" name="classUnit2"  disabled="disabled"  maxlength="10" 
								 value="<?=$limitRange['classUnit']?>" />
							</div>			
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-yen"> &nbsp;奖励分值计算规则</i></span>
								<input type="text" class="form-control" style="width:50%;"  id="money" 	name='money' maxlength="10" 
								<?php 
								echo " value='".$result['money']."' ";
								if($limitRange['price']===""){
									//自由填写规则
									echo "placeholder= '范围：[".$limitRange['minPrice'].",".$limitRange['maxPrice']."]'";
								    echo " alt='' max='".$limitRange['maxPrice']."' min='".$limitRange['minPrice']."' ";  
								}else{
									//有固定单价
								    echo ' disabled="disabled" '."alt='".$limitRange['price']."' max='' min='' ";
								}
								?>
								onkeyup="javascript:checkRange(this);"/>
								<input type="text" class="form-control"  style="width:50%;"  id="moneyUnit" name="moneyUnit"  disabled="disabled"  maxlength="10"
								 value="分   / <?=$limitRange['moneyUnit']?>" />
								 
							</div>
							<div class="form-group input-group" id="amountdiv">
							    <span class="input-group-addon"><i class="fa fa-clock-o">&nbsp;计算分值的任务量</i></span>
								<input type="text" class="form-control" style="width:50%;"  id="amountMoney" name="amountMoney" maxlength="10"
								<?php
								echo " value='".$result['amountMoney']."' ";
								if($limitRange['price']===""){
									//没有限定单价,则一定限制数量为1
									echo  ' disabled="disabled" '." alt='".$limitRange['price']."' max='' min='' ";  
								}else{
									//有固定单价，此处有数量范围
									if($limitRange['minPrice']===$limitRange['maxPrice']){
										//不计算奖励的情况
										echo  ' disabled="disabled" '." alt='".$limitRange['price']."' max='' min='' ";  
									}else{
										echo "placeholder= '范围：[".$limitRange['minPrice'].",".$limitRange['maxPrice']."]' ";
										echo " alt='' max='".$limitRange['maxPrice']."' min='".$limitRange['minPrice']."' "; 
									}
								}
								?>
								onkeyup="javascript:checkAmount(this);"/>
								<input type="text" class="form-control"  style="width:50%;" id="moneyUnit2" name="moneyUnit2"  disabled="disabled"  maxlength="10"
								 value="<?=$limitRange['moneyUnit']?>" />
							</div>
							<input type="hidden" id="status" name="status" value="保存"/>
							<input type='button' name="save" onclick="javascript:mysubmit(this);" class="btn btn-primary" value=' 保 存 ' />&nbsp;&nbsp;&nbsp;
							<input type='button' class='btn btn-primary btn-sm shiny' onclick="javascript:openmywindow(<?=$result['id']?>);" value="上传材料" />&nbsp;&nbsp;&nbsp;
							<input type='button' name="submitCheck" onclick="javascript:mysubmit(this);" class="btn btn-primary" value=" 送审" />&nbsp;&nbsp;&nbsp;
							<a class="btn btn-primary" href="mywork.php">放弃</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
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