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
$message = null;

if($EMAIL != null && $CUSIDT == 'A'){
        $AMT1 = input('AMT1');
        $AMT2 = input('AMT2');
        $AMT3 = input('AMT3');
        $AMT4 = input('AMT4');
        $real = input('real');
        $invoice = input('invoice');
        $PW = input('PW');
        $queryPW = search('CUSPW', 'CUSMAS', 'EMAIL', $EMAIL);
        if(encrypt($PW) != $queryPW){
                $message .= '密碼錯誤 \n';
        }
        if($real == null){
                $message .= '銷售總額不可空白 \n';
        }
        if($invoice == null){
                $message .= '發票號碼不可空白 \n';
        }
        elseif($real != (int)$real || $real < 0){
                $message .= '銷售總額必須為正整數 \n';
        }
        if($AMT1 == null && $AMT2 == null && $AMT3 == null && $AMT4 == null){
                $message .= '請至少輸入一項商品的進貨數量 \n';
        }
        elseif($AMT1 != null){
                if($AMT1 != (int)$AMT1 || $AMT1 < 0){
                        $message .= '售出數量必須為正整數 \n';
                }
        }
        elseif($AMT2 != null){
                if($AMT2 != (int)$AMT2 || $AMT2 < 0){
                        $message .= '售出數量必須為正整數 \n';
                }
        }
        elseif($AMT3 != null){
                if($AMT3 != (int)$AMT3 || $AMT3 < 0){
                        $message .= '售出數量必須為正整數 \n';
                }
        }
        elseif($AMT4 != null){
                if($AMT4 != (int)$AMT4 || $AMT4 < 0){
                        $message .= '售出數量必須為正整數 \n';
                }
        }

        if($message == null){
                $row = select('OWNMAS', 'COMNM', 'Trisoap');
                $ORDNO = $row['NORDNOS'];
        	date_default_timezone_set('Asia/Taipei');
                $CREATEDATE = date("Y-m-d H:i:s");
                $UPDATEDATE = date("Y-m-d H:i:s");
                if($AMT1 != null){
                        $sql = "INSERT INTO ORDITEMMAS (ORDNO, ITEMNO, ORDAMT, EMAIL, CREATEDATE, UPDATEDATE) VALUES ('$ORDNO', '1', '$AMT1', '$EMAIL', '$CREATEDATE', '$UPDATEDATE')";
                        mysql_query($sql);
                        $sql = "UPDATE ITEMMAS SET ITEMAMT=ITEMAMT-$AMT1, UPDATEDATE='$UPDATEDATE' WHERE ITEMNO = 1";
                        mysql_query($sql);
                }
                if($AMT2 != null){
                        $sql = "INSERT INTO ORDITEMMAS (ORDNO, ITEMNO, ORDAMT, EMAIL, CREATEDATE, UPDATEDATE) VALUES ('$ORDNO', '2', '$AMT2', '$EMAIL', '$CREATEDATE', '$UPDATEDATE')";
                        mysql_query($sql);
                        $sql = "UPDATE ITEMMAS SET ITEMAMT=ITEMAMT-$AMT2, UPDATEDATE='$UPDATEDATE' WHERE ITEMNO = 2";
                        mysql_query($sql);
                }
                if($AMT3 != null){
                        $sql = "INSERT INTO ORDITEMMAS (ORDNO, ITEMNO, ORDAMT, EMAIL, CREATEDATE, UPDATEDATE) VALUES ('$ORDNO', '3', '$AMT3', '$EMAIL', '$CREATEDATE', '$UPDATEDATE')";
                        mysql_query($sql);
                        $sql = "UPDATE ITEMMAS SET ITEMAMT=ITEMAMT-$AMT3, UPDATEDATE='$UPDATEDATE' WHERE ITEMNO = 3";
                        mysql_query($sql);
                }
                if($AMT4 != null){
                        $sql = "INSERT INTO ORDITEMMAS (ORDNO, ITEMNO, ORDAMT, EMAIL, CREATEDATE, UPDATEDATE) VALUES ('$ORDNO', '4', '$AMT4', '$EMAIL', '$CREATEDATE', '$UPDATEDATE')";
                        mysql_query($sql);
                        $sql = "UPDATE ITEMMAS SET ITEMAMT=ITEMAMT-$AMT4, UPDATEDATE='$UPDATEDATE' WHERE ITEMNO = 4";
                        mysql_query($sql);
                }
                $sql = "INSERT INTO ORDMAS (ORDNO, ORDTYPE, EMAIL, INVOICENO, ORDSTAT, PAYSTAT, REALPRICE, CREATEDATE, UPDATEDATE) VALUES ('$ORDNO', 'S', '$EMAIL', '$invoice', 'C', '1', '$real', '$CREATEDATE', '$UPDATEDATE')";
                mysql_query($sql);
                set_price_dir($ORDNO, $real);
                ?>
                <script>
                redirect("Update_ITEMMAS.php");
                alert("操作成功");
                </script>
                <?php 
        }
        else{
                ?>
                <script>
                redirect("Sold_ITEMMAS.php");
                alert("<?php echo $message;?>");
                </script>
                <?php 
        }
}
else{
        ?>
        <script>
        redirect("/");
        alert("您無權限觀看此頁面!");
        </script>
        <?php 
}