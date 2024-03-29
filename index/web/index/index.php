﻿<?php 
$menu = 'index';
include_once 'head.php';
// 查询部门表
include_once 'dbconfig.php';
$sql = "select teachhour.id,year,teacherId,name,classHour,teachhour.status from teachhour,user where teachhour.teacherId=user.username";
$statmentObj = $pdo->prepare ( $sql );
$ret = $statmentObj->execute ();
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
                     <h2>授课工作量管理</h2>                         
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href='insertteachhour.php' class="btn btn-danger square-btn-adjust">录入授课工作量</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
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
                                    $line = 1;
                                    foreach ($result as $row){
                                    	if($line%2==1){
                                        	echo '<tr class="odd gradeX">';
                                    	}else{
                                    		echo '<tr class="even gradeC">';
                                    	}
                                    	$line++;
                                    	echo '<td>'.$row['id'].'</td>';
                                    	echo '<td>'.$row['year'].'</td>';
                                    	echo '<td>'.$row['teacherId'].'</td>';
                                    	echo '<td>'.$row['name'].'</td>';
                                    	echo '<td>'.$row['classHour'].'</td>';
                                    	echo '<td>'.$row['status'].'</td>';
                                        $editurl = 'editteachhour.php?id='.$row['id'];
                                        $deleteurl = 'deleteteachhour.php?id='.$row['id'];
                                        echo '<td><a class="btn btn-danger square-btn-adjust" href="'. $editurl.'">查看</a>';
                                        echo '&nbsp;&nbsp;<a class="btn btn-danger square-btn-adjust" href="'. $deleteurl.'">删除</a></td>';
                                       
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