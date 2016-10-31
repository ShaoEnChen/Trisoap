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
        $newITEMNO = input('ITEMNO');
        $PW = input('PW');
        $queryPW = search('CUSPW', 'CUSMAS', 'EMAIL', $EMAIL);
        if(encrypt($PW) != $queryPW){
                $message = $message . '密碼錯誤 \n';
        }
        $row = select('ITEMMAS', 'ITEMNO', $newITEMNO);
        if($row['ACTCODE'] == '1'){
                $message = $message . $row['ITEMNM'] . "已經上市";
        }

        if($message == null){
                $sql = "UPDATE ITEMMAS SET ACTCODE='1' WHERE ITEMNO='$newITEMNO'";
                if(mysql_query($sql)){
                        ?>
                        <script>
                        redirect("Update_ITEMMAS.php");
                        alert("上市成功");
                        </script>
                        <?php 
                }
                else{
                        ?>
                        <script>
                        redirect("Upload_ITEMMAS.php");
                        alert("上市失敗");
                        </script>
                        <?php 
                }
        }
        else{
                ?>
                <script>
                redirect("Upload_ITEMMAS.php");
                alert("<?php echo $message;?>");
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