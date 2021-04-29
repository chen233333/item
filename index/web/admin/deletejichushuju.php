<?php
include_once 'dbconfig.php';
//取URl后面的id
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="delete from basedata2 where id=:id";
    $statmentObj = $pdo->prepare($sql);
    $ret = $statmentObj->execute(array("id"=>$id));
    if($ret){
        header("location:jump.php?error=数据删除成功!&url=jichushuju.php&wait=2");
    }else{
        header("location:jump.php?error=数据删除失败!&url=jichushuju.php&wait=2");
    }
}
include_once 'head.php';