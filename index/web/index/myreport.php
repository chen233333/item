<?php
$menu = 'myreport';
include_once 'head.php';
// 查询部门表
include_once 'dbconfig.php';
$sql = "select user.userName,user.name,A.classHour,B.money from user, (select user.username,ifnull(tempc.classHour,0) as classHour from user left join( select sum(teachhour.classHour) as classHour,teacherId from teachhour where teachhour.status='确认' and teachhour.year='2020' group by teacherId)tempc on(user.username=tempc.teacherId)) A, (select user.username,ifnull(tempd.money,0) as money from user left join(select sum(work.money)as money,teacherId from work where work.status='确认' and work.year='2020'group by teacherId) tempd on(user.username=tempd.teacherId)) B where user.userName=A .username and user.userName=B.username ".
		" and user.userName=:userName";
$statmentObj = $pdo->prepare ( $sql );
$ret = $statmentObj->execute (array("userName"=>$_SESSION['userLogined']));
if ($ret) {
	// 取出多行数据
	$result = $statmentObj->fetchAll ( PDO::FETCH_ASSOC );
} else {
	echo "访问数据库错";
}
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>工作量统计</h2>                         
                    </div>
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
                                        <tr>
                                            <th>序号</th>
                                            <th>教工号</th>
                                            <th>姓名</th>
                                            <th>教学工作量</th>
                                            <th>奖金</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $line = 0;
                                    foreach ($result as $row){
                                    	if($line%2==1){
                                        	echo '<tr class="odd gradeX">';
                                    	}else{
                                    		echo '<tr class="even gradeC">';
                                    	}
                                    	$line++;
                                    	echo '<td>'.$line.'</td>';
                                    	echo '<td>'.$row['userName'].'</td>';
                                    	echo '<td>'.$row['name'].'</td>';
                                    	echo '<td>'.$row['classHour'].'</td>';
                                    	echo '<td>'.$row['money'].'</td>';
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