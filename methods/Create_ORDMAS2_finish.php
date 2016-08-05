<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
include("Helper/mysql_connect.php");
include("Helper/handle_string.php");
include("Helper/update_price.php");
$EMAIL = $_SESSION['EMAIL'];
$ORDTYPE = input('ORDTYPE');
$TEL = input('TEL');
$CUSADD = input('CUSADD');
$ORDINST = input('ORDINST');
if($EMAIL != null){
    if($TEL != null){
        $sql = "UPDATE CUSMAS SET TEL='$TEL' WHERE EMAIL='$EMAIL'";
        mysql_query($sql);
    }
    if($CUSADD != null){
        $sql = "UPDATE CUSMAS SET CUSADD='$CUSADD' WHERE EMAIL='$EMAIL'";
        mysql_query($sql);
    }
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
                alert("訂單建立成功，將為您導向歐付寶頁面。");
            </script>
            <meta http-equiv=REFRESH CONTENT=0.5;url=cashing_test.php>
            <?
    	}
    	else{
            ?>
            <script>
                alert("訂單建立失敗");
            </script>
            <meta http-equiv=REFRESH CONTENT=0.5;url=Create_ORDMAS2.php>
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
                alert("訂單建立成功，將為您導向歐付寶頁面。");
            </script>
            <meta http-equiv=REFRESH CONTENT=0.5;url=cashing_test.php>
            <?
    	}
    	else{
            ?>
            <script>
                alert("訂單建立失敗");
            </script>
            <meta http-equiv=REFRESH CONTENT=0.5;url=Create_ORDMAS2.php>
            <?
    	}
    }
}
else{
    ?>
    <script>
    alert("您無權限觀看此頁面!");
    </script>
    <meta http-equiv=REFRESH CONTENT=0.5;url=../Homepage/index.php>
    <?
}
