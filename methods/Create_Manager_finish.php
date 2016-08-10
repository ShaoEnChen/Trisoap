<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
<?php
include("Helper/mysql_connect.php");
include("Helper/sql_operation.php");
include("Helper/handle_string.php");
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

    if($message == null){
        $sql = "UPDATE CUSMAS SET CUSIDT='A' WHERE EMAIL='$newEMAIL'";
        if(mysql_query($sql)){
            ?>
            <script>
            alert("新增成功");
            </script>
            <meta http-equiv=REFRESH CONTENT=0.5;url=Update_Manager.php>
            <?
        }
        else{
            ?>
            <script>
            alert("新增失敗");
            </script>
            <meta http-equiv=REFRESH CONTENT=0.5;url=Create_Manager.php>
            <?
        }
    }
    else{
        ?>
        <script>
        alert("密碼錯誤");
        </script>
        <meta http-equiv=REFRESH CONTENT=0.5;url=Create_Manager.php>
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