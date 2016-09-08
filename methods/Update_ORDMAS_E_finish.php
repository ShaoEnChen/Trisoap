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
$message = null;

function show_PAYTYPE($PAYTYPE){
        if($PAYTYPE == 'A') return "信用卡";
        elseif($PAYTYPE == 'B') return "ATM";
        elseif($PAYTYPE == 'C') return "網路ATM";
}

if($EMAIL != null && $CUSIDT == 'A'){
        $ORDNO = input('ORDNO');
        $ORDSTAT = input('ORDSTAT');
        date_default_timezone_set('Asia/Taipei');
        $UPDATEDATE = date("Y-m-d H:i:s");
        $sql = "UPDATE ORDMAS SET ORDSTAT='$ORDSTAT', UPDATEDATE='$UPDATEDATE' WHERE ORDNO='$ORDNO'";
        if(mysql_query($sql)){
                $queryEMAIL = search('EMAIL', 'ORDMAS', 'ORDNO', $ORDNO);
                $queryPAYTYPE = show_PAYTYPE(search('PAYTYPE', 'ORDMAS', 'ORDNO', $ORDNO));
                $queryName = search('CUSNM', 'CUSMAS', 'EMAIL', $queryEMAIL);
                mail_receive_order($queryEMAIL, $ORDNO, $queryPAYTYPE, $queryName);
                ?>
                <script>
                redirect("Update_ORDMAS_E.php");
                alert("儲存成功");
                </script>
                <?
        }
        else{
                ?>
                <script>
                redirect("Update_ORDMAS_E.php");
                alert("儲存失敗");
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