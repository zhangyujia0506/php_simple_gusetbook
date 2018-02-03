<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
date_default_timezone_set('PRC'); 
?>
<?php
$name=$_POST["name"];
if($name!=""){
 $content=$_POST["content"];
 $addtime=date("Y-m-d H:i:s");
 $id=mysql_connect("localhost","root","root");
 mysql_select_db("gbook",$id);
 mysql_query("SET CHARACTER SET utf-8");
 $query="insert into message(author,addtime,content,reply) values('$name','$addtime','$content','')";
 mysql_query($query,$id);
 mysql_close($id);
 echo "<script language=javascript>alert('留言成功!点击确定查看留言.');location.href='index.php';</script>";
 exit;
}
?>
<HTML>
<HEAD>
<TITLE>李海苔的留言本</TITLE>
</HEAD>
<BODY>
<table width=415 height="308" border=1 align=center cellspacing=0 bordercolor=#FF33FF  style="border-collapse:collapse" cellspadding=0 backcolor="#990000">
<tr>
    <td width="450" height=48 align="center" bgcolor="#009900" style="font-size:30px;line-height:30px" ><strong> <font  color=#ffffff face="楷体">李海苔的留言本</font></span></strong></td>
  <tr>
<td height=25 align="center" bgcolor="#FFCCFF"><a href=send.php>[我要写留言]</a> <a href=login.php>[管理留言]</a></td>
</tr>
<tr><td height=200 align="center">
  <form method="POST" action="send.php">
	<table width="80%" height="199" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF33FF" id="table1" style="border-collapse: collapse">
		<tr>
			<td colspan="2" height="21">
			<p align="center"><strong>欢迎您填写留言</strong></td>
		</tr>
		<tr>
			<td width="32%">
			<p align="right"><strong>您的名字</strong></td>
			<td width="67%"><input type="text" name="name" size="20"></td>
		</tr>
		<tr>
			<td width="32%" height="135">
			<p align="right"><strong>留言内容</strong></td>
			<td width="67%"><textarea rows="10" name="content" cols="31"></textarea></td>
		</tr>
		<tr>
			<td width="99%" height="23" colspan="2">
			  <p align="center">
			    <input type="submit" value="提交" name="B1"></p>		
			</td>
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