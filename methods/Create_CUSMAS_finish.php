<!DOCTYPE html>
<html>

<head>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='css/sign.css' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">

    <title>三三社企-註冊</title>
    <style>
        .sign-block {
            width: 350px;
            padding: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-right: -50%;
            transform: translate(-50%, -50%);
        }
        .sign-block h1 {
            font-family: 微軟正黑體;
        }
        .sign-block input {
            width: 100%;
        }
    </style>
</head>

<!-- PHP Area -->
<?
session_start();
include("Helper/mysql_connect.php");
include("Helper/sql_operation.php");
include("Helper/handle_string.php");
include("Helper/mail/mail.php");
$message = '';

$CUSNM = input('CUSNM');
$CUSPW1 = input('CUSPW1');
$CUSPW2 = input('CUSPW2');
$CUSADD = input('CUSADD');
$CUSTYPE = $_POST['CUSTYPE'];
$CUSBIRTH = explode('-', input('CUSBIRTH'));
$CUSBIRTHY = $CUSBIRTH[0];
$CUSBIRTHM = $CUSBIRTH[1];
$CUSBIRTHD = $CUSBIRTH[2];
$TEL = input('TEL');
$EMAIL = input('EMAIL');
$TAXID = input('TAXID');
$KNOWTYPE = $_POST['KNOWTYPE'];
$SPEINS = input('SPEINS');

if($EMAIL == null){
    $message = $message . '電子信箱欄位不可空白 \n';
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
if($KNOWTYPE == null){
    $message = $message . '如何認識三三欄位不可空白 \n';
}
$_SESSION['CUSNM'] = $CUSNM;
$_SESSION['CUSPW'] = $CUSPW1;
$_SESSION['CUSADD'] = $CUSADD;
$_SESSION['CUSTYPE'] = $CUSTYPE;
$_SESSION['CUSBIRTHY'] = $CUSBIRTHY;
$_SESSION['CUSBIRTHM'] = $CUSBIRTHM;
$_SESSION['CUSBIRTHD'] = $CUSBIRTHD;
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
    $COMADD = search('COMADD', 'OWNMAS', 'COMNM', 'Trisoap');
    $COMEMAIL = search('COMEMAIL', 'OWNMAS', 'COMNM', 'Trisoap');
    mail_verify($EMAIL, $code, $COMADD, $COMEMAIL);
?>
<!-- End PHP Area -->    

<body>
    <br>
    <div class="sign-block">
        <h1>註冊結果通知</h1>
        <hr>
        <p>您的會員註冊驗證碼已寄至您的信箱，煩請您前往確認，並輸入驗證碼。</p>
        <form name="form" method="post" action="Create_CUSMAS_end.php">
            <label for="VERIFY"><p>驗證碼*</p><input type="text" name="VERIFY" id="VERIFY"/></label><br>
            <button type="submit" class="promise">確定</button>
        </form>
        <button type="button" class="cancel"></buttom><a href="../Homepage/index.php">取消</a>
    </div>
</body>

<?php
}
else{
?>
    <script>
        alert("<?echo $message;?>");
    </script>
<?
    echo '<meta http-equiv=REFRESH CONTENT=0.5;url=Create_CUSMAS1.php>';
}
?>

</html>