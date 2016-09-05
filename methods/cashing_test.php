<?
session_start();
include_once("AllPay.Payment.Integration.php");
include_once("Helper/mysql_connect.php");
include_once("Helper/sql_operation.php");
include_once("Helper/handle_string.php");
include_once("Helper/redirect.js");

$EMAIL = $_SESSION['EMAIL'];
$ORDNO = $_SESSION['ORDNO'];
$total = $_SESSION['total'];
$paytype = input('PAYTYPE');
$from = input('ori');
if($total <= 0 || $total == null){
    ?>
    <script>
    redirect("../Homepage/index.php");
    alert("這筆訂單沒有任何商品或付款金額為負!");
    </script>
    <?
}
elseif($EMAIL == null || $ORDNO == null || $ORDNO == '100000000'){
    ?>
    <script>
    redirect("../Homepage/index.php");
    alert("您無權限觀看此頁面!");
    </script>
    <?
}
else{
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
}
?>