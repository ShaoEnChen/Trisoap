<meta charset="utf-8">
<link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
<?php
session_start();
include_once("Helper/mysql_connect.php");
include_once("Helper/sql_operation.php");
include_once("Helper/handle_string.php");
include_once("Helper/redirect.js");
$message = '';

$EMAIL = input('EMAIL');
$CUSPW = input('CUSPW');

if($EMAIL == null){
        $message = $message . '電子信箱欄位不可空白 \n';
}
if($CUSPW == null){
        $message = $message . '密碼欄位不可空白 \n';
}
//搜尋資料庫資料
$queryPW = search('CUSPW', 'CUSMAS', 'EMAIL', $EMAIL);
if(encrypt($CUSPW) != $queryPW){
        $message = $message . '密碼錯誤 \n';
}
if($message == null){
        $_SESSION['EMAIL'] = $EMAIL;
        $queryCUSIDT = search('CUSIDT', 'CUSMAS', 'EMAIL', $EMAIL);
        $_SESSION['CUSIDT'] = $queryCUSIDT;
        ?>
        <script>
        redirect("/");
        </script>
        <?php 
}
else
{
        ?>
        <script>
        redirect("User_login.php");
        alert("<?php echo $message;?>");
        </script>
        <?php 
}
?>
