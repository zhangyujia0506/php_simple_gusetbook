<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
date_default_timezone_set('PRC'); 
?>
<?php
session_start();
if($_SESSION["login"]!="YES"){
 echo "你还没有登录,无法管理留言!";
 exit;
}
$msgid=$_GET["id"];
$reply=$_POST["reply"];
if($reply!=""){
 $id=mysql_connect("localhost","root","root");
 mysql_select_db("gbook",$id);
 mysql_query("SET CHARACTER SET utf-8");
 $query="update message set reply='$reply' where id=".$msgid;
 mysql_query($query,$id);
 echo "<script language=javascript>alert('回复成功!');location.href='manage.php';</script>";
 exit;
 mysql_close($id);
}

 $id=mysql_connect("localhost","root","root");
 mysql_select_db("gbook",$id);
 mysql_query("SET CHARACTER SET utf-8");
 $query="select * from  message where id=$msgid";
 $result=mysql_query($query,$id);
 if(mysql_num_rows($result)<1){
 echo "没有此留言";
 exit;
 }
 $msg=mysql_fetch_array($result,MYSQL_ASSOC);
?>
<HTML>
<HEAD>
<TITLE>李海苔的留言本</TITLE>
</HEAD>
<BODY>
<table width=415 height="308" border=1 align=center cellspacing=0 bordercolor=#FF33FF  style="border-collapse:collapse" cellspadding=0>
<tr>
    <td width="450" height=48 align="center" bgcolor="#009900" style="font-size:30px;line-height:30px" ><strong> <font  color=#ffffff face="楷体">李海苔的留言本</font></span></strong></td>
  <tr>
<td height=24 align="center" bgcolor="#FFCCFF">
&nbsp;&nbsp;<a href="manage.php">[返回管理]</a>
</td>
</tr>

<tr><td height=224 align="right">
  <form method="POST" action="reply.php?id=<?php echo $msgid;?>">
	<table width="435" height="18" border="1" cellpadding="0" cellspacing="0" bordercolor="#FF33FF">
      <tr>
        <td width="394" align="center"><table width="98%" height="216" border="1" cellpadding="0" cellspacing="0" bordercolor="#808080" id="table1" style="border-collapse: collapse">
          <tr>
            <td height="17" colspan="2" align="center" valign="middle"><p align="center"><strong>管理员回复留言</strong></td>
          </tr>
          <tr>
            <td width="32%" align="center" valign="middle"><p align="right"><strong>留言ID</strong></td>
            <td width="67%" align="center" valign="middle"><?php echo $msg['id'];?></td>
          </tr>
          <tr>
            <td width="32%" align="center" valign="middle"><p align="right"><strong>留言人</strong></td>
            <td width="67%" align="center" valign="middle"><?php echo $msg['author'];?></td>
          </tr>
          <tr>
            <td width="32%" align="center" valign="middle"><p align="right"><strong>留言时间</strong></td>
            <td width="67%" align="center" valign="middle"><?php echo $msg['addtime'];?></td>
          </tr>
          <tr>
            <td width="32%" align="center" valign="middle"><p align="right"><strong>留言内容</strong></td>
            <td width="67%" align="center" valign="middle"><?php echo $msg['content'];?></td>
          </tr>
          <tr>
            <td width="32%" align="center" valign="middle"><p align="right"><strong>请输入回复</strong></td>
            <td width="67%" align="center" valign="middle"><textarea rows="7" name="reply" cols="33"></textarea></td>
          </tr>
          <tr>
            <td width="99%" height="23" colspan="2" align="center" valign="middle" bgcolor="#009900"><p align="center">
                <input type="submit" value="确定" name="B1">
            </p></td>
          </tr>
        </table></td>
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
<?php mysql_close(); ?>