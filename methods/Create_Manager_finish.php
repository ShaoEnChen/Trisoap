<meta charset="utf-8">
<link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
<?php
session_start();
include_once("Helper/mysql_connect.php");
include_once("Helper/sql_operation.php");
include_once("Helper/handle_string.php");
include_once("Helper/redirect.js");
include_once("Helper/analyticstracking.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$message = null;

if($EMAIL != null && $CUSIDT == 'A'){
    $newEMAIL = input('newEMAIL');
    $PW = input('CUSPW');
    $queryPW = search('CUSPW', 'CUSMAS', 'EMAIL', $EMAIL);
    if(encrypt($PW) != $queryPW){
        $message .= '密碼錯誤 \n';
    }
    $querynewEMAIL = search('EMAIL', 'CUSMAS', 'EMAIL', $newEMAIL);
    if($querynewEMAIL == null){
        $message .= '請輸入正確的會員信箱 \n';
    }

    if($message == null){
        $sql = "UPDATE CUSMAS SET CUSIDT='A' WHERE EMAIL='$newEMAIL'";
        if(mysql_query($sql)){
            ?>
            <script>
            redirect("Update_Manager.php");
            alert("新增成功");
            </script>
            <?php 
        }
        else{
            ?>
            <script>
            redirect("Create_Manager.php");
            alert("新增失敗");
            </script>
            <?php 
        }
    }
    else{
        ?>
        <script>
        redirect("Create_Manager.php");
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