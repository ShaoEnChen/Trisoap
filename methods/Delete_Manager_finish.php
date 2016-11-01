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
    $newEMAIL = input('newEMAIL');
    $PW = input('CUSPW');
    $queryPW = search('CUSPW', 'CUSMAS', 'EMAIL', $EMAIL);
    if(encrypt($PW) != $queryPW){
        $message = $message . '密碼錯誤<br>';
    }
    $querynewEMAIL = search('EMAIL', 'CUSMAS', 'EMAIL', $newEMAIL);
    if($querynewEMAIL == null){
        $message .= '請輸入正確的會員信箱 \n';
    }

    if($message == null){
        $sql = "UPDATE CUSMAS SET CUSIDT='B' WHERE EMAIL='$newEMAIL'";
        if(mysql_query($sql)){
            ?>
            <script>
            redirect("Update_Manager.php");
            alert("刪除成功");
            </script>
            <?php 
        }
        else{
            ?>
            <script>
            redirect("Delete_Manager.php");
            alert("刪除失敗");
            </script>
            <?php 
        }
    }
    else{
        ?>
        <script>
        redirect("Delete_Manager.php");
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