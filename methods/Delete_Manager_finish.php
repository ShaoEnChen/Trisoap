<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("Helper/mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$message = null;

if($EMAIL != null && $CUSIDT == 'A'){
    $newEMAIL = $_POST['newEMAIL'];
    $PW = $_POST['CUSPW'];
    $queryPW = "SELECT CUSPW FROM CUSMAS where EMAIL = '$EMAIL'";
    $result = mysql_query($queryPW);
    $row = mysql_fetch_row($result);
    if($PW != $row[0]){
        $message = $message . '密碼錯誤<br>';
    }

    if($message == null){
        $sql = "UPDATE CUSMAS SET CUSIDT='B' WHERE EMAIL='$newEMAIL'";
        if(mysql_query($sql)){
            ?>
            <script>
            alert("刪除成功");
            </script>
            <meta http-equiv=REFRESH CONTENT=0.5;url=Update_Manager.php>
            <?
        }
        else{
            ?>
            <script>
            alert("刪除失敗");
            </script>
            <meta http-equiv=REFRESH CONTENT=0.5;url=Delete_Manager.php>
            <?
        }
    }
    else{
        ?>
        <script>
        alert("密碼錯誤");
        </script>
        <meta http-equiv=REFRESH CONTENT=0.5;url=Update_Manager.php>
        <?
    }
}
else{
    ?>
    <script>
    alert("您無權限觀看此頁面!");
    </script>
    <meta http-equiv=REFRESH CONTENT=0.5;url=../Homepage/index.php>
    <?
}