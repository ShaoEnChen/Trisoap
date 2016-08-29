<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
<?php
session_start();
include_once("Helper/mysql_connect.php");
include_once("Helper/sql_operation.php");
include_once("Helper/handle_string.php");
include_once("Helper/redirect.js");
$message = '';

$DISCOUNT = input('DISCOUNT');

$queryDISCOUNT = select('DCTMAS', 'DCTID', $DISCOUNT);
if($queryDISCOUNT == null){
        $message = $message . '此兌換碼不存在 \n';
}
elseif($queryDISCOUNT['ACTCODE'] == '0'){
        $message = $message . '此兌換碼已失效 \n';
}
elseif($queryDISCOUNT['DCTSTAT'] == '0'){
        $message = $message . '此兌換碼已使用過 \n';
}
if($message == null){
        $_SESSION['DISCOUNT'] = $queryDISCOUNT['DCTID'];
        ?>
        <script>
        redirect("Order_Confirm.php");
        </script>
        <?
}
else
{
        ?>
        <script>
        redirect("discount.php");
        alert("<?echo $message;?>");
        </script>
        <?
}
?>