<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
include("Helper/mysql_connect.php");
include("Helper/sql_operation.php");
include("Helper/mail.mail.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$message = null;

if($EMAIL != null && $CUSIDT == 'A'){
        $ORDNO = $_POST['ORDNO'];
        $ORDSTAT = $_POST['ORDSTAT'];
        date_default_timezone_set('Asia/Taipei');
        $UPDATEDATE = date("Y-m-d H:i:s");
        $sql = "UPDATE ORDMAS SET ORDSTAT='$ORDSTAT', UPDATEDATE='$UPDATEDATE' WHERE ORDNO='$ORDNO'";
        if(mysql_query($sql)){
                echo "儲存成功";
                $queryEMAIL = search('EMAIL', 'ORDMAS', 'ORDNO', $ORDNO);
                $queryName = search('CUSNM', 'CUSMAS', 'EMAIL', $queryEMAIL);
                mail_receive_order($queryEMAIL, $ORDNO, $queryName);
        }
        else
                echo "儲存失敗";
        echo '<meta http-equiv=REFRESH CONTENT=2;url=Update_ORDMAS_E.php>';
}
else{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=../Homepage/index.php>';
}
?>