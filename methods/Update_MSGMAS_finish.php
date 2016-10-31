<meta charset="utf-8">
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
                                $setREWARD = "UPDATE MSGMAS SET REWARDSTAT='1' WHERE MSGNO='$MSGNO'";
                                $putREWARD = "UPDATE CUSMAS SET DISCOUNT=DISCOUNT+25 WHERE EMAIL='$queryEMAIL'";
                                if(mysql_query($setREWARD) && mysql_query($putREWARD)){
                                        mail_pass_message($queryEMAIL);
                                }
                        }
                        else{
                                $sql = "UPDATE MSGMAS SET MSGSTAT='$MSGSTAT' WHERE MSGNO='$MSGNO'";
                        }
                }
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
                redirect("Update_MSGMAS.php");
                alert("儲存成功");
                </script>
                <?php 
        }
        else{
                ?>
                <script>
                redirect("Update_MSGMAS.php");
                alert("儲存失敗");
                </script>
                <?php 
        }
}
else{
        ?>
        <script>
        redirect("../Homepage/index.php");
        alert("您無權限觀看此頁面!");
        </script>
        <?php 
}
?>