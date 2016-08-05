<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>三三吾鄉手工皂 更新商品</title>
<?php
session_start();
include("Helper/mysql_connect.php");
include("Helper/sql_operation.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$newITEMNO = $_POST['ITEMNO'];
$message = null;

if($EMAIL != null && $CUSIDT == 'A'){
        if($newITEMNO == null){
                $message = $message . '商品編號欄位不可空白<br>';
        }
        $row = select('ITEMMAS', 'ITEMNO', $newITEMNO);
        if($row['ITEMNO'] == null){
                $message = $message . '查無此商品編號之商品<br>';
        }
        if($message == null){
                $_SESSION['newITEMNO'] = $newITEMNO;
                echo "<form name=\"form\" method=\"post\" action=\"Edit_ITEMMAS_finish.php\">";
                echo "商品編號：$ITEMNO <br>";
                echo "商品名稱：<input type=\"text\" name=\"ITEMNM\" value=\"$row['ITEMNM']\" /> <br>";
                echo "商品數量：<input type=\"text\" name=\"ITEMAMT\" value=\"$row['ITEMAMT']\" /> <br>";
                echo "商品價格：<input type=\"text\" name=\"PRICE\" value=\"$row['PRICE']\" /> <br>";
                echo "商品敘述：<input type=\"text\" name=\"DESCRIPTION\" value=\"$row['DESCRIPTION']\" /> <br>";
                echo "<input type=\"submit\" name=\"button\" value=\"確定\" />";
                echo "</form>";
?>
<a href="Update_ITEMMAS.php">取消</a>
<?php
        }
        else{
                ?>
                <script>
                alert("<?echo $message;?>");
                </script>
                <meta http-equiv=REFRESH CONTENT=0.5;url=Edit_ITEMMAS.php>
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
?>