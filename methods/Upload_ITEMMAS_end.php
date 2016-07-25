<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("Helper/mysql_connect.php");
include("Helper/sql_operation.php");
include("Helper/handle_string.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$newITEMNO = $_SESSION['newITEMNO'];
$message = null;

if($EMAIL != null){
        if($CUSIDT == 'A'){
                $PW = $_POST['PW'];
                $queryPW = search('CUSPW', 'CUSMAS', 'EMAIL', $EMAIL);
                if(encrypt($PW) != $queryPW){
                        $message = $message . '密碼錯誤<br>';
                }
                date_default_timezone_set('Asia/Taipei');
                $UPDATEDATE = date("Y-m-d H:i:s");
                if($message == null){
                        $sql = "UPDATE ITEMMAS SET ACTCODE='1', UPDATEDATE='$UPDATEDATE' WHERE ITEMNO='$newITEMNO'";
                        unset($_SESSION['newITEMNO']);
                        if(mysql_query($sql)){
                                echo '上市成功';
                                echo '<meta http-equiv=REFRESH CONTENT=2;url=Update_ITEMMAS.php>';
                        }
                        else{
                                echo '上市失敗';
                                echo '<meta http-equiv=REFRESH CONTENT=2;url=Upload_ITEMMAS.php>';
                        }
                }
                else{
                        echo $message;
                        unset($_SESSION['newITEMNO']);
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=Upload_ITEMMAS.php>';
                }
        }
        else{
                echo '您無權限觀看此頁面!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePage/index.php>';
        }
}
else{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePage/index.php>';
}