<meta charset="utf-8">
<link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
<?php 
session_start();
include_once("Helper/mysql_connect.php");
include_once("Helper/handle_string.php");
include_once("Helper/sql_operation.php");
include_once("Helper/redirect.js");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$DCTID = input('DCTID');
$PW = input('PW');
$message = null;

if($EMAIL != null && $CUSIDT == 'A'){
        $queryPW = search('CUSPW', 'CUSMAS', 'EMAIL', $EMAIL);
        if(encrypt($PW) != $queryPW){
                $message .= $message . '密碼錯誤 \n';
        }
        if($DCTID == null){
                $message .= $message . '折扣兌換碼欄位不可空白 \n';
        }
        $queryDCT = search('DCTID', 'DCTMAS', 'DCTID', $DCTID);
        if($queryDCT == null){
                $message .= $message . '查無此折扣兌換碼 \n';
        }

        if($message == null){
                $sql = "UPDATE DCTMAS SET ACTCODE = '0' WHERE DCTID = '$DCTID'";
                if(mysql_query($sql)){
                        ?>
                        <script>
                        redirect("Update_DCTMAS.php");
                        alert("刪除成功");
                        </script>
                        <?php 
                }
                else{
                        ?>
                        <script>
                        redirect("Delete_DCTMAS.php");
                        alert("刪除失敗");
                        </script>
                        <?php 
                }
        }
        else{
                ?>
                <script>
                redirect("Delete_DCTMAS.php");
                alert("<?php echo $message;?>");
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