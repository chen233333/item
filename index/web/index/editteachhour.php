<?php
$menu = 'index';
//有表单数据
include_once 'dbconfig.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    //查询数据库中学生信息
    $sql = "select * from teachhour where id=:id";
    $statmentObj = $pdo->prepare ( $sql );
    $ret = $statmentObj->execute (array("id"=>$id));
    if ($ret) {
        // 取出一行数据
        $result = $statmentObj->fetch( PDO::FETCH_ASSOC );
    } else {
        header("location:jump.php?error=访问数据库失败!&url=index.php&wait=2");
    }
}
//查询basedata3中年份
$statementObject = $pdo->prepare("select * from basedata3");
$statementObject->execute();
$basedata3 = $statementObject->fetch(PDO::FETCH_ASSOC);
$workYear = $basedata3['content'];

include_once 'head.php';
?>
 <!-- /. NAV SIDE  -->
 <script>

</script>
<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2 align='center'>查看信息</h2>
			</div>
		</div>
		<!-- /. ROW  -->
		<hr />
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>查看信息</strong>
					</div>
					<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag">
										年度</i></span> <input type="text" class="form-control"
									placeholder="年度 " name='classHour' id="year" maxlength="32"  value="<?=$result['year']?>" />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag">
										学时数</i></span> <input type="text" class="form-control"
									placeholder="学时数 " name='classHour' id="classHour" maxlength="32"  value="<?=$result['classHour']?>" />
							</div>
							
							<a class="btn btn-primary" href="index.php">关闭</a>
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