<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
<?php
session_start();
include_once("Helper/mysql_connect.php");
include_once("Helper/sql_operation.php");
include_once("Helper/handle_string.php");
include_once("Helper/mail/mail.php");
include_once("Helper/redirect.js");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$message = null;

if($EMAIL != null && $CUSIDT == 'A'){
        $ORDNO = input('ORDNO');
        $ORDSTAT = input('ORDSTAT');
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
                                $message = $message . $AMT['ITEMNM'] . "目前下架中，已調整訂單狀態為強制結束" . '\n';
                                $sql = "UPDATE ORDMAS SET ORDSTAT='F', UPDATEDATE='$UPDATEDATE' WHERE ORDNO='$ORDNO'";
                                break;
                        }
                        elseif($AMT['ITEMAMT'] - $ITEMAMT < 0){
                                $message = $message . $AMT['ITEMNM'] . "數量不足，已調整訂單狀態為缺貨中" . '\n';
                                $sql = "UPDATE ORDMAS SET BACKCODE='1', UPDATEDATE='$UPDATEDATE' WHERE ORDNO='$ORDNO'";
                        }
                }
                if($message == null){
                        $_SESSION['ORIGIN'] = 'R';
                        $_SESSION['ORDNO'] = $ORDNO;
                        $queryEMAIL = search('EMAIL', 'ORDMAS', 'ORDNO', $ORDNO);
                        mail_pass_order($queryEMAIL, $ORDNO);
                        ?><script>redirect("Update_ORDMAS_finish.php");</script><?
                }
        }
        else
                $sql = "UPDATE ORDMAS SET ORDSTAT='$ORDSTAT', UPDATEDATE='$UPDATEDATE' WHERE ORDNO='$ORDNO'";
        mysql_query($sql);
        if($message == null){
                ?>
                <script>
                redirect("Update_ORDMAS_R.php");
                alert("儲存成功");
                </script>
                <?
        }
        else{
                ?>
                <script>
                redirect("Update_ORDMAS_R.php");
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
?>