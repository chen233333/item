<?php
//注意每个页面，使用session之前，必须启动
session_start();
//销毁所有session
session_destroy();
header("location:jump.php?error=注销成功!&url=login.php&wait=2");
?>