<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
date_default_timezone_set('PRC'); 
?>
<?php
session_start();
if($_SESSION["login"]!="YES"){
 echo "�㻹û�е�¼,�޷���������!";
 exit;
}

$delid=$_GET["delid"];
if($delid!=""){
 $id=mysql_connect("localhost","root","root");
 mysql_select_db("gbook",$id);
 mysql_query("SET CHARACTER SET utf-8");
 mysql_query("delete from message where id=".$delid);
 echo "<script language=javascript>alert('ɾ���ɹ�!');</script>";
 mysql_close($id);
}
?>
<HTML>
<HEAD>
<TITLE>�̦�����Ա�</TITLE>
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
    <td width="450" height=48 align="center" bgcolor="#009900" style="font-size:30px;line-height:30px" ><strong> <font  color=#ffffff face="����">�̦�����Ա�</font></span></strong></td>
  <tr>
<td height=19 align="center" bgcolor="#FFCCFF"><a href=send.php>[��Ҫд����]</a> <a href=logout.php>[ע����¼]</a><a href=logout.php></a>
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
   echo "&nbsp;Ŀǰ���ݱ��л�û���κ����ԣ�";
   }else{ //ELSE��ʼ
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
     echo "��������".$totalnum."����";
     echo "ÿҳ".$pagesize."������".$totalpage."ҳ<br>";
     
     for($j=1;$j<=$totalpage;$j++){
      echo "<a href=manage.php?page=".$j.">[".$j."]&nbsp;</a>";
     }
     echo "<br>";
     
     $query="SELECT * FROM message  order by addtime desc limit $begin,$pagesize";
     $result=mysql_query($query,$id);  
     for($i=1;$i<=$datanum;$i++){
      $info=mysql_fetch_array($result,MYSQL_ASSOC);
      echo "[".$info['author']."]��".$info['addtime']."˵��<br>";
      echo "&nbsp;&nbsp;".$info['content']."<br>";
       if($info['reply']!=""){
       echo "<b>����Ա�ظ���</b>".$info['reply']."<br>";
       }
       ///������ɾ���ͻظ�
      echo "[<a href=manage.php?delid=".$info['id'].">ɾ��������</a>]&nbsp;&nbsp;[<a href=reply.php?id=".$info['id'].">�ظ�����</a>]";
      echo "<hr>";
      }
     echo "</table>";
   } //ELSE����
   mysql_close($id);
  ?></td>
    </tr>
  </table>
  </td>
</tr>
<tr>
  <td height=31 align=center valign="middle" bgcolor=#009900><strong><font color=#FFFFFF>��Ȩ���У��̦</font></strong><br>
 </td>
</tr>
</table>
</body>
</html>