<?php 
session_start();
if(!isset($_SESSION['logined'])){
	header("location:login.php");
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
     <!-- MORRIS CHART STYLES-->
   
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">ckr非授课管理</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> 用户名：<?=$_SESSION['logined']?> &nbsp; <a href="loginout.php" class="btn btn-danger square-btn-adjust">退出</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/head.jpg" class="user-image img-responsive"/>
					</li>
                    <li>
                        <a <?='index'==$menu?'class="active-menu"':''?>  href="index.php"><i class="fa fa-dashboard fa-3x"></i>部门管理</a>
                    </li>
                  	<li>
                        <a <?='user'==$menu?'class="active-menu"':''?>  href="user.php"><i class="fa fa-dashboard fa-3x"></i>教师管理</a>
                    </li>
                    <li>
                        <a <?='workshenghe'==$menu?'class="active-menu"':''?>  href="workshenghe.php"><i class="fa fa-dashboard fa-3x"></i>非工作量审核</a>
                    </li>
                    <li>
                        <a <?='report'==$menu?'class="active-menu"':''?>  href="report.php"><i class="fa fa-dashboard fa-3x"></i>统计工作量</a>
                    </li>
                    <li>
                        <a <?='jichushuju'==$menu?'class="active-menu"':''?>  href="jichushuju.php"><i class="fa fa-dashboard fa-3x"></i>基础数据</a>
                    </li>
                     <li>
                        <a <?='sh'==$menu?'class="active-menu"':''?>  href="sh.php"><i class="fa fa-dashboard fa-3x"></i>工作量审核</a>
                    </li>
                </ul>
               
            </div>
        </nav>  
 