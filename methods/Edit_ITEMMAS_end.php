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
$newITEMNO = $_SESSION['newITEMNO'];
$newITEMNM = input('ITEMNM');
$newPRICE = input('PRICE');
$newDESCRIPTION = input('$DESCRIPTION');
$message1 = null;
$message2 = null;

if($EMAIL != null && $CUSIDT == 'A'){
        $PW = input('PW');
        $queryPW = search('CUSPW', 'CUSMAS', 'EMAIL', $EMAIL);
        if(encrypt($PW) != $queryPW){
                $message1 = $message1 . '密碼錯誤 \n';
        }
        if($newITEMNM == null){
                $message1 = $message1 . '商品名稱欄位不可空白 \n';
        }
        if($newPRICE == null){
                $message1 = $message1 . '商品價格欄位不可空白 \n';
        }
        if($newPRICE != (int)$newPRICE || (int)$newPRICE < 0){
                $message1 = $message1 . '商品價格必須為正整數 \n';
        }

        if($message1 == null){
                $sql = "UPDATE ITEMMAS SET ITEMNM='$newITEMNM' WHERE ITEMNO='$newITEMNO'";
                if(!mysql_query($sql))
                        $message2 = $message2 . '更新商品名稱失敗 \n';
                $sql = "UPDATE ITEMMAS SET PRICE='$newPRICE' WHERE ITEMNO='$newITEMNO'";
                if(!mysql_query($sql))
                        $message2 = $message2 . '更新商品價格失敗 \n';
                $sql = "UPDATE ITEMMAS SET DESCRIPTION='$newDESCRIPTION' WHERE ITEMNO='$newITEMNO'";
                if(!mysql_query($sql))
                        $message2 = $message2 . '更新商品敘述失敗 \n';
                unset($_SESSION['newITEMNO']);
                if($message2 == null){
                        ?>
                        <script>
                        redirect("Update_ITEMMAS.php");
                        alert("更新成功");
                        </script>
                        <?php
                }
                else{
                        ?>
                        <script>
                        redirect("Edit_ITEMMAS.php");
                        alert("更新失敗");
                        </script>
                        <?php
                }
        }
        else{
                ?>
                <script>
                redirect("Edit_ITEMMAS.php");
                alert("<?php echo $message1;?>");
                </script>
                <?php
                unset($_SESSION['newITEMNO']);
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