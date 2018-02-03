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

$delid=$_GET["delid"];
if($delid!=""){
 $id=mysql_connect("localhost","root","root");
 mysql_select_db("gbook",$id);
 mysql_query("SET CHARACTER SET utf-8");
 mysql_query("delete from message where id=".$delid);
 echo "<script language=javascript>alert('删除成功!');</script>";
 mysql_close($id);
}
?>
<HTML>
<HEAD>
<TITLE>李海苔的留言本</TITLE>
<style type=text/css>
TD{
font-size:12px;
line-height:150%;
}
</style>
</HEAD>
<BODY>
<table width=415 height="308" border=1 align=center cellspacing=0 bordercolor=#FF33FF  style="border-collapse:collapse" cellspadding=0>
<tr>
    <td width="450" height=48 align="center" bgcolor="#009900" style="font-size:30px;line-height:30px" ><strong> <font  color=#ffffff face="楷体">李海苔的留言本</font></span></strong></td>
  <tr>
<td height=19 align="center" bgcolor="#FFCCFF"><a href=send.php>[我要写留言]</a> <a href=logout.php>[注销登录]</a><a href=logout.php></a>
</td>
</tr>
<tr><td height=175 align="center" valign="top">
  <table width="417" height="208" border="1" align="right" cellpadding="1" cellspacing="0" bordercolor="#FF33FF">
    <tr>
      <td width="321" height="206" align="center" valign="top"><?php
   $id=mysql_connect("localhost","root","root");
   mysql_select_db("gbook",$id);
   mysql_query("SET CHARACTER SET utf-8");
   $query="select * from message";
   $result=mysql_query($query,$id);
   if(mysql_num_rows($result)<1){
   echo "&nbsp;目前数据表中还没有任何留言！";
   }else{ //ELSE开始
     $totalnum=mysql_num_rows($result);
     $pagesize=10;
     $page=$_GET["page"];
     if($page==""){
       $page=1;
     }
     $begin=($page-1) * $pagesize;
     $totalpage=ceil($totalnum/$pagesize);

     echo "<table border=0 width=95%><tr><td>";
     $datanum=mysql_num_rows($result);
     echo "共有留言".$totalnum."条。";
     echo "每页".$pagesize."条，共".$totalpage."页<br>";
     
     for($j=1;$j<=$totalpage;$j++){
      echo "<a href=manage.php?page=".$j.">[".$j."]&nbsp;</a>";
     }
     echo "<br>";
     
     $query="SELECT * FROM message  order by addtime desc limit $begin,$pagesize";
     $result=mysql_query($query,$id);  
     for($i=1;$i<=$datanum;$i++){
      $info=mysql_fetch_array($result,MYSQL_ASSOC);
      echo "[".$info['author']."]于".$info['addtime']."说：<br>";
      echo "&nbsp;&nbsp;".$info['content']."<br>";
       if($info['reply']!=""){
       echo "<b>管理员回复：</b>".$info['reply']."<br>";
       }
       ///增加了删除和回复
      echo "[<a href=manage.php?delid=".$info['id'].">删除此留言</a>]&nbsp;&nbsp;[<a href=reply.php?id=".$info['id'].">回复留言</a>]";
      echo "<hr>";
      }
     echo "</table>";
   } //ELSE结束
   mysql_close($id);
  ?></td>
    </tr>
  </table>
  </td>
</tr>
<tr>
  <td height=31 align=center valign="middle" bgcolor=#009900><strong><font color=#FFFFFF>版权所有：李海苔</font></strong><br>
 </td>
</tr>
</table>
</body>
</html>