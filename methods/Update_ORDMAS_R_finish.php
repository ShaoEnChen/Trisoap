<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
include("Helper/mysql_connect.php");
include("Helper/sql_operation.php");
include("Helper/mail/mail.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$message = null;

if($EMAIL != null && $CUSIDT == 'A'){
        $ORDNO = $_POST['ORDNO'];
        $ORDSTAT = $_POST['ORDSTAT'];
        date_default_timezone_set('Asia/Taipei');
        $UPDATEDATE = date("Y-m-d H:i:s");
        $MAILDATE = date("Y-m-d");
        if($ORDSTAT == 'B')
                $sql = "UPDATE ORDMAS SET BACKCODE='1', UPDATEDATE='$UPDATEDATE' WHERE ORDNO='$ORDNO'";
        elseif($ORDSTAT == 'C'){
                $queryDetail = "SELECT * FROM ORDITEMMAS WHERE ORDNO='$ORDNO'";
                $Detail = mysql_query($queryDetail);
                while($item = mysql_fetch_array($Detail)){
                        $ITEMNO = $item['ITEMNO'];
                        $ITEMAMT = $item['ORDAMT'];
                        $AMT = select('ITEMMAS', 'ITEMNO', $ITEMNO);
                        if($AMT['ACTCODE'] == 0){
                                $message = $message . $AMT['ITEMNM'] . "目前下架中，已調整訂單狀態為強制結束<br>";
                                $sql = "UPDATE ORDMAS SET ORDSTAT='F', UPDATEDATE='$UPDATEDATE' WHERE ORDNO='$ORDNO'";
                                break;
                        }
                        elseif($AMT['ITEMAMT'] - $ITEMAMT < 0){
                                $message = $message . $AMT['ITEMNM'] . "數量不足，已調整訂單狀態為缺貨中";
                                $sql = "UPDATE ORDMAS SET BACKCODE='1', UPDATEDATE='$UPDATEDATE' WHERE ORDNO='$ORDNO'";
                        }
                }
                if($message == null){
                        $_SESSION['ORIGIN'] = 'R';
                        $queryEMAIL = select('EMAIL', 'ORDMAS', 'ORDNO', $ORDNO);
                        mail_pass_order($queryEMAIL, $ORDNO);
                        echo '<meta http-equiv=REFRESH CONTENT=0.5;url=Update_ORDMAS_finish.php>';
                }
        }
        else
                $sql = "UPDATE ORDMAS SET ORDSTAT='$ORDSTAT', UPDATEDATE='$UPDATEDATE' WHERE ORDNO='$ORDNO'";
        mysql_query($sql);
        if($message == null)
                echo "儲存成功";
        else
                echo $message;
        echo '<meta http-equiv=REFRESH CONTENT=2;url=Update_ORDMAS_R.php>';
}
else{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=../Homepage/index.php>';
}
?>