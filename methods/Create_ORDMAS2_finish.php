<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
<?php
session_start();
include_once("Helper/mysql_connect.php");
include_once("Helper/handle_string.php");
include_once("Helper/update_price.php");
include_once("Helper/redirect.js");
$EMAIL = $_SESSION['EMAIL'];
$ORDTYPE = input('ORDTYPE');
$TEL = input('TEL');
$TELid = input('TELid');
$CUSADD = input('CUSADD');
$CUSADDid = input('CUSADDid');
$ORDINST = input('ORDINST');
$PAYTYPE = input('PAYTYPE');
$message = '';
if($EMAIL != null){
    if($TELid == 'Y'){
        if($TEL != null){
            $sql = "UPDATE CUSMAS SET TEL='$TEL' WHERE EMAIL='$EMAIL'";
            mysql_query($sql);
        }
        else{
            $message .= '請填寫您的聯絡電話 \n';
        }
    }
    if($CUSADDid == 'Y'){
        if($CUSADD != null){
            $sql = "UPDATE CUSMAS SET CUSADD='$CUSADD' WHERE EMAIL='$EMAIL'";
            mysql_query($sql);
        }
        else{
            $message .= '請填寫您的通訊地址 \n';
        }
    }
    if($PAYTYPE != null){
        $_SESSION['PAYTYPE'] = $PAYTYPE;
    }
    else{
        $message .= '請選擇付款方式 \n';
    }
    if($message != ''){
        ?>
        <script>
        redirect("Create_ORDMAS2.php");
        alert("<?echo $message;?>");
        </script>
        <?
    }
    else{
        $row = select('OWNMAS', 'COMNM', 'Trisoap');
        $ORDNOG = $row['NORDNOG'];
        $ORDNOS = $row['NORDNOS'];
        date_default_timezone_set('Asia/Taipei');
        $CREATEDATE = date("Y-m-d H:i:s");
        $UPDATEDATE = date("Y-m-d H:i:s");
        if($ORDTYPE == 'G'){
            $SHIPFEE = 20;
            $sql = "insert into ORDMAS (ORDNO, ORDTYPE, EMAIL, ORDINST, SHIPFEE, CREATEDATE, UPDATEDATE) values ('$ORDNOG', '$ORDTYPE', '$EMAIL', '$ORDINST', '$SHIPFEE', '$CREATEDATE', '$UPDATEDATE')";
            if(mysql_query($sql)){
                $sql = "UPDATE OWNMAS SET NORDNOG=NORDNOG+1 where COMNM='Trisoap'";
                mysql_query($sql);
                $sql = "UPDATE ORDITEMMAS SET ORDNO = $ORDNOG WHERE ORDNO = 100000000 AND EMAIL = '$EMAIL'";
                mysql_query($sql);
                update_price($ORDNOG);
                $_SESSION['ORDNO'] = $ORDNOG;
                ?>
                <script>
                redirect("cashing_test.php");
                alert("訂單建立成功，將為您導向歐付寶頁面。");
                </script>
                <?
            }
            else{
                ?>
                <script>
                redirect("Create_ORDMAS2.php");
                alert("訂單建立失敗");
                </script>
                <?
            }
        }
        else{
            $SHIPFEE = 50;
            $sql = "insert into ORDMAS (ORDNO, ORDTYPE, EMAIL, ORDINST, SHIPFEE, CREATEDATE, UPDATEDATE) values ('$ORDNOS', '$ORDTYPE', '$EMAIL', '$ORDINST', '$SHIPFEE', '$CREATEDATE', '$UPDATEDATE')";
            if(mysql_query($sql)){
                $sql = "UPDATE OWNMAS SET NORDNOS=NORDNOS+1 where COMNM='Trisoap'";
                mysql_query($sql);
                $sql = "UPDATE ORDITEMMAS SET ORDNO = $ORDNOS WHERE ORDNO = 100000000 AND EMAIL = '$EMAIL'";
                mysql_query($sql);
                update_price($ORDNOG);
                $_SESSION['ORDNO'] = $ORDNOS;
                ?>
                <script>
                redirect("cashing_test.php");
                alert("訂單建立成功，將為您導向歐付寶頁面。");
                </script>
                <?
            }
            else{
                ?>
                <script>
                redirect("Create_ORDMAS2.php");
                alert("訂單建立失敗");
                </script>
                <?
            }
        }
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
