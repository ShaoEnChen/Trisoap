<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
<title>三三吾鄉手工皂 新增留心語</title>
<?php
session_start();
include("Helper/mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$message = null;

if($EMAIL != null){
    echo "顧客帳號：$EMAIL <br>";
    echo "<form name=\"form\" method=\"post\" action=\"Create_MSGMAS_finish.php\" Enctype=\"multipart/form-data>";
    echo "<input type=\"hidden\" name=\"MSG\" /> <br>";
    echo "留言文字*：<input type=\"text\" name=\"MSGTXT\" /> <br>";
    echo "留言照片：<input type=\"file\" name=\"MSGPHOTO\" /> <br>";
    echo "留言影片：<input type=\"text\" name=\"MSGVIDEO\" />  請自行上傳後在此輸入網址<br>";
    echo "<input type=\"submit\" name=\"button\" value=\"確定\" />";
    echo "</form>";
    ?>
<a href="../message/Message.html">取消</a>
<?php
}
else{
    ?>
    <script>
    alert("請先登入或註冊!");
    </script>
    <meta http-equiv=REFRESH CONTENT=0.5;url=../Homepage/index.php>
    <?
}
?>