<?php 
$menu = 'index';
//有表单数据
if(isset($_POST['departmentName'])){
	//取出表单数据
	$departmentName = $_POST['departmentName'];
	$dutyPerson = $_POST['dutyPerson'];
	//查询数据库验证
	include_once 'dbconfig.php';
	$sql = "insert department(departmentName,dutyPerson) values(:departmentName,:dutyPerson)";
	$statmentObj = $pdo->prepare($sql);
	$data = array(
			"departmentName" =>$departmentName,
	    "dutyPerson" =>content
	);
	$ret = $statmentObj->execute($data);
	if($ret){
		header("location:jump.php?error=数据保存成功!&url=index.php&wait=2");
	}else{
		echo "访问数据库失败";
		header("location:jump.php?error=访问数据库失败!&url=index.php&wait=2");
	}
	exit();
}
include_once 'head.php';
?>
 <!-- /. NAV SIDE  -->
 <script>
function testEmpty(){
	var departmentName = document.getElementById("departmentName").value;
	var dutyPerson = document.getElementById("dutyPerson").value;
	if(departmentName==""||dutyPerson==""){
		alert("部门名称 和 责任人 不能为空!");
		return false;
	}else{
		return true;
	}
}
</script>
<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2 align='center'>录入用户信息</h2>
			</div>
		</div>
		<!-- /. ROW  -->
		<hr />
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>增加部门信息</strong>
					</div>
					<div class="panel-body">
						<form role="form" action="insertdepartment.php" method='post' onsubmit="return testEmpty()">
							<br />
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag">
										部门名称</i></span> <input type="text" class="form-control"
									placeholder="用户名 " name='departmentName' id="departmentName" maxlength="32" />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag">
										责任人</i></span> <input type="text" class="form-control"
									placeholder="责任人 " name='dutyPerson' id="dutyPerson" maxlength="32" />
							</div>
							<input type='reset'  class="btn btn-primary" value=' 重 置 ' />&nbsp;&nbsp;
							<input type='submit'  class="btn btn-primary" value=' 保 存 ' />&nbsp;&nbsp;&nbsp;&nbsp;
							<a class="btn btn-primary" href="user.php">放弃</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="foot-wrapper" align='center'>
			版权所有@2017-2020，计算机与设计学院<br /> 非授课工作量管理系统，网址：<a
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