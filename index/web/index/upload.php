<?php
if(isset($_FILES['hzj'])){
    //上传文件内容是放在$_FILES
   // var_dump($_FILES);
    $data = $_FILES['hzj'];
    echo "上传文件名：".$data['name']."<br/>";
    echo "上传文件类别：".$data['type']."<br/>";
    echo "上传文件存放位置：".$data['tmp_name']."<br/>";
    echo "上传错误码（错误码为0表示没有错）：".$data['error']."<br/>";
    echo "上传文件大小：".$data['size']."<br/>";
    //move_uploaded_file — 将上传的文件移动到新位置
    //bool move_uploaded_file ( string $filename , string $destination )
    if(($data['type']=="image/"||$data['type']=="image/jpeg"||
        $data['type']=="image/pjpeg")&&$data['size']<200000){
           move_uploaded_file ($data['tmp_name'] , "uploads/".$data['name']);
            echo"文件上传成功";
            exit();
    }else{
        echo "你上次的文件不符合要求！！";
    }
}


?>
<a >注意：上传只能是照片！！！</a>
<form action="upload.php" method="post"
enctype="multipart/form-data">
文件：<input type="file" name="hzj" id="hzj"/><br/>
<input type="submit" value="上传文件"/>
</form>