<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
include("Helper/mysql_connect.php");
include("Helper/sql_operation.php");
include("Helper/handle_string.php");
include("Helper/mail/mail.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$message = null;

if($EMAIL != null && $CUSIDT == 'A'){
        $ORDNO = input('ORDNO');
        $ORDSTAT = input('ORDSTAT');
        date_default_timezone_set('Asia/Taipei');
        $UPDATEDATE = date("Y-m-d H:i:s");
        $MAILDATE = date("Y-m-d");
        if($ORDSTAT == 'D')
                $sql = "UPDATE ORDMAS SET ACTCODE='0', UPDATEDATE='$UPDATEDATE' WHERE ORDNO='$ORDNO'";
        elseif($ORDSTAT == 'C'){
                $queryDetail = "SELECT * FROM ORDITEMMAS WHERE ORDNO='$ORDNO'";
                $Detail = mysql_query($queryDetail);
                while($item = mysql_fetch_array($Detail)){
                        $ITEMNO = $item['ITEMNO'];
                        $ITEMAMT = $item['ORDAMT'];
                        $AMT = select('ITEMMAS', 'ITEMNO', $ITEMNO);
                        if($AMT['ACTCODE'] == 0){
                                $message = $message . $AMT['ITEMNM'] . "目前下架中，儲存失敗" . '\n';
                                $sql = "UPDATE ORDMAS SET ORDSTAT='F', UPDATEDATE='$UPDATEDATE' WHERE ORDNO='$ORDNO'";
                        }
                        elseif($AMT['ITEMAMT'] - $ITEMAMT < 0){
                                $message = $message . $AMT['ITEMNM'] . "數量不足，儲存失敗" . '\n';
                                $sql = "UPDATE ORDMAS SET ORDSTAT='F', UPDATEDATE='$UPDATEDATE' WHERE ORDNO='$ORDNO'";
                        }
                }
                if($message == null){
                        $_SESSION['ORIGIN'] = 'F';
                        $queryEMAIL = search('EMAIL', 'ORDMAS', 'ORDNO', $ORDNO);
                        $COMADD = search('COMADD', 'OWNMAS', 'COMNM', 'Trisoap');
                        $COMEMAIL = search('COMEMAIL', 'OWNMAS', 'COMNM', 'Trisoap');
                        mail_pass_order($queryEMAIL, $ORDNO, $COMADD, $COMEMAIL);
                        ?><meta http-equiv=REFRESH CONTENT=0.5;url=Update_ORDMAS_finish.php><?
                }
        }
        else
                $sql = "UPDATE ORDMAS SET ORDSTAT='$ORDSTAT', UPDATEDATE='$UPDATEDATE' WHERE ORDNO='$ORDNO'";
        mysql_query($sql);
        if($message == null){
                ?>
                <script>
                alert("儲存成功");
                </script>
                <?
        }
        else{
                ?>
                <script>
                alert("<?echo $message;?>");
                </script>
                <?
        }
        ?><meta http-equiv=REFRESH CONTENT=0.5;url=Update_ORDMAS_F.php><?
}
else{
        ?>
        <script>
        alert("您無權限觀看此頁面!");
        </script>
        <meta http-equiv=REFRESH CONTENT=0.5;url=../Homepage/index.php>
        <?
}
?>