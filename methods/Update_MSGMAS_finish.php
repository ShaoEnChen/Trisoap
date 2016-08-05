<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
include("Helper/mysql_connect.php");
include("Helper/sql_operation.php");
include("Helper/handle_string.php");
include("Helper/mail/mail.php")
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$number = $_SESSION['number'];
$message = null;

if($EMAIL != null && $CUSIDT == 'A'){
        date_default_timezone_set('Asia/Taipei');
        $PUBLICDATE = date("Y-m-d H:i:s");
        while($number >= 0){
                $MSGNOnumber = 'MSGNO' . "$number";
                $MSGSTATnumber = 'MSGSTAT' . "$number";
                $MSGNO = input($MSGNOnumber);
                $MSGSTAT = input($MSGSTATnumber);
                if($MSGSTAT == 'F'){
                        $sql = "UPDATE MSGMAS SET ACTCODE='0' WHERE MSGNO='$MSGNO'";
                }
                elseif($MSGSTAT == 'D'){
                        $sql = "UPDATE MSGMAS SET MSGSTAT='$MSGSTAT', PUBLICDATE='$PUBLICDATE' WHERE MSGNO='$MSGNO'";
                }
                elseif($MSGSTAT == 'B'){
                        $sql = "UPDATE MSGMAS SET MSGSTAT='$MSGSTAT' WHERE MSGNO='$MSGNO'";
                        $findREWARD = search('REWARDSTAT', 'MSGMAS', 'MSGNO', $MSGNO);
                        if($findREWARD == 0){
                                $queryEMAIL = search('EMAIL', 'MSGMAS', 'MSGNO', $MSGNO);
                                $COMADD = search('COMADD', 'OWNMAS', 'COMNM', 'Trisoap');
                                $COMEMAIL = search('COMEMAIL', 'OWNMAS', 'COMNM', 'Trisoap');
                                $setREWARD = "UPDATE MSGMAS SET REWARDSTAT='1' WHERE MSGNO='$MSGNO'";
                                mysql_query($setREWARD);
                                $putREWARD = "UPDATE CUSMAS SET DISCOUNT=DISCOUNT+25 WHERE EMAIL='$queryEMAIL'";
                                mysql_query($putREWARD);
                                if(mysql_query($setREWARD) && mysql_query($putREWARD)){
                                        mail_pass_message($queryEMAIL, $COMADD, $COMEMAIL);
                                }
                        }
                        else{
                                $sql = "UPDATE MSGMAS SET MSGSTAT='$MSGSTAT' WHERE MSGNO='$MSGNO'";
                        }
                {
                else{
                        $sql = "UPDATE MSGMAS SET MSGSTAT='$MSGSTAT' WHERE MSGNO='$MSGNO'";
                }
                if(!mysql_query($sql)){
                        $message = $message . '儲存失敗<br>';
                }
        $number -= 1;
        }
        unset($_SESSION['number']);
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
                alert("儲存失敗");
                </script>
                <?
        }
        ?><meta http-equiv=REFRESH CONTENT=0.5;url=Update_MSGMAS.php><?
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