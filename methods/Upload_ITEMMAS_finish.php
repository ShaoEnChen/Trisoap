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
        if($row['ACTCODE'] == '1'){
                $message = $message . $row['ITEMNM'] . "已經上市";
        }

        if($message == null){
                $sql = "UPDATE ITEMMAS SET ACTCODE='1' WHERE ITEMNO='$newITEMNO'";
                if(mysql_query($sql)){
                        ?>
                        <script>
                        alert("上市成功");
                        </script>
                        <meta http-equiv=REFRESH CONTENT=0.5;url=Update_ITEMMAS.php>
                        <?
                }
                else{
                        ?>
                        <script>
                        alert("上市失敗");
                        </script>
                        <meta http-equiv=REFRESH CONTENT=0.5;url=Upload_ITEMMAS.php>
                        <?
                }
        }
        else{
                ?>
                <script>
                alert("<?echo $message;?>");
                </script>
                <meta http-equiv=REFRESH CONTENT=0.5;url=Upload_ITEMMAS.php>
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