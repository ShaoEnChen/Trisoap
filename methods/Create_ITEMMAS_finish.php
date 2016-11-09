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
$newITEMNO = input('ITEMNO');
$newITEMNM = input('ITEMNM');
$newITEMAMT = input('ITEMAMT');
$newPRICE = input('PRICE');
$newDESCRIPTION = input('$DESCRIPTION');
$message = null;

if($EMAIL != null && $CUSIDT == 'A'){
        $PW = input('PW');
        $queryPW = search('CUSPW', 'CUSMAS', 'EMAIL', $EMAIL);
        if(encrypt($PW) != $queryPW){
                $message = $message . '密碼錯誤 \n';
        }
        if($newITEMNO == null){
                $message = $message . '商品編號欄位不可空白 \n';
        }  
        if($newITEMNM == null){
                $message = $message . '商品名稱欄位不可空白 \n';
        }
        if($newITEMAMT != (int)$newITEMAMT || (int)$newITEMAMT < 0){
                $message = $message . '商品數量必須為正整數 \n';
        }
        if($newPRICE == null){
                $message = $message . '商品價格欄位不可空白 \n';
        }
        if($newPRICE != (int)$newPRICE || (int)$newPRICE < 0){
                $message = $message . '商品價格必須為正整數 \n';
        }
        $queryITEMNO = search('ITEMNO', 'ITEMMAS', 'ITEMNO', $newITEMNO);
        if($queryITEMNO != null){
                $message = $message . '此商品編號已存在 \n';
        }

        if($message == null){
                $sql = "insert into ITEMMAS (ITEMNO, ITEMNM, ITEMAMT, PRICE, DESCRIPTION) values ('$newITEMNO', '$newITEMNM', '$newITEMAMT', '$newPRICE', '$newDESCRIPTION')";
                if(mysql_query($sql)){
                        ?>
                        <script>
                        redirect("Update_ITEMMAS.php");
                        alert("新增成功");
                        </script>
                        <?php 
                }
                else{
                        ?>
                        <script>
                        redirect("Create_ITEMMAS.php");
                        alert("新增失敗");
                        </script>
                        <?php 
                }
        }
        else{
                ?>
                <script>
                redirect("Create_ITEMMAS.php");
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