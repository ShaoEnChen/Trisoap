<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
include("Helper/mysql_connect.php");
include("Helper/handle_string.php");
$message = null;
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];

if($EMAIL != null && $CUSIDT == 'A'){
        $newITEMNM = input('ITEMNM');
        $newITEMAMT = input('ITEMAMT');
        $newPRICE = input('PRICE');
        $newDESCRIPTION = input('$DESCRIPTION');

        if($newITEMNM == null){
                $message = $message . '商品名稱欄位不可空白<br>';
        }
        if($newPRICE == null){
                $message = $message . '商品價格欄位不可空白<br>';
        }

        if($message == null){
                $_SESSION['newITEMNM'] = $newITEMNM;
                $_SESSION['newITEMAMT'] = $newITEMAMT;
                $_SESSION['newPRICE'] = $newPRICE;
                $_SESSION['newDESCRIPTION'] = $newDESCRIPTION;
?>
<form name="form" method="post" action="Edit_ITEMMAS_end.php">
請再次輸入您的密碼以更新商品<br>
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