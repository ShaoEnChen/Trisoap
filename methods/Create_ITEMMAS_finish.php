<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
include("Helper/mysql_connect.php");
include("Helper/handle_string.php");
include("Helper/sql_operation.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$newITEMNO = input('ITEMNO');
$newITEMNM = input('ITEMNM');
$newITEMAMT = input('ITEMAMT');
$newPRICE = input('PRICE');
$newDESCRIPTION = input('$DESCRIPTION');
$message = null;

if($EMAIL != null && $CUSIDT == 'A'){
        $PW = input('PW');
        $queryPW = search('CUSPW', 'CUSMAS', 'EMAIL', $EMAIL);
        if(encrypt($PW) != $queryPW){
                $message = $message . '密碼錯誤 \n';
        }
        if($newITEMNO == null){
                $message = $message . '商品編號欄位不可空白 \n';
        }  
        if($newITEMNM == null){
                $message = $message . '商品名稱欄位不可空白 \n';
        }
        if($newPRICE == null){
                $message = $message . '商品價格欄位不可空白 \n';
        }
        $queryITEMNO = search('ITEMNO', 'ITEMMAS', 'ITEMNO', $newITEMNO);
        if($queryITEMNO != null){
                $message = $message . '此商品編號已存在 \n';
        }

        if($message == null){
                $sql = "insert into ITEMMAS (ITEMNO, ITEMNM, ITEMAMT, PRICE, DESCRIPTION) values ('$newITEMNO', '$newITEMNM', '$newITEMAMT', '$newPRICE', '$newDESCRIPTION')";
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
                alert("<?echo $message;?>");
                </script>
                <?
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