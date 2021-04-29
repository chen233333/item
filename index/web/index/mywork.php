<?php
$menu = 'mywork';
include_once 'head.php';
include_once 'dbconfig.php';
//注意数据过滤,如果传过来年份，就近年份查
if(isset($_POST['year'])){
	$statementObject = $pdo->prepare("select * from work where year=:year");
	$statementObject->execute(array("year"=>$_POST['year']));
}else{
	$statementObject = $pdo->prepare("select * from work where 1");
	$statementObject->execute();
}
//有查询成功？
//验证查询有没有错误
$errorCode = $statementObject->errorCode();
if($errorCode!="00000"){
	//执行语句失败
	$errorInfor = $statementObject->errorInfo();
	echo $errorInfor[2];
}else{
	//查到数据，处理数据
	$data = $statementObject->fetchAll(PDO::FETCH_ASSOC);
}

//查询basedata3中年份
$statementObject = $pdo->prepare("select * from basedata3 ");
$statementObject->execute();
$basedata3 = $statementObject->fetch(PDO::FETCH_ASSOC);
$workYear = $basedata3['content'];
?>
        <div id="page-wrapper" >
            <div id="page-inner">
                <!--div class="col-md-12"-->
			<div class="clearfix"></div>
				<div class="searchbody">
					<form method='post' action='mywork.php'>
						<div class="mytype">
							<p class="mytype-title">年度：</p>
							<select class="mytype-item" name="year" width=30>
							<option value="0" >全部</option>
							<?php
							//用php代码来实现
							echo '<option value="'.($workYear-2).'" >'.($workYear-2).'年</option>';
							echo '<option value="'.($workYear-1).'" >'.($workYear-1).'年</option>';
							echo '<option value="'.$workYear.'" selected>'.$workYear.'年</option>';
							echo '<option value="'.($workYear+1).'" >'.($workYear+1).'年</option>';
							echo '<option value="'.($workYear+2).'" >'.($workYear+2).'年</option>';
							?>
						  </select>
						</div>
						<div class="querybtn">
							<input type='submit' value='查询' />
						</div>
						<div class="clearfix"></div>
					</form>
				</div>
                 <!-- /. ROW  -->
                 <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          	<a href="insertmywork.php" class="btn btn-danger square-btn-adjust">录入非授课工作量</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
               					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                         <tr class="odd gradeX">
                                            <th>年度</th>
                                            <th>教工号</th>
                                            <th>大类</th>
                                            <th>类别名称</th>
                                            <th>级别名</th>
                                            <th>内容</th>
                                            <th>课时计数</th>
                                            <th>折算课时</th>
                                            <th>奖金计数</th>
                                            <th>奖励金额</th>
                                            <th>状态</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                       foreach( $data as $row){
                                        echo "<tr class='even gradeC'>";
                                        echo "<td>".$row['year']."</td>";
                                        echo "<td>".$row['teacherId']."</td>";
                                        echo "<td>".$row['bigType']."</td>";
                                        echo "<td>".$row['typeName']."</td>";
                                        echo "<td>".$row['rankName']."</td>";
                                        echo "<td>".$row['content']."</td>";
                                        echo "<td>".$row['amountClass']."</td>";
                                        echo "<td>".$row['classHour']."</td>";
                                        echo "<td>".$row['amountMoney']."</td>";
                                        echo "<td>".$row['money']."</td>";
                                        echo "<td>".$row['status']."</td>";
                                        $url = "editmywork.php?id=" . $row['id'];
                                        $delurl = "deletemywork.php?id=" . $row['id'];
                                        echo "<td><a class='btn btn-primary btn-sm shiny' href='" . $url .
                                        		"'><i class='fa fa-edit'>&nbsp;编辑</i></a>&nbsp;&nbsp;";
										echo "<a class='btn btn-danger btn-sm shiny' href='" .
								    			$delurl . "'><i class='fa fa-trash-o'>&nbsp;删除</i></a></td>";
								    	echo "</tr>";
                                       }
                                      ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
        </div>       
    </div>
    
    
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>
</html>