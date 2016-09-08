<meta charset="utf-8">
<link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
<?php
session_start();
include_once("Helper/mysql_connect.php");
include_once("Helper/sql_operation.php");
include_once("Helper/redirect.js");
$EMAIL = $_SESSION['EMAIL'];
$ORDNO = $_POST['ORDNO'];
$message = null;

if($EMAIL != null){
        $row = select('ORDMAS', 'ORDNO', $ORDNO);
        date_default_timezone_set('Asia/Taipei');
        $UPDATEDATE = date("Y-m-d H:i:s");
        if($row['ORDSTAT'] != 'E'){
                $message = $message . '此訂單已進入執行狀態，故無法取消<br>';
        }
        if($row['PAYSTAT'] == '1'){
                $message = $message . '無法取消已付款之訂單<br>';
        }
        if($message == null){
                $sql = "UPDATE ORDMAS SET ACTCODE='0', UPDATEDATE='$UPDATEDATE' WHERE ORDNO='$ORDNO'";
                if(!mysql_query($sql)){
                        $message = $message . '刪除失敗<br>';
                }
                $sql = "UPDATE ORDITEMMAS SET ACTCODE='0', UPDATEDATE='$UPDATEDATE' WHERE ORDNO='$ORDNO'";
                if(!mysql_query($sql)){
                        $message = $message . '刪除失敗<br>';
                }
        }
        else{
                ?>
                <script>
                redirect("Delete_ORDMAS.php");
                alert("<?echo $message;?>");
                </script>
                <?
        }
        if($message == null){
                ?>
                <script>
                redirect("View_ORDMAS.php");
                alert("取消成功");
                </script>
                <?
        }
        else{
                ?>
                <script>
                redirect("Delete_ORDMAS.php");
                alert("取消失敗");
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