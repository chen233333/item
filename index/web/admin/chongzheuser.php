<?php
$menu = 'user';
include_once 'head.php';
include_once 'dbconfig.php';
//有表单数据
//取出id
if (!isset($_GET['id'])){
    header("location:jump.php?error=数据保存成功!&url=user.php&wait=2");
}
$id=$_GET['id'];
if(isset($_POST['password'])){
    $sql="UPDATE user SET password=:password WHERE id=:id";
    $statmentObj = $pdo->prepare($sql);
    $ret = $statmentObj->execute($_POST);
}
//查询数据库中学生信息
$sql="select * from user where id=:id";
$statmentObj = $pdo->prepare($sql);
$ret = $statmentObj->execute(array("id"=>$id));
if($ret){
    //取出一行数据
    $result=$statmentObj->fetch(PDO::FETCH_ASSOC);
}else{
    echo "访问数据库失败！";
    //  header("location:jump.php?error=访问数据库失败!&url=user.php&wait=2");
}
?>
 <!-- /. NAV SIDE  -->  
 <script>
// function testEmpty(){
// 	var departmentName = document.getElementById("departmentName").value;
// 	var userId = document.getElementById("userId").value;
// 	if(departmentName==""||userId==""){
// 		alert("部门名称 和 责任人 不能为空!");
// 		return false;
// 	}else{
// 		return true;
// 	}
// }
</script>
<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2 align='center'>编辑教师信息</h2>
			</div>
		</div>
		<!-- /. ROW  -->
		<hr />
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>编辑教师信息</strong>
					</div>
					<div class="panel-body">
						<form role="form" action="chongzheuser.php" method='post' onsubmit="return testEmpty()">
						<br />
							<input type='hidden' name='id' value="<?=$result['id']?>" />
							<div class="form-group input-group">
							<span class="input-group-addon"><i class="fa fa-tag">
										密码</i></span> <input type="text" class="form-control"
									placeholder="密码" name='password' value="<?=$result['password']?>" maxlength="32" />
							</div>
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