<?php
include_once 'dbconfig.php';
//取url后面的id
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "delete from teachhour WHERE id=:id";
    $statmentObj = $pdo->prepare ( $sql );
    $ret = $statmentObj->execute (array("id"=>$id));
    if ($ret) {
        header("location:jump.php?error=数据删除成功!&url=index.php&wait=2");
    } else {
        header("location:jump.php?error=数据删除失败!&url=index.php&wait=2");
    }
    exit();
}