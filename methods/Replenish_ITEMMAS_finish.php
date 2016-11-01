<meta charset="utf-8">
<link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
<?php 
session_start();
include_once("Helper/mysql_connect.php");
include_once("Helper/sql_operation.php");
include_once("Helper/handle_string.php");
include_once("Helper/redirect.js");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$message = null;

if($EMAIL != null && $CUSIDT == 'A'){
        $ITEMNO = input('ITEMNO');
        $AMT = input('AMT');
        $PW = input('PW');
        $queryPW = search('CUSPW', 'CUSMAS', 'EMAIL', $EMAIL);
        if(encrypt($PW) != $queryPW){
                $message .= '密碼錯誤 \n';
        }
        $queryACTCODE = search('ACTCODE', 'ITEMMAS', 'ITEMNO', $ITEMNO);
        if($queryACTCODE == '0'){
                $queryITEMNO = search('ITEMNM', 'ITEMMAS', 'ITEMNO', $ITEMNO);
                $message = $message . $queryITEMNO . '下架中 \n';
        }
        if($AMT == null){
                $message = $message . '進貨數量欄位不可空白 \n';
        }
        if(is_int($AMT) == FALSE || $AMT < 0){
                $message .= '進貨數量必須為正整數 \n';
        }

        if($message == null){
        		date_default_timezone_set('Asia/Taipei');
                $UPDATEDATE = date("Y-m-d H:i:s");
                $sql = "UPDATE ITEMMAS SET ITEMAMT=ITEMAMT+$AMT, UPDATEDATE='$UPDATEDATE' WHERE ITEMNO='$ITEMNO'";
                if(mysql_query($sql)){
                        ?>
                        <script>
                        redirect("Update_ITEMMAS.php");
                        alert("操作成功");
                        </script>
                        <?php 
                }
                else{
                        ?>
                        <script>
                        redirect("Replenish_ITEMMAS.php");
                        alert("操作失敗");
                        </script>
                        <?php 
                }
        }
        else{
                ?>
                <script>
                redirect("Replenish_ITEMMAS.php");
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