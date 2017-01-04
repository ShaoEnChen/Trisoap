<meta charset="utf-8">
<link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
<?php
include_once("Helper/mysql_connect.php");
include_once("Helper/sql_operation.php");
include_once("Helper/handle_string.php");
include_once("Helper/mail/mail.php");
include_once("Helper/redirect.js");
include_once("Helper/analyticstracking.php");
$message = '';
$EMAIL = input('EMAIL');
$standard = "/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/";
$queryEMAIL = select('CUSMAS', 'EMAIL', $EMAIL);
if($EMAIL == null){
        $message = $message . '請輸入您的電子信箱 \n';
}
elseif(!preg_match($standard, $EMAIL)){
        $message = $message . '請輸入正確的電子信箱格式 \n';
}
elseif($queryEMAIL == FALSE){
        $message = $message . '此電子信箱尚未註冊 \n';
}

if($message == ''){
        $str = "23456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ";
        $code = '';
        for ($i = 0; $i < 6; $i++) {
                $code .= $str[mt_rand(0, strlen($str)-1)];
        }
        $newcode = encrypt($code);
        $sql = "UPDATE CUSMAS SET CUSPW = '$newcode' WHERE EMAIL='$EMAIL'";
        if(!mysql_query($sql)){
                ?>
                <script>
                redirect("User_ForgetPW.php");
                alert("系統錯誤，請重新操作");
                </script>
                <?php
        }
        else{
                mail_reset_password($EMAIL, $code);
                ?>
                <script>
                redirect("User_login.php");
                alert("已將新密碼寄至您的信箱，請前往查看");
                </script>
                <?php
        }
}
elseif($message == '此電子信箱尚未註冊'){
        ?>
        <script>
        redirect("Create_CUSMAS.php");
        alert("此電子信箱尚未註冊");
        </script>
        <?php
}
else{
        ?>
        <script>
        redirect("User_ForgetPW.php");
        alert("<?php echo $message;?>");
        </script>
        <?php
}
?>