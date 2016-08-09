<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
include("Helper/mysql_connect.php");
include("Helper/sql_operation.php");
include("Helper/handle_string.php");
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
        if($row['ACTCODE'] == '0'){
                $message = $message . $row['ITEMNM'] . "已經下架";
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
                alert("<?echo $message;?>");
                </script>
                <?
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