<meta charset="utf-8">
<link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
<?php
session_start();
include_once("Helper/mysql_connect.php");
include_once("Helper/sql_operation.php");
include_once("Helper/handle_string.php");
include_once("Helper/update_price.php");
include_once("Helper/redirect.js");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$ORDTYPE = input('ORDTYPE');
$ORDAMT_1 = input('ORDAMT_1');
$ORDAMT_2 = input('ORDAMT_2');
$ORDAMT_3 = input('ORDAMT_3');
$ORDAMT_4 = input('ORDAMT_4');
$PRICETYPE = input('PRICETYPE');
$SETPRICE = input('SETPRICE');
$ORDINST = input('ORDINST');
$PW = input('PW');
$message = '';
if($EMAIL != null && $CUSIDT == 'A'){
    if(is_numeric($ORDAMT_1) == FALSE || $ORDAMT_1 < 0 || is_float($ORDAMT_1)){
        $message .= '訂購數量必須為正整數 \n';
    }
    elseif(is_numeric($ORDAMT_2) == FALSE || $ORDAMT_2 < 0 || is_float($ORDAMT_2)){
        $message .= '訂購數量必須為正整數 \n';
    }
    elseif(is_numeric($ORDAMT_3) == FALSE || $ORDAMT_3 < 0 || is_float($ORDAMT_3)){
        $message .= '訂購數量必須為正整數 \n';
    }
    elseif(is_numeric($ORDAMT_4) == FALSE || $ORDAMT_4 < 0 || is_float($ORDAMT_4)){
        $message .= '訂購數量必須為正整數 \n';
    }
    elseif($PRICETYPE == ''){
        if($SETPRICE == null){
            $message .= '請填寫自訂價格 \n';
        }
        elseif(is_numeric($SETPRICE) == FALSE || $SETPRICE < 0 || is_float($SETPRICE)){
            $message .= '自訂價格必須為正整數 \n';
        }
    }
    $queryPW = search('CUSPW', 'CUSMAS', 'EMAIL', $EMAIL);
    if(encrypt($PW) != $queryPW){
        $message .= '密碼錯誤 \n';
    }
    if($message == ''){
        $row = select('OWNMAS', 'COMNM', 'Trisoap');
        $ORDNOG = $row['NORDNOG'];
        $ORDNOS = $row['NORDNOS'];
        date_default_timezone_set('Asia/Taipei');
        $CREATEDATE = date("Y-m-d H:i:s");
        $UPDATEDATE = date("Y-m-d H:i:s");
        if($ORDTYPE == 'G'){
            $SHIPFEE = 20;
            $sql = "INSERT INTO ORDMAS (ORDNO, ORDTYPE, EMAIL, ORDINST, SHIPFEE, CREATEDATE, UPDATEDATE) values ('$ORDNOG', '$ORDTYPE', '$EMAIL', '$ORDINST', '$SHIPFEE', '$CREATEDATE', '$UPDATEDATE')";
            if(mysql_query($sql)){
                $sql = "UPDATE OWNMAS SET NORDNOG=NORDNOG+1 where COMNM='Trisoap'";
                mysql_query($sql);
                ?>
                <script>
                redirect("../Homepage/index.php");
                alert("訂單建立成功。");
                </script>
                <?
                if($ORDAMT_1 != 0){
                    $sql = "INSERT INTO ORDITEMMAS (ORDNO, ITEMNO, ORDAMT, EMAIL, ORDINST, CREATEDATE, UPDATEDATE) values ('$ORDNOG', '1', '$ORDAMT_1', '$EMAIL', '$ORDINST', '$CREATEDATE', '$UPDATEDATE')";
                    mysql_query($sql);
                }
                if($ORDAMT_2 != 0){
                    $sql = "INSERT INTO ORDITEMMAS (ORDNO, ITEMNO, ORDAMT, EMAIL, ORDINST, CREATEDATE, UPDATEDATE) values ('$ORDNOG', '2', '$ORDAMT_2', '$EMAIL', '$ORDINST', '$CREATEDATE', '$UPDATEDATE')";
                    mysql_query($sql);
                }
                if($ORDAMT_3 != 0){
                    $sql = "INSERT INTO ORDITEMMAS (ORDNO, ITEMNO, ORDAMT, EMAIL, ORDINST, CREATEDATE, UPDATEDATE) values ('$ORDNOG', '3', '$ORDAMT_3', '$EMAIL', '$ORDINST', '$CREATEDATE', '$UPDATEDATE')";
                    mysql_query($sql);
                }
                if($ORDAMT_4 != 0){
                    $sql = "INSERT INTO ORDITEMMAS (ORDNO, ITEMNO, ORDAMT, EMAIL, ORDINST, CREATEDATE, UPDATEDATE) values ('$ORDNOG', '4', '$ORDAMT_4', '$EMAIL', '$ORDINST', '$CREATEDATE', '$UPDATEDATE')";
                    mysql_query($sql);
                }
                if($PRICETYPE == 'A'){
                    update_price($ORDNOG);
                }
                elseif($PRICETYPE == 'B'){
                    set_price($ORDNOG, 0.9);
                }
                elseif($PRICETYPE == 'C'){
                    set_price($ORDNOG, 0.8);
                }
                elseif($PRICETYPE == 'D'){
                    set_price($ORDNOG, 0.7);
                }
                elseif($PRICETYPE == 'E'){
                    set_price($ORDNOG, 0.6);
                }
                elseif($PRICETYPE == 'F'){
                    set_price($ORDNOG, 0.5);
                }
                elseif($PRICETYPE == ''){
                    set_price_dir($ORDNOG, $SETPRICE);
                }
            }
            else{
                ?>
                <script>
                redirect("Create_ORDMAS1.php");
                alert("訂單建立失敗");
                </script>
                <?
            }
        }
        else{
            $SHIPFEE = 50;
            $sql = "INSERT INTO ORDMAS (ORDNO, ORDTYPE, EMAIL, ORDINST, SHIPFEE, CREATEDATE, UPDATEDATE) values ('$ORDNOS', '$ORDTYPE', '$EMAIL', '$ORDINST, '$SHIPFEE', '$CREATEDATE', '$UPDATEDATE')";
            if(mysql_query($sql)){
                $sql = "UPDATE OWNMAS SET NORDNOS=NORDNOS+1 where COMNM='Trisoap'";
                mysql_query($sql);
                ?>
                <script>
                redirect("../Homepage/index.php");
                alert("訂單建立成功。");
                </script>
                <?
                if($ORDAMT_1 != 0){
                    $sql = "INSERT INTO ORDITEMMAS (ORDNO, ITEMNO, ORDAMT, EMAIL, ORDINST, CREATEDATE, UPDATEDATE) values ('$ORDNOS', '1', '$ORDAMT_1', '$EMAIL', '$ORDINST', '$CREATEDATE', '$UPDATEDATE')";
                    mysql_query($sql);
                }
                if($ORDAMT_2 != 0){
                    $sql = "INSERT INTO ORDITEMMAS (ORDNO, ITEMNO, ORDAMT, EMAIL, ORDINST, CREATEDATE, UPDATEDATE) values ('$ORDNOS', '2', '$ORDAMT_2', '$EMAIL', '$ORDINST', '$CREATEDATE', '$UPDATEDATE')";
                    mysql_query($sql);
                }
                if($ORDAMT_3 != 0){
                    $sql = "INSERT INTO ORDITEMMAS (ORDNO, ITEMNO, ORDAMT, EMAIL, ORDINST, CREATEDATE, UPDATEDATE) values ('$ORDNOS', '3', '$ORDAMT_3', '$EMAIL', '$ORDINST', '$CREATEDATE', '$UPDATEDATE')";
                    mysql_query($sql);
                }
                if($ORDAMT_4 != 0){
                    $sql = "INSERT INTO ORDITEMMAS (ORDNO, ITEMNO, ORDAMT, EMAIL, ORDINST, CREATEDATE, UPDATEDATE) values ('$ORDNOS', '4', '$ORDAMT_4', '$EMAIL', '$ORDINST', '$CREATEDATE', '$UPDATEDATE')";
                    mysql_query($sql);
                }
                if($PRICETYPE == 'A'){
                    update_price($ORDNOG);
                }
                elseif($PRICETYPE == 'B'){
                    set_price($ORDNOG, 0.9);
                }
                elseif($PRICETYPE == 'C'){
                    set_price($ORDNOG, 0.8);
                }
                elseif($PRICETYPE == 'D'){
                    set_price($ORDNOG, 0.7);
                }
                elseif($PRICETYPE == 'E'){
                    set_price($ORDNOG, 0.6);
                }
                elseif($PRICETYPE == 'F'){
                    set_price($ORDNOG, 0.5);
                }
                elseif($PRICETYPE == ''){
                    set_price_dir($ORDNOG, $SETPRICE);
                }
            }
            else{
                ?>
                <script>
                redirect("Create_ORDMAS1.php");
                alert("訂單建立失敗");
                </script>
                <?
            }
        }
    }
    else{
        ?>
        <script>
        redirect("Create_ORDMAS1.php");
        alert("<?echo $message;?>");
        </script>
        <?
    }
}
else{
    ?>
    <script>
    redirect("../Homepage/index.php");
    alert("您無權限觀看此頁面!");
    </script>
    <?
}
