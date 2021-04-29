<?php
$menu = 'user';
include_once 'head.php';
// 查询部门表
include_once 'dbconfig.php';
$sql = "select * from user";
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
                     <h2>教师管理</h2>                         
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href='insertuser.php' class="btn btn-danger square-btn-adjust">录入教师信息</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>

                                        <tr>
                                            <th>用户名</th>
                                            <th>用户ID</th>
                                            <th>用户类型</th>
                                            <th>姓名</th>
                                            <th>部门</th>
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
                                    	echo '<td>'.$row['username'].'</td>';
                                    	echo '<td>'.$row['userId'].'</td>';
                                    	echo '<td>'.$row['role'].'</td>';
                                    	echo '<td>'.$row['name'].'</td>';
                                    	echo '<td>'.$row['departmentName'].'</td>';
                                    	echo '<td>'.$row['status'].'</td>';
                                        $editurl = 'editdeuser.php?id='.$row['id'];
                                        $a = 'chongzheuser.php?id='.$row['id'];
                                        $deleteurl = 'deleteuser.php?id='.$row['id'];
                                        echo '<td><a class="btn btn-danger square-btn-adjust" href="'. $editurl.'">编辑</a>';
                                        echo '&nbsp;&nbsp;<a class="btn btn-danger square-btn-adjust" href="'. $a.'">重置密码</a>';
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