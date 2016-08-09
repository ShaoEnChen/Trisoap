<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
include("Helper/mysql_connect.php");
include("Helper/handle_string.php");
include("Helper/sql_operation.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$newITEMNO = $_SESSION['newITEMNO'];
$newITEMNM = input('ITEMNM');
$newITEMAMT = input('ITEMAMT');
$newPRICE = input('PRICE');
$newDESCRIPTION = input('$DESCRIPTION');
$message1 = null;
$message2 = null;

if($EMAIL != null && $CUSIDT == 'A'){
        $PW = input('PW');
        $queryPW = search('CUSPW', 'CUSMAS', 'EMAIL', $EMAIL);
        if(encrypt($PW) != $queryPW){
                $message1 = $message1 . '密碼錯誤 \n';
        }
        if($newITEMNM == null){
                $message1 = $message1 . '商品名稱欄位不可空白 \n';
        }
        if($newPRICE == null){
                $message1 = $message1 . '商品價格欄位不可空白 \n';
        }

        if($message1 == null){
                $sql = "update ITEMMAS set ITEMNM='$newITEMNM' WHERE ITEMNO='$newITEMNO'";
                if(!mysql_query($sql))
                        $message2 = $message2 . '更新商品名稱失敗 \n';
                $sql = "update ITEMMAS set ITEMAMT='$newITEMAMT' WHERE ITEMNO='$newITEMNO'";
                if(!mysql_query($sql))
                        $message2 = $message2 . '更新商品數量失敗 \n';
                $sql = "update ITEMMAS set PRICE='$newPRICE' WHERE ITEMNO='$newITEMNO'";
                if(!mysql_query($sql))
                        $message2 = $message2 . '更新商品價格失敗 \n';
                $sql = "update ITEMMAS set DESCRIPTION='$newDESCRIPTION' WHERE ITEMNO='$newITEMNO'";
                if(!mysql_query($sql))
                        $message2 = $message2 . '更新商品敘述失敗 \n';
                unset($_SESSION['newITEMNO']);
                if($message2 == null){
                        ?>
                        <script>
                        alert("更新成功");
                        </script>
                        <meta http-equiv=REFRESH CONTENT=0.5;url=Update_ITEMMAS.php>
                        <?
                }
                else{
                        ?>
                        <script>
                        alert("更新失敗");
                        </script>
                        <meta http-equiv=REFRESH CONTENT=0.5;url=Edit_ITEMMAS.php>
                        <?
                }
        }
        else{
                ?>
                <script>
                alert("<?echo $message1;?>");
                </script>
                <?
                unset($_SESSION['newITEMNO']);
                echo '<meta http-equiv=REFRESH CONTENT=0.5;url=Edit_ITEMMAS.php>';
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