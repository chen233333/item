<?php 
$menu = 'index';
include_once 'head.php';
//有表单数据
if(isset($_POST['classHour'])){
	include_once 'dbconfig.php';
	$sql = "insert teachhour(year,teacherId,classHour,status,recorder) values(:year,:teacherId,:classHour,:status,:recorder)";
	$statmentObj = $pdo->prepare($sql);
	$_POST['teacherId'] = $_SESSION["userLogined"];
	$_POST['recorder'] = $_SESSION["userLogined"];
	$ret = $statmentObj->execute($_POST);
	if($ret){
		header("location:jump.php?error=数据保存成功!&url=index.php&wait=2");
	}else{
		echo "访问数据库失败";
		header("location:jump.php?error=访问数据库失败!&url=index.php&wait=2");
	}
	exit();
}
?>
 <!-- /. NAV SIDE  -->

 <!-- /. NAV SIDE  --><script>
function pickName()
{
    window.open("pickname.php","_blank",
        "height=100,width=400,left=300,top=500,location=no,"+
        "menubar=no,titlebar=no,toolbar=no,resizable=no,scrollbars=no"
    );
}

//前端做数据完整性校验
function mysubmit(submitType) {
	//读取数据
	var classHour = document.getElementById("classHour").value;
	if(classHour==""){
		alert("数据不完整，请数据补充完整！");
	}else{
		//数据范围校验
		var isok = true;
		var textobj =  document.getElementById("classHour");
		textobj.value=textobj.value.replace(/([\d-]+)[\D]|[^-^\d]/g,"$1");
		if(textobj.value==""){
			alert("课时量必须填入整数");
		}else{
			var workform = document.getElementById("workform");
			var status = document.getElementById("status");
			 if(submitType.name=="submitCheck"){
				status.value="待审";
			}else if(submitType.name=="ok"){
				status.value="确认";
			}
			workform.submit();
		}
	}
}

function GetXmlHttpObject()
{
    var xmlHttp=null;
    try{
     	//Firefox, Opera 8.0+, Safari
     	xmlHttp=new XMLHttpRequest();
    }catch (e){
        // Internet Explorer
        try{
          xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
        }catch (e){
          xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}

function checkRange(textobj){
	textobj.value=textobj.value.replace(/([\d-]+)[\D]|[^-^\d]/g,"$1");
}
</script>
<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2 align='center'>录入教学工作量</h2>
			</div>
		</div>
		<!-- /. ROW  -->
		<hr />
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong>录入教学工作量</strong>
					</div>
					<div class="panel-body">
						<form role="form" id="workform" action="insertteachhour.php" method='post'>
							<br />
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-tag"> 年度</i></span>
								<select class="form-control" name="year">
            						<option value="0" >全部</option>
            						<option value="2018" >2018年</option>
            						<option value="2019" >2019年</option>
            						<option value="2020" selected>2020年</option>
            						<option value="2021" >2021年</option>
            						<option value="2022" >2022年</option>
            					</select>
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-clock-o">&nbsp; 课时</i></span>
								<input type="text" class="form-control" id="classHour" maxlength="10" 
									name='classHour'  onkeyup="checkRange(this)"/>
							</div>
							<input type="hidden" id="status" name="status" value="确认"/>
 							<input type='reset' class="btn btn-primary" value=' 重 置 ' />&nbsp;&nbsp;
							<input type='button' name="submitCheck" onclick="javascript:mysubmit(this);" class="btn btn-primary" value=' 送审' />&nbsp;&nbsp;
							<a class="btn btn-primary" href="index.php">放弃</a>
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