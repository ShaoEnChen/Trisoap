<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <title>三三社企-註冊</title>

        <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="css/animate.css">
        <!-- Custom Stylesheet -->
        <link rel="stylesheet" href="css/style.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<?php session_start();
include("Helper/mysql_connect.php");
include("Helper/sql_operarion.php");
include("Helper/handle_string.php");
include("Helper/mail/mail.php");
$message = '';

$CUSNM = input('CUSNM');
$CUSPW1 = input('CUSPW1');
$CUSPW2 = input('CUSPW2');
$CUSADD = input('CUSADD');
$CUSTYPE = $_POST['CUSTYPE'];
$CUSBIRTHY = input('CUSBIRTHY');
$CUSBIRTHM = input('CUSBIRTHM');
$CUSBIRTHD = input('CUSBIRTHD');
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
        mail_verify($EMAIL, $code);     
        ?>
<body>
        <div class="container">
                <div class="top">
                        <!--
                        <h1 id="title" class="hidden"><span id="logo">Daily <span>UI</span></span></h1>
                        -->
                </div>
                <div class="login-box animated fadeInUp">
                        <div class="box-header">
                                <h2>註冊</h2>
                        </div>
                        您的會員註冊驗證碼已寄至您的信箱，煩請您前往確認。<br>
                        <form name="form" method="post" action="Create_CUSMAS_end.php">
                                <label for="username">驗證碼*<input type="text" name="VERIFY" /></label><br>
                                <!--
                                <input type="submit" name="button" value="註冊" />
                                -->
                                
                        <!--
                                <label for="username">Username</label>
                                <br/>
                                <input type="text" id="username">
                                <br/>
                                <label for="password">Password</label>
                                <br/>
                                <input type="password" id="password">
                                <br/>
                        -->
                                <button type="submit">確定</button>
                        <!--
                                <br/>
                                <a href="#"><p class="small">Forgot your password?</p></a>
                        -->
                        </form>
                        <button type="button"></buttom><a href="../Homepages/index.php">取消</a>
                </div>
        </div>
</body>

<script>
        $(document).ready(function () {
        $('#logo').addClass('animated fadeInDown');
        $("input:text:visible:first").focus();
        });
        $('#username').focus(function() {
                $('label[for="username"]').addClass('selected');
        });
        $('#username').blur(function() {
                $('label[for="username"]').removeClass('selected');
        });
</script>
    <?php
}
else{
        ?>
        <script>
            alert("<?echo $message;?>");
        </script>
        <?

        echo '<meta http-equiv=REFRESH CONTENT=2;url=Create_CUSMAS1.php>';
}
?>

</html>