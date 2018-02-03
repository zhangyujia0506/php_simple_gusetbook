<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
date_default_timezone_set('PRC'); 
?>
<?php
session_start();
$_SESSION["login"]="";
echo "您已退出[<a href=index.php>返回首页</a>]";
exit;
?>