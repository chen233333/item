<?php
$menu = 'sh';
include_once 'head.php';
include_once 'dbconfig.php';
$type = "";
$statement = "select teachhour.id,year,teacherId,name,classHour,teachhour.status from
 teachhour,user where teachhour.teacherId=user.username and teachhour.status='待审'";
$statmentObject = $pdo->prepare($statement);
$statmentObject->execute();
$result = $statmentObject->fetchAll();

//查询basedata3中年份
$statementObject = $pdo->prepare("select * from basedata3");
$statementObject->execute();
$basedata3 = $statementObject->fetch(PDO::FETCH_ASSOC);
$workYear = $basedata3['content'];



?>
        <div id="page-wrapper" >
            <div id="page-inner">
                <!--div class="col-md-12"-->
			<div class="clearfix"></div>
				<div class="searchbody">
					<form action="sh.php?typename=sh" method="post">
					&nbsp;&nbsp;&nbsp;&nbsp; 年度：<select name="year">
						<option value="2017">2017年</option>
						<option value="2018">2018年</option>
						<option value="2019" >2019年</option>
						<option value="2020" selected>2020年</option>
						<option value="2021">2021年</option>
					</select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input
						type="submit" class="btn btn-primary" value="查询" />
				</form>
				</div>
                 <!-- /. ROW  -->
                 <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
               					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                         <tr class="odd gradeX">
                                          <th>id</th>
                                            <th>年度</th>
                                            <th>教工号</th>
                                            <th>姓名</th>
                                            <th>学时数</th>
                                            <th>状态</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                       $line = 0;
                                       foreach( $result as $row){
                                           $line ++;
                                           $linecolor = $line % 2 == 0 ? 'odd gradeX' : 'even gradeC';
                                           echo "<tr class='$linecolor'>";
                                           echo '<td>'.$row['id'].'</td>';
                                           echo '<td>'.$row['year'].'</td>';
                                           echo '<td>'.$row['teacherId'].'</td>';
                                           echo '<td>'.$row['name'].'</td>';
                                           echo '<td>'.$row['classHour'].'</td>';
                                           echo '<td>'.$row['status'].'</td>';
                                         $b = "shenghe1.php?id=" . $row['id'];
                                        $c = "deletesh.php?id=" . $row['id'];
                                        echo '<td><a class="btn btn-danger square-btn-adjust" href="'. $b.'">审核</a>';
                                        echo '&nbsp;&nbsp;<a class="btn btn-danger square-btn-adjust" href="'. $c.'">删除</a></td>';
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