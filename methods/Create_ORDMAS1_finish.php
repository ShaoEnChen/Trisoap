<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
include("Helper/mysql_connect.php");
include("Helper/sql_operation.php");
include("Helper/handle_string.php");
$EMAIL = $_SESSION['EMAIL'];
$ORDTYPE = input('ORDTYPE');
$ORDINST = input('ORDINST');
if($EMAIL != null){
    $row = select('OWNMAS', 'COMNM', 'Trisoap');
    $ORDNOG = $row[5];
    $ORDNOS = $row[6];
    date_default_timezone_set('Asia/Taipei');
    $CREATEDATE = date("Y-m-d H:i:s");
    $UPDATEDATE = date("Y-m-d H:i:s");
    if($ORDTYPE == 'G'){
        $SHIPFEE = 20;
    	$sql = "insert into ORDMAS (ORDNO, ORDTYPE, EMAIL, ORDINST, SHIPFEE, CREATEDATE, UPDATEDATE) values ('$ORDNOG', '$ORDTYPE', '$EMAIL', '$ORDINST', '$SHIPFEE', '$CREATEDATE', '$UPDATEDATE')";
    	if(mysql_query($sql)){
    		$sql = "UPDATE OWNMAS SET NORDNOG=NORDNOG+1 where COMNM='Trisoap'";
    		mysql_query($sql);
    		$_SESSION['ORDNO'] = $ORDNOG;
            ?>
            <script>
            alert("訂單建立成功。");
            </script>
            <meta http-equiv=REFRESH CONTENT=0.5;url=../Homepage/product.php>
            <?
    	}
    	else{
            ?>
            <script>
            alert("訂單建立失敗");
            </script>
            <meta http-equiv=REFRESH CONTENT=0.5;url=Create_ORDMAS1.php>
            <?
    	}
    }
    else{
        $SHIPFEE = 50;
    	$sql = "insert into ORDMAS (ORDNO, ORDTYPE, EMAIL, ORDINST, SHIPFEE, CREATEDATE, UPDATEDATE) values ('$ORDNOS', '$ORDTYPE', '$EMAIL', '$ORDINST', '$SHIPFEE', '$CREATEDATE', '$UPDATEDATE')";
    	if(mysql_query($sql)){
    		$sql = "UPDATE OWNMAS SET NORDNOS=NORDNOS+1 where COMNM='Trisoap'";
    		mysql_query($sql);
    		$_SESSION['ORDNO'] = $ORDNOS;
            ?>
            <script>
            alert("訂單建立成功。");
            </script>
            <meta http-equiv=REFRESH CONTENT=0.5;url=../Homepage/product.php>
            <?
    	}
    	else{
            ?>
            <script>
            alert("訂單建立失敗");
            </script>
            <meta http-equiv=REFRESH CONTENT=0.5;url=Create_ORDMAS1.php>
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
