<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
date_default_timezone_set('PRC'); 
?>
<?php
session_start();
$_SESSION["login"]="";
echo "�����˳�[<a href=index.php>������ҳ</a>]";
exit;
?>