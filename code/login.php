<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
date_default_timezone_set('PRC'); 
?>
<?php
$name=$_POST["name"];
if($name!=""){
 $password=$_POST["password"];
 $id=mysql_connect("localhost","root","root");
 mysql_select_db("gbook",$id);
 mysql_query("SET CHARACTER SET utf-8");
 $query="select * from admin where username='$name'";
 $result=mysql_query($query,$id);
 if(mysql_num_rows($result)<1){
 echo "该用户不存在!请重新登录!";
 }else{
 $info=mysql_fetch_array($result,MYSQL_ASSOC);
 if($info['userpass']!=$password){
 echo "密码输入错误!请重新登录!";
 }else{
  session_start();
  $_SESSION["login"]="YES";
  echo "<script>location.href='manage.php';</script>";
  exit;
   }
 }
 mysql_close($id);
}
?>
<HTML>
<HEAD>
<TITLE>李海苔的留言本</TITLE>
</HEAD>
<BODY>
<table width=415 height="308" border=1 align=center cellspacing=0 bordercolor=#FF33FF style="border-collapse:collapse" cellspadding=0>
<tr>
    <td width="450" height=48 align="center" bgcolor="#009900" style="font-size:30px;line-height:30px" ><strong> <font  color=#ffffff face="楷体">李海苔的留言本</font></span></strong></td>
  <tr>
<td height=17 align="center" bgcolor="#FFCCFF"><a href=send.php>[我要写留言]</a>&nbsp;<a href=login.php>[管理留言]</a>
</td>
</tr>
<tr><td height=178 align="center">
  <form method="POST" action="login.php">
	<table width="98%" height="136" border="1" cellpadding="0" cellspacing="0" bordercolor="#330099" bgcolor="#FFFFFF" id="table1" style="border-collapse: collapse">
		<tr>
			<td colspan="2" height="29">
			<p align="center"><strong>欢迎管理员登录</strong></td>
		</tr>
		<tr>
			<td width="32%">
			<p align="right">用户名</td>
			<td width="67%"><input type="text" name="name" size="20"></td>
		</tr>
		<tr>
			<td width="32%" height="47">
			<p align="right">密码</td>
			<td width="67%"><input type="password" name="password" size="20"></td>
		</tr>
		<tr>
			<td width="99%" colspan="2">
				<p align="center"><input type="submit" value="登录" name="B1"></p>			</td>
		</tr>
	</table>
	</form>
	</td></tr>
<tr>
  <td height=31 align=center valign="middle" bgcolor=#009900><strong><font color=#FFFFFF>版权所有：李海苔</font></strong><br>
 </td>
</tr>
</table>
</body>
</html>