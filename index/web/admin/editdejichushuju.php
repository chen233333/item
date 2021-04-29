<?php
$menu = 'jichushuju';
include_once 'head.php';
include_once 'dbconfig.php';

if(!isset($_GET['id'])){
    header("location:jump.php?error=数据保存成功!&url=jichushuju.php&wait=2");
}
$id = $_GET['id'];
if(isset($_POST['baseKey'])){
    //查询数据库验证
    $sql = "update basedata2 set baseKey=:baseKey,content=:content where id=:id";
    $statmentObj = $pdo->prepare($sql);
    $ret = $statmentObj->execute($_POST);
}
//查询数据库中学生信息
$sql = "select * from basedata2 where id=:id";
$statmentObj = $pdo->prepare ( $sql );
$ret = $statmentObj->execute (array("id"=>$id));
if ($ret) {
    // 取出一行数据
    $result = $statmentObj->fetch( PDO::FETCH_ASSOC );
} else {
    header("location:jump.php?error=访问数据库失败!&url=index.php&wait=2");
}


?>
 <!-- /. NAV SIDE  -->

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
						<strong>编辑基础数据</strong>
					</div>
					<div class="panel-body">
						<form role="form" action="editdejichushuju.php" method='post' onsubmit="return testEmpty()">
							<br />
							<input type='hidden' name='id' value="<?=$result['id']?>" />
							
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag">
										键名</i></span> <input type="text" class="form-control"
									placeholder="键名" name='baseKey' id="baseKey" maxlength="32"   value="<?=$result['baseKey']?>" />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag">
										内容</i></span> <input type="text" class="form-control"
									placeholder="内容" name='content' id="content" maxlength="32"   value="<?=$result['content']?>" />
							</div>
							<input type='submit'  class="btn btn-primary" value=' 保 存 ' />&nbsp;&nbsp;&nbsp;&nbsp;
							<a class="btn btn-primary" href="jichushuju.php">放弃</a>
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