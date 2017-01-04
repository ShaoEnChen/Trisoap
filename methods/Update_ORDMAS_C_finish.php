<meta charset="utf-8">
<link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
<?php
session_start();
include_once("Helper/mysql_connect.php");
include_once("Helper/handle_string.php");
include_once("Helper/redirect.js");
include_once("Helper/analyticstracking.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];

if($EMAIL != null && $CUSIDT == 'A'){
        $ORDNO = input('ORDNO');
        $ORDSTAT = input('ORDSTAT');
        date_default_timezone_set('Asia/Taipei');
        $UPDATEDATE = date("Y-m-d H:i:s");
        if($ORDSTAT == 'D')
                $sql = "UPDATE ORDMAS SET ACTCODE='0', UPDATEDATE='$UPDATEDATE' WHERE ORDNO='$ORDNO'";
        else
                $sql = "UPDATE ORDMAS SET ORDSTAT='$ORDSTAT', UPDATEDATE='$UPDATEDATE' WHERE ORDNO='$ORDNO'";
        if(mysql_query($sql)){
                ?>
                <script>
                redirect("Update_ORDMAS_C.php");
                alert("儲存成功");
                </script>
                <?php 
        }
        else{
                ?>
                <script>
                redirect("Update_ORDMAS_C.php");
                alert("儲存失敗");
                </script>
                <?php 
        }
}
else{
        ?>
        <script>
        redirect("/");
        alert("您無權限觀看此頁面!");
        </script>
        <?php 
}
?>