<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
include("Helper/mysql_connect.php");
include("Helper/handle_string.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$newITEMNO = $_SESSION['newITEMNO'];
$message = null;

if($EMAIL != null && $CUSIDT == 'A'){
        $PW = input('PW');
        $queryPW = search('CUSPW', 'CUSMAS', 'EMAIL', $EMAIL);
        if(encrypt($PW) != $queryPW){
                $message = $message . '密碼錯誤<br>';
        }

        if($message == null){
                $sql = "UPDATE ITEMMAS SET ACTCODE='0' WHERE ITEMNO='$newITEMNO'";
                unset($_SESSION['newITEMNO']);
                if(mysql_query($sql)){
                        echo '下架成功';
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=Update_ITEMMAS.php>';
                }
                else{
                        echo '下架失敗';
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=Delete_ITEMMAS.php>';
                }
        }
        else{
                echo $message;
                unset($_SESSION['newITEMNO']);
                echo '<meta http-equiv=REFRESH CONTENT=2;url=Delete_ITEMMAS.php>';
        }
}
else{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=../Homepage/index.php>';
}