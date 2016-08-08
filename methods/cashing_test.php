<?
session_start();
include("AllPay.Payment.Integration.php");
include("Helper/mysql_connect.php");
include("Helper/sql_operation.php");
include("Helper/handle_string.php");

$EMAIL = $_SESSION['EMAIL'];
$ORDNO = $_SESSION['ORDNO'];
$paytype = input('PAYTYPE');
$from = input('FROM');
if($from == 'oc'){
    if($paytype == ''){
        ?>
        <script>
        alert("請選擇付款方式");
        </script>
        <meta http-equiv=REFRESH CONTENT=0.5;url=Order_Confirm.php>
        <?
    }
    else{
        $_SESSION['PAYTYPE'] = $paytype;
        ?><meta http-equiv=REFRESH CONTENT=0.5;url=cashing.php><?
    }
}
else{
    ?><meta http-equiv=REFRESH CONTENT=0.5;url=cashing.php><?
}
?>