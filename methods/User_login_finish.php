<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
include("Helper/mysql_connect.php");
include("Helper/sql_operation.php");
include("Helper/handle_string.php");
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
        alert("成功登入");
        </script>
        <meta http-equiv=REFRESH CONTENT=0.5;url=../Homepage/index.php>
        <?
}
else
{
        ?>
        <script>
        alert("<?echo $message;?>");
        </script>
        <meta http-equiv=REFRESH CONTENT=0.5;url=User_login1.php>
        <?
}
?>