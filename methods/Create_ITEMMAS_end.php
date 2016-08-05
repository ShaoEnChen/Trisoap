<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
include("Helper/mysql_connect.php");
include("Helper/handle_string.php");
include("Helper/sql_operation.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$newITEMNO = $_SESSION['newITEMNO'];
$newITEMNM = $_SESSION['newITEMNM'];
$newITEMAMT = $_SESSION['newITEMAMT'];
$newPRICE = $_SESSION['newPRICE'];
$newDESCRIPTION = $_SESSION['newDESCRIPTION'];
$message = null;

if($EMAIL != null && $CUSIDT == 'A'){
        $PW = input('PW');
        $queryPW = search('CUSPW', 'CUSMAS', 'EMAIL', $EMAIL);
        if(encrypt($PW) != $queryPW){
                $message = $message . '密碼錯誤<br>';
        }

        if($message == null){
                $sql = "insert into ITEMMAS (ITEMNO, ITEMNM, ITEMAMT, PRICE, DESCRIPTION) values ('$newITEMNO', '$newITEMNM', '$newITEMAMT', '$newPRICE', '$newDESCRIPTION')";
                unset($_SESSION['newITEMNO']);
                unset($_SESSION['newITEMNM']);
                unset($_SESSION['newITEMAMT']);
                unset($_SESSION['newPRICE']);
                unset($_SESSION['newDESCRIPTION']);
                if(mysql_query($sql)){
                        ?>
                        <script>
                        alert("新增成功");
                        </script>
                        <meta http-equiv=REFRESH CONTENT=0.5;url=Update_ITEMMAS.php>
                        <?
                }
                else{
                        ?>
                        <script>
                        alert("新增失敗");
                        </script>
                        <meta http-equiv=REFRESH CONTENT=0.5;url=Create_ITEMMAS.php>
                        <?
                }
        }
        else{
                ?>
                <script>
                alert("密碼錯誤");
                </script>
                <?
                unset($_SESSION['newITEMNO']);
                echo '<meta http-equiv=REFRESH CONTENT=0.5;url=Create_ITEMMAS.php>';
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