<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>三三吾鄉手工皂 上市商品</title>

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
        if($newITEMNO == null){
                $message = $message . '商品編號欄位不可空白<br>';
        }
        $row = select('ITEMMAS', 'ITEMNO', $newITEMNO);
        if($row['ACTCODE'] == '1'){
                $message = $message . $row['ITEMNM'] . "已經上市<br>";
        }

        if($message == null){
                $_SESSION['newITEMNO'] = $newITEMNO;
?>
<form name="form" method="post" action="Upload_ITEMMAS_end.php">
請再次輸入您的密碼以上市商品<br>
密碼：<input type="password" name="PW" /> <br>
<input type="submit" name="button" value="確定" />
</form>
<?php
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