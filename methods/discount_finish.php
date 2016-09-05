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
$from = $_SESSION['from'];
$type = $_SESSION['type'];

$queryDISCOUNT = select('DCTMAS', 'DCTID', $DISCOUNT);
if(!$queryDISCOUNT){
        $message = $message . '此兌換碼不存在 \n';
}
elseif($queryDISCOUNT['ACTCODE'] == '0'){
        $message = $message . '此兌換碼已失效 \n';
}
elseif($queryDISCOUNT['DCTSTAT'] == '0'){
        $message = $message . '此兌換碼已使用過 \n';
}
if($message == null){
        unset($_SESSION['from']);
        $_SESSION['DISCOUNT'] = $queryDISCOUNT['DCTID'];
        if($queryDISCOUNT['DCTSTAT'] == '1'){
                $DCTID = $queryDISCOUNT['DCTID'];
                date_default_timezone_set('Asia/Taipei');
                $USEDATE = date("Y-m-d H:i:s");
                $sql = "UPDATE DCTMAS SET DCTSTAT='0' WHERE DCTID='$DCTID'";
                mysql_query($sql);
                $sql = "UPDATE DCTMAS SET USEDATE = '$USEDATE' WHERE DCTID='$DCTID'";
                mysql_query($sql);
        }
        if($from == 'oc'){
                ?>
                <script>
                redirect("Order_Confirm.php");
                </script>
                <?
        }
        elseif($from == 'vp'){
                ?>
                <script>
                redirect("View_Purchase.php");
                </script>
                <?
        }
}
else
{
        if($type == 'dc'){
                ?>
                <script>
                redirect("discount_change.php");
                alert("<?echo $message;?>");
                </script>
                <?
        }
        else{
                ?>
                <script>
                redirect("discount.php");
                alert("<?echo $message;?>");
                </script>
                <?
        }
}
?>