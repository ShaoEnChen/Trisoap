<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("Helper/mysql_connect.php");
include("Helper/sql_operation.php");
include("Helper/handle_string.php");
include("Helper/mail/mail.php");
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
                alert("系統錯誤，請重新操作");
                </script>
                <meta http-equiv=REFRESH CONTENT=0.5;url=User_ForgetPW.php>
                <?php
        }
        else{
                $COMADD = search('COMADD', 'OWNMAS', 'COMNM', 'Trisoap');
                $COMEMAIL = search('COMEMAIL', 'OWNMAS', 'COMNM', 'Trisoap');
                mail_reset_password($EMAIL, $code, $COMADD, $COMEMAIL);
                ?>
                <script>
                alert("已將新密碼寄至您的信箱，請前往查看");
                </script>
                <meta http-equiv=REFRESH CONTENT=0.5;url=User_login1.php>
                <?php
        }
}
elseif($message == '此電子信箱尚未註冊'){
        ?>
        <script>
        alert("此電子信箱尚未註冊");
        </script>
        <meta http-equiv=REFRESH CONTENT=0.5;url=Create_CUSMAS1.php>
        <?php
}
else{
        ?>
        <script>
        alert("<?echo $message;?>");
        </script>
        <meta http-equiv=REFRESH CONTENT=0.5;url=User_ForgetPW.php>
        <?php
}
?>