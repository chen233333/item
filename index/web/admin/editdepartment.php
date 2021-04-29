<?php 
$menu = 'index';
//有表单数据
include_once 'dbconfig.php';
if(isset($_POST['departmentName'])){
	//查询数据库验证
	$sql = "update department set departmentName=:departmentName,dutyPerson=:dutyPerson where id=:id";
	$statmentObj = $pdo->prepare($sql);
	$ret = $statmentObj->execute($_POST);
	if($ret){
		header("location:jump.php?error=数据保存成功!&url=index.php&wait=2");
	}else{
		header("location:jump.php?error=访问数据库失败!&url=index.php&wait=2");
	}
	exit();
}elseif(isset($_GET['id'])){
	$id = $_GET['id'];
	//查询数据库中学生信息
	$sql = "select * from department where id=:id";
	$statmentObj = $pdo->prepare ( $sql );
	$ret = $statmentObj->execute (array("id"=>$id));
	if ($ret) {
		// 取出一行数据
		$result = $statmentObj->fetch( PDO::FETCH_ASSOC );
	} else {
		header("location:jump.php?error=访问数据库失败!&url=index.php&wait=2");
	}
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
				<h2 align='center'>编辑部门信息</h2>
			</div>
		</div>
		<!-- /. ROW  -->
		<hr />
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>编辑部门信息</strong>
					</div>
					<div class="panel-body">
						<form role="form" action="editdepartment.php" method='post' onsubmit="return testEmpty()">
							<br />
							<input type='hidden' name='id' value="<?=$result['id']?>" />
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag">
										部门名称</i></span> <input type="text" class="form-control"
									placeholder="用户名 " name='departmentName' id="departmentName" maxlength="32"  value="<?=$result['departmentName']?>" />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag">
										责任人</i></span> <input type="text" class="form-control"
									placeholder="责任人 " name='dutyPerson' id="dutyPerson" maxlength="32"   value="<?=$result['dutyPerson']?>" />
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