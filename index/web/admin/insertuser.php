<?php
$menu = 'user';
//有表单数据
include_once 'dbconfig.php';
if(isset($_POST['userId'])){
    //取出表单数据
    $username = $_POST['username'];
    $userId = $_POST['userId'];
    $role= $_POST['role'];
    $name = $_POST['name'];
    $departmentName = $_POST['departmentName'];
    $status= $_POST['status'];
    //查询数据库验证
    $sql = "insert user (username,userId,role,name,departmentName,status) 
values(:username,:userId,:role,:name,:departmentName,:status)";
    $statmentObj = $pdo->prepare($sql);
    $data = array(
        "username" =>$username,
        "userId" =>$userId,
        "role" =>$role,
        "name" =>$name, 
        "departmentName" =>$departmentName,
        "status" =>$status
    );
    $ret = $statmentObj->execute($data);
    if($ret){
        header("location:jump.php?error=数据保存成功!&url=user.php&wait=2");
    }else{
        echo "访问数据库失败";
        header("location:jump.php?error=访问数据库失败!&url=user.php&wait=2");
    }
    exit();
}
include_once 'head.php';
?>
 <!-- /. NAV SIDE  -->
 <script>
function testEmpty(){
	var username = document.getElementById("username").value;
	var userId = document.getElementById("userId").value;
	var role = document.getElementById("role").value;
	var name = document.getElementById("name").value;
	var departmentName = document.getElementById("departmentName").value;
	var status = document.getElementById("status").value;
	if(username==""||userId==""||role==""||name==""||departmentName==""||status==""){
		alert("用户名和用户ID和用户类型和姓名和部门和密码和状态 不能为空!");
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
				<h2 align='center'>录入教师管理</h2>
			</div>
		</div>
		<!-- /. ROW  -->
		<hr />
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>增加教师信息</strong>
					</div>
					<div class="panel-body">
						<form role="form" action="insertuser.php" method='post' onsubmit="return testEmpty()">
							<br />                              
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag">
										用户名</i></span> <input type="text" class="form-control"
									placeholder="用户名 " name='username' id="username" maxlength="32" />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag">
										用户ID</i></span> <input type="text" class="form-control"
									placeholder="用户ID " name='userId' id="userId" maxlength="32" />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag">
										用户类型</i></span> <input type="text" class="form-control"
									placeholder="用户类型 " name='role' id="role" maxlength="32" />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag">
										姓名</i></span> <input type="text" class="form-control"
									placeholder="姓名 " name='name' id="name" maxlength="32" />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag">
										部门</i></span> <input type="text" class="form-control"
									placeholder="部门 " name='departmentName' id="departmentName" maxlength="32" />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag">
										状态</i></span> <input type="text" class="form-control"
									placeholder="状态 " name='status' id="status" maxlength="32" />
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