<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
<?php
session_start();
include("Helper/mysql_connect.php");
include("Helper/sql_operation.php");
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
                alert("<?echo $message;?>");
                </script>
                <meta http-equiv=REFRESH CONTENT=0;url=Delete_ORDMAS.php>
                <?
        }
        if($message == null){
                ?>
                <script>
                alert("取消成功");
                </script>
                <meta http-equiv=REFRESH CONTENT=0;url=View_ORDMAS.php>
                <?
        }
        else{
                ?>
                <script>
                alert("取消失敗");
                </script>
                <meta http-equiv=REFRESH CONTENT=0;url=Delete_ORDMAS.php>
                <?
        }
}
else{
        ?>
        <script>
        alert("您無權限觀看此頁面!");
        </script>
        <meta http-equiv=REFRESH CONTENT=0;url=../Homepage/index.php>
        <?
}
?>