<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
include("Helper/mysql_connect.php");
include("Helper/handle_string.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$newITEMNO = $_SESSION['newITEMNO'];
$message = null;

if($EMAIL != null && $CUSIDT == 'A'){
        $PW = input('PW');
        $queryPW = search('CUSPW', 'CUSMAS', 'EMAIL', $EMAIL);
        if(encrypt($PW) != $queryPW){
                $message = $message . '密碼錯誤<br>';
        }

        if($message == null){
                $sql = "UPDATE ITEMMAS SET ACTCODE='0' WHERE ITEMNO='$newITEMNO'";
                unset($_SESSION['newITEMNO']);
                if(mysql_query($sql)){
                        ?>
                        <script>
                        alert("下架成功");
                        </script>
                        <meta http-equiv=REFRESH CONTENT=0.5;url=Update_ITEMMAS.php>
                        <?
                }
                else{
                        ?>
                        <script>
                        alert("下架失敗");
                        </script>
                        <meta http-equiv=REFRESH CONTENT=0.5;url=Delete_ITEMMAS.php>
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
                echo '<meta http-equiv=REFRESH CONTENT=0.5;url=Delete_ITEMMAS.php>';
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