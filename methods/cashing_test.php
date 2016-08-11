<?
session_start();
include_once("AllPay.Payment.Integration.php");
include_once("Helper/mysql_connect.php");
include_once("Helper/sql_operation.php");
include_once("Helper/handle_string.php");
include_once("Helper/redirect.js");

$EMAIL = $_SESSION['EMAIL'];
$ORDNO = $_SESSION['ORDNO'];
$paytype = input('PAYTYPE');
$from = input('FROM');
if($from == 'oc'){
    if($paytype == ''){
        ?>
        <script>
        redirect("Order_Confirm.php");
        alert("請選擇付款方式");
        </script>
        <?
    }
    else{
        $_SESSION['PAYTYPE'] = $paytype;
        ?>
        <script>
        redirect("cashing.php");
        </script>
        <?
    }
}
else{
    ?>
    <script>
    redirect("cashing.php");
    </script>
    <?
}
?>