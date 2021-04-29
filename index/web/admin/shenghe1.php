<?php
if(filter_input(INPUT_GET, 'id')){
    include_once 'dbconfig.php';
    $id=$_GET['id'];
    $data = array(
        "id"=>$id,
    );
    $statement = "update teachhour set status ='通过' where id=:id";
    $statementObject =  $pdo->prepare($statement);
    $result = $statementObject->execute($data);
    if($result){
        header("location:jump.php?error=审核成功&url=sh.php&wait=3");
    }else{
        header("location:jump.php?error=审核失败&url=sh.php&wait=3");
    }
    exit();
    
}else{
    header("sh.php");
}
?>