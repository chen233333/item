<?php
//注意每个页面，使用session之前，必须启动
session_start();
//销毁所有session
session_destroy();
echo "完成注销！<br/>";
?>
<a href="login.php">去登录</a>