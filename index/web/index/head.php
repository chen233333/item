<?php 
session_start();
if(!isset($_SESSION['userLogined'])){
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
     <link href="assets/css/hu.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
   
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <script type="text/javascript" src="assets/js/hu.js"></script>
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
font-size: 16px;"> 用户名：<?=$_SESSION['userLogined']?> &nbsp;
 <a href="loginout.php" class="btn btn-danger square-btn-adjust">退出</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/head.jpg" class="user-image img-responsive"/>
					</li>
                    <li>
                        <a <?='index'==$menu?'class="active-menu"':''?>  href="index.php"><i class="fa fa-dashboard fa-3x"></i>授课工作量</a>
                    </li>
                  	<li>
                        <a <?='mywork'==$menu?'class="active-menu"':''?>  href="mywork.php"><i class="fa fa-dashboard fa-3x"></i>非授课工作量</a>
                    </li>
                    <li>
                        <a <?='myreport'==$menu?'class="active-menu"':''?>  href="myreport.php"><i class="fa fa-dashboard fa-3x"></i>统计工作量</a>
                    </li>
                </ul>
               
            </div>
        </nav>  
 