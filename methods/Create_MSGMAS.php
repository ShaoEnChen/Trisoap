<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
<title>三三吾鄉手工皂 新增留心語</title>
<?php
session_start();
include_once("Helper/mysql_connect.php");
include_once("Helper/redirect.js");
$EMAIL = $_SESSION['EMAIL'];
$message = null;

if($EMAIL != null){
    ?>
    顧客帳號：<?echo $EMAIL;?> <br>
    <form name="form" method="post" action="Create_MSGMAS_finish.php" Enctype="multipart/form-data>" />
    <input type="hidden" name="MSG" /> <br>
    留言文字*：<input type="text" name="MSGTXT" /> <br>
    留言照片：<input type="file" name="MSGPHOTO" /> <br>
    留言影片：<input type="text" name="MSGVIDEO" />   請自行上傳後在此輸入網址 <br>
    <input type="submit" name="button" value="確定" />
    </form>
    <a href="../message/Message.html">取消</a>
<?php
}
else{
    ?>
    <script>
    redirect("../Homepage/index.php");
    alert("請先登入或註冊!");
    </script>
    <?
}
?>