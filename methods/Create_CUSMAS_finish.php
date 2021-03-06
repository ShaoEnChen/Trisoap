<?php 
session_start();
include_once("Helper/mysql_connect.php");
include_once("Helper/sql_operation.php");
include_once("Helper/handle_string.php");
include_once("Helper/message.php");
include_once("Helper/redirect.js");
include_once("Helper/analyticstracking.php");
$message = '';

$CUSNM = input('CUSNM');
$CUSPW1 = input('CUSPW1');
$CUSPW2 = input('CUSPW2');
$CUSADD = input('CUSADD');
$CUSTYPE = input('CUSTYPE');
$CUSBIRTH = input('CUSBIRTH');
$newCUSBIRTH = explode('-', input('CUSBIRTH'));
$CUSBIRTHY = $newCUSBIRTH[0];
$CUSBIRTHM = $newCUSBIRTH[1];
$CUSBIRTHD = $newCUSBIRTH[2];
$TEL = input('TEL');
$EMAIL = input('EMAIL');
$TAXID = input('TAXID');
$KNOWTYPE = input('KNOWTYPE');
$SPEINS = input('SPEINS');
$privacy = input('privacy');

if($EMAIL == null){
    $message = $message . '電子信箱欄位不可空白 \n';
}
$standard = "/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/";
if(!preg_match($standard, $EMAIL)){
    $message = $message . '請輸入正確的電子信箱格式 \n';
}
$queryEMAIL = search('EMAIL', 'CUSMAS', 'EMAIL', $EMAIL);
if($queryEMAIL != null){
    $message = $message . '此電子信箱已存在 \n';
}
if($CUSNM == null){
    $message = $message . '姓名欄位不可空白 \n';
}  
if($CUSPW1 == null || $CUSPW2 == null){
    $message = $message . '密碼欄位不可空白 \n';
}
if($CUSPW1 != $CUSPW2){
    $message = $message . '請重新確認您的密碼 \n';
}
if((strlen($CUSPW1) > 15) || (strlen($CUSPW2) > 15)){
    $message = $message . '密碼不可超過15字元 \n';
}
if((ctype_alnum($CUSPW1) == FALSE) || (ctype_alnum($CUSPW2) == FALSE)){
    $message = $message . '密碼必須為英數字 \n';
}
if($CUSTYPE == null){
    $message = $message . '膚質欄位不可空白 \n';
}
if($CUSBIRTHY == null || $CUSBIRTHM == null || $CUSBIRTHD == null){
    $message = $message . '生日欄位不可空白 \n';
}
if(!checkdate($CUSBIRTHM, $CUSBIRTHD, $CUSBIRTHY)){
    $message = $message . '請輸入正確的生日格式 \n';
}
if($TEL == null){
    $message = $message . '聯絡電話欄位不可空白 \n';
}
if (!preg_match('/^[0][9][0-9]{8}$/', $TEL)){ 
    $message = $message . '請輸入正確的聯絡電話 \n';
}
if($KNOWTYPE == null){
    $message = $message . '如何認識三三欄位不可空白 \n';
}
if($privacy != 'true'){
    $message = $message . '請確定您已詳閱並同意個人資料保護條款 \n';
}
$_SESSION['CUSNM'] = $CUSNM;
$_SESSION['CUSPW'] = $CUSPW1;
$_SESSION['CUSADD'] = $CUSADD;
$_SESSION['CUSTYPE'] = $CUSTYPE;
$_SESSION['CUSBIRTH'] = $CUSBIRTH;
$_SESSION['TEL'] = $TEL;
$_SESSION['EMAIL'] = $EMAIL;
$_SESSION['TAXID'] = $TAXID;
$_SESSION['KNOWTYPE'] = $KNOWTYPE;
$_SESSION['SPEINS'] = $SPEINS;
if($message == ''){
    //去除了數字0和1 字母小寫O和L，為了避免辨識不清楚
    $str = "23456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ";
    $code = '';
    for ($i = 0; $i < 6; $i++) {
        $code .= $str[mt_rand(0, strlen($str)-1)];
    }
    $_SESSION['COMMIT'] = $code;
    message_verify($TEL, $code);
    include("Helper/verify.html");
}
else{
    ?>
    <script>
    redirect("Create_CUSMAS.php");
    alert("<?php echo $message;?>");
    </script>
    <?php 
}
?>