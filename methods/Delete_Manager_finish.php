<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
<?php
include_once("Helper/mysql_connect.php");
include_once("Helper/sql_operation.php");
include_once("Helper/handle_string.php");
include_once("Helper/redirect.js");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$message = null;

if($EMAIL != null && $CUSIDT == 'A'){
    $newEMAIL = $_POST['newEMAIL'];
    $PW = input('CUSPW');
    $queryPW = search('CUSPW', 'CUSAMS', 'EMAIL', $EMAIL);
    if(encrypt($PW) != $queryPW){
        $message = $message . '密碼錯誤<br>';
    }

    if($message == null){
        $sql = "UPDATE CUSMAS SET CUSIDT='B' WHERE EMAIL='$newEMAIL'";
        if(mysql_query($sql)){
            ?>
            <script>
            redirect("Update_Manager.php");
            alert("刪除成功");
            </script>
            <?
        }
        else{
            ?>
            <script>
            redirect("Delete_Manager.php");
            alert("刪除失敗");
            </script>
            <?
        }
    }
    else{
        ?>
        <script>
        redirect("Update_Manager.php");
        alert("密碼錯誤");
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