<?php
$menu = 'jichushuju';
//有表单数据
if(isset($_POST['baseKey'])){
    //取出表单数据
    $baseKey = $_POST['baseKey'];
    $content = $_POST['content'];
    //查询数据库验证
    include_once 'dbconfig.php';
    $sql = "insert basedata2(baseKey,content) values(:baseKey,:content)";
    $statmentObj = $pdo->prepare($sql);
    $data = array(
        "baseKey" =>$baseKey,
        "content" =>$content
    );
    $ret = $statmentObj->execute($data);
    if($ret){
        header("location:jump.php?error=数据保存成功!&url=jichushuju.php&wait=2");
    }else{
        echo "访问数据库失败";
        header("location:jump.php?error=访问数据库失败!&url=jichushuju.php&wait=2");
    }
    exit();
}
include_once 'head.php';
?>
 <!-- /. NAV SIDE  -->
 <script>
function testEmpty(){
	var baseKey = document.getElementById("baseKey").value;
	var content = document.getElementById("content").value;
	if(baseKey==""||content==""){
		alert("键名 和 内容 不能为空!");
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
				<h2 align='center'>录入基础数据</h2>
			</div>
		</div>
		<!-- /. ROW  -->
		<hr />
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>增加基础数据</strong>
					</div>
					<div class="panel-body">
						<form role="form" action="insertjichushuju.php" method='post' onsubmit="return testEmpty()">
							<br />
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag">
										键名</i></span> <input type="text" class="form-control"
									placeholder="键名 " name='baseKey' id="baseKey" maxlength="32" />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag">
										内容</i></span> <input type="text" class="form-control"
									placeholder="内容 " name='content' id="content" maxlength="32" />
							</div>
							<input type='reset'  class="btn btn-primary" value=' 重 置 ' />&nbsp;&nbsp;
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