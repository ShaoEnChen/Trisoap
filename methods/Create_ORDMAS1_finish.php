<meta charset="utf-8">
<link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
<?php
session_start();
include_once("Helper/mysql_connect.php");
include_once("Helper/sql_operation.php");
include_once("Helper/handle_string.php");
include_once("Helper/update_price.php");
include_once("Helper/redirect.js");
include_once("Helper/analyticstracking.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
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
	if($ORDAMT_1 != null){
		if($ORDAMT_1 != (int)$ORDAMT_1 || (int)$ORDAMT_1 < 0){
	        $message .= '訂購數量必須為正整數 \n';
	    }
	}
	else{
		$ORDAMT_1 = 0;
	}
	if($ORDAMT_2 != null){
		if($ORDAMT_2 != (int)$ORDAMT_2 || (int)$ORDAMT_2 < 0){
	        $message .= '訂購數量必須為正整數 \n';
	    }
	}
	else{
		$ORDAMT_2 = 0;
	}
	if($ORDAMT_3 != null){
		if($ORDAMT_3 != (int)$ORDAMT_3 || (int)$ORDAMT_3 < 0){
	        $message .= '訂購數量必須為正整數 \n';
	    }
	}
	else{
		$ORDAMT_3 = 0;
	}
	if($ORDAMT_4 != null){
		if($ORDAMT_4 != (int)$ORDAMT_4 || (int)$ORDAMT_4 < 0){
	        $message .= '訂購數量必須為正整數 \n';
	    }
	}
	else{
		$ORDAMT_4 = 0;
	}
    if($PRICETYPE == ''){
        if($SETPRICE == null){
            $message .= '請填寫自訂價格 \n';
        }
        else if($SETPRICE != (int)$SETPRICE || (int)$SETPRICE < 0){
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
        date_default_timezone_set('Asia/Taipei');
        $CREATEDATE = date("Y-m-d H:i:s");
        $UPDATEDATE = date("Y-m-d H:i:s");
        $ORDTYPE = 'G';
        $SHIPFEE = 0;
        $sql = "INSERT INTO ORDMAS (ORDNO, ORDTYPE, EMAIL, ORDINST, SHIPFEE, CREATEDATE, UPDATEDATE) values ('$ORDNOG', '$ORDTYPE', '$EMAIL', '$ORDINST', '$SHIPFEE', '$CREATEDATE', '$UPDATEDATE')";
        if(mysql_query($sql)){
            $sql = "UPDATE OWNMAS SET NORDNOG=NORDNOG+1 where COMNM='Trisoap'";
            mysql_query($sql);
            if($ORDAMT_1 != 0){
                $sql = "INSERT INTO ORDITEMMAS (ORDNO, ITEMNO, ORDAMT, EMAIL, CREATEDATE, UPDATEDATE) values ('$ORDNOG', '1', '$ORDAMT_1', '$EMAIL', '$CREATEDATE', '$UPDATEDATE')";
                mysql_query($sql);
            }
            if($ORDAMT_2 != 0){
                $sql = "INSERT INTO ORDITEMMAS (ORDNO, ITEMNO, ORDAMT, EMAIL, CREATEDATE, UPDATEDATE) values ('$ORDNOG', '2', '$ORDAMT_2', '$EMAIL', '$CREATEDATE', '$UPDATEDATE')";
                mysql_query($sql);
            }
            if($ORDAMT_3 != 0){
                $sql = "INSERT INTO ORDITEMMAS (ORDNO, ITEMNO, ORDAMT, EMAIL, CREATEDATE, UPDATEDATE) values ('$ORDNOG', '3', '$ORDAMT_3', '$EMAIL', '$CREATEDATE', '$UPDATEDATE')";
                mysql_query($sql);
            }
            if($ORDAMT_4 != 0){
                $sql = "INSERT INTO ORDITEMMAS (ORDNO, ITEMNO, ORDAMT, EMAIL, CREATEDATE, UPDATEDATE) values ('$ORDNOG', '4', '$ORDAMT_4', '$EMAIL', '$CREATEDATE', '$UPDATEDATE')";
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
            ?>
            <script>
            redirect("/");
            alert("訂單建立成功。");
            </script>
            <?php 
        }
        else{
            ?>
            <script>
            redirect("Create_ORDMAS1.php");
            alert("訂單建立失敗");
            </script>
            <?php 
        }
    }
    else{
        ?>
        <script>
        redirect("Create_ORDMAS1.php");
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
?>
