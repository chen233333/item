<?php 
//有表单数据
if(isset($_POST['username'])){
	//取出表单数据
	$username = $_POST['username'];
	$password = sha1($_POST['password']);
	//查询数据库验证
	include_once 'dbconfig.php';
	$sql = "select * from user where username=:username and password=:password";
	$statmentObj = $pdo->prepare($sql);
	$data = array(
			"username" =>$username,
			"password" =>$password
	);
	$ret = $statmentObj->execute($data);
	if($ret){
		$result = $statmentObj->fetch();
		//有数据
		if($result){
			//验证通过
			session_start();
			$_SESSION['userLogined'] = $username;
			header("location:jump.php?error=登录成功&url=index.php&wait=2");
			exit();
		}else{
			echo "<font color='red'>用户名或者密码错,请重试</font><br/>";
			header("location:jump.php?error=用户名或者密码错,请重试&url=login.php&wait=2");
		}
	}else{
		header("location:jump.php?error=系统内部错&url=login.php&wait=2");
	}
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>非授课工作量管理系统</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->

</head>
<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2>管理员登录</h2>
               
                <h5>(授权访问 )</h5>
                 <br />
            </div>
        </div>
         <div class="row ">
               
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>   输入详细信息 </strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form" action='login.php' method='post'>
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input name='username' type="text" class="form-control" placeholder="你的账号 " />
                                        </div>
                                                                              <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input name='password' type="password" class="form-control"  placeholder="你的密码" />
                                        </div>
                                    <div class="form-group">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" /> 记住我
                                            </label>
                                            <span class="pull-right">
                                                   <a href="#" >忘记密码 ? </a> 
                                            </span>
                                        </div>
                                     <input type='submit' class="btn btn-primary" value='登录'/>
                                    <hr />
                                    		未注册 ? <a href="registeration.html" >点我 </a> 
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>
