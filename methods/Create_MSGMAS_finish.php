<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
<?php
session_start();
include("Helper/mysql_connect.php");
include("Helper/sql_operation.php");
include("Helper/handle_string.php");
include("Helper/mail/mail.php");
$EMAIL = $_SESSION['EMAIL'];
$message = null;

if($EMAIL != null){
    $MSGTXT = input('MSGTXT');
    $MSGVIDEO = input('MSGVIDEO');
    $MSGPHOTOTYPE = $_FILES["MSGPHOTO"]["type"];
    $file = fopen($_FILES["MSGPHOTO"]["tmp_name"], "rb");
    $fileContents = fread($file, filesize($_FILES["MSGPHOTO"]["tmp_name"])); 
    fclose($file);
    $MSGPHOTO = base64_encode($fileContents);
    date_default_timezone_set('Asia/Taipei');
    $CREATEDATE = date("Y-m-d H:i:s");
    $MAILDATE = date("Y-m-d");
    if($MSGTXT == null){
        $message = $message . '留言文字欄位不可空白<br>';
    }
    if($message == null){
        $savetype = 0;
        $MSGNO = search('NMSGNO', 'OWNMAS', 'COMNM', 'Trisoap');
        if($MSGPHOTO == null && $MSGVIDEO == null)
            $savetype = 1;
        elseif($MSGPHOTO != null && $MSGVIDEO == null)
            $savetype = 2;
        elseif($MSGPHOTO == null && $MSGVIDEO != null)
            $savetype = 3;
        if($savetype = 0){
            $enter = "insert into MSGMAS (MSGNO, EMAIL, MSGTXT, MSGPHOTO, MSGPHOTOTYPE, MSGVIDEO, CREATEDATE) values ('$MSGNO', '$EMAIL', '$MSGTXT', '$MSGPHOTO', '$MSGPHOTOTYPE', '$MSGVIDEO', '$CREATEDATE')";
        }
        elseif($savetype = 1){
            $enter = "insert into MSGMAS (MSGNO, EMAIL, MSGTXT, CREATEDATE) values ('$MSGNO', '$EMAIL', '$MSGTXT', '$CREATEDATE')";
        }
        elseif($savetype = 2){
            $enter = "insert into MSGMAS (MSGNO, EMAIL, MSGTXT, MSGPHOTO, MSGPHOTOTYPE, CREATEDATE) values ('$MSGNO', '$EMAIL', '$MSGTXT', '$MSGPHOTO', '$MSGPHOTOTYPE', '$CREATEDATE')";
        }
        else{    
            $enter = "insert into MSGMAS (MSGNO, EMAIL, MSGTXT, MSGVIDEO, CREATEDATE) values ('$MSGNO', '$EMAIL', '$MSGTXT', '$MSGVIDEO', '$CREATEDATE')";
        }
        if(mysql_query($enter)){
            $sql = "UPDATE OWNMAS SET NMSGNO=NMSGNO+1 where COMNM='Trisoap'";
            mysql_query($sql);
            $COMADD = search('COMADD', 'OWNMAS', 'COMNM', 'Trisoap');
            $COMEMAIL = search('COMEMAIL', 'OWNMAS', 'COMNM', 'Trisoap');
            mail_receive_message($EMAIL, $COMADD, $COMEMAIL);
            ?>
            <script>
            alert("留心語成功，已寄發通知信至您的信箱。");
            </script>
            <meta http-equiv=REFRESH CONTENT=0.5;url=../message/Message.html>
            <?
        }
        else{
            ?>
            <script>
            alert("留心語失敗");
            </script>
            <meta http-equiv=REFRESH CONTENT=0.5;url=Create_MSGMAS.php>
            <?
        }
    }
    else{
        ?>
        <script>
        alert("<?echo $message;?>");
        </script>
        <meta http-equiv=REFRESH CONTENT=0.5;url=Create_MSGMAS.php>
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
