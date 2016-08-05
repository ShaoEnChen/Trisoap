<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
include("Helper/mysql_connect.php");
include("Helper/sql_operation.php");
include("Helper/handle_string.php");
$message = null;
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];

if($EMAIL != null && $CUSIDT == 'A'){
        $newITEMNO = input('ITEMNO');
        $newITEMNM = input('ITEMNM');
        $newITEMAMT = input('ITEMAMT');
        $newPRICE = input('PRICE');
        $newDESCRIPTION = input('$DESCRIPTION');

        if($newITEMNO == null){
                $message = $message . '商品編號欄位不可空白<br>';
        }  
        if($newITEMNM == null){
                $message = $message . '商品名稱欄位不可空白<br>';
        }
        if($newPRICE == null){
                $message = $message . '商品價格欄位不可空白<br>';
        }
        $queryITEMNO = search('ITEMNO', 'ITEMMAS', 'ITEMNO', $newITEMNO);
        if($queryITEMNO != null){
                $message = $message . '此商品編號已存在<br>';
        }
        if($message == null){
                $_SESSION['newITEMNO'] = $newITEMNO;
                $_SESSION['newITEMNM'] = $newITEMNM;
                $_SESSION['newITEMAMT'] = $newITEMAMT;
                $_SESSION['newPRICE'] = $newPRICE;
                $_SESSION['newDESCRIPTION'] = $newDESCRIPTION;
?>
<form name="form" method="post" action="Create_ITEMMAS_end.php">
請再次輸入您的密碼以新增商品<br>
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
                <meta http-equiv=REFRESH CONTENT=0.5;url=Create_ITEMMAS.php>
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