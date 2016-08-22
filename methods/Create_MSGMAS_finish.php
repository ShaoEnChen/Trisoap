<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
<?php
session_start();
include_once("Helper/mysql_connect.php");
include_once("Helper/sql_operation.php");
include_once("Helper/handle_string.php");
include_once("Helper/mail/mail.php");
include_once("Helper/redirect.js");
$EMAIL = $_SESSION['EMAIL'];
$MSGPHOTO = 0;
$MSGVIDEO = 0;
$message = null;

if($EMAIL != null){
    $MSGTXT = input('MSGTXT');
    $MSGNO = search('NMSGNO', 'OWNMAS', 'COMNM', 'Trisoap');
    if($_FILES["MSGPHOTO"]["error"] == 0){
        move_uploaded_file($_FILES["MSGPHOTO"]["tmp_name"], '../../htdocs/message/picture/'.$MSGNO);
        $MSGPHOTO = 1;
    }
    if($_FILES["MSGVIDEO"]["error"] == 0){
        move_uploaded_file($_FILES["MSGVIDEO"]["tmp_name"], '../../htdocs/message/video/'.$MSGNO);
        $MSGVIDEO = 1;
    }
    date_default_timezone_set('Asia/Taipei');
    $CREATEDATE = date("Y-m-d H:i:s");
    if($MSGTXT == null){
        $message = $message . '留言文字欄位不可空白';
    }
    if($message == null){
        $sql = "insert into MSGMAS (MSGNO, EMAIL, MSGTXT, MSGPHOTO, MSGVIDEO, CREATEDATE) values ('$MSGNO', '$EMAIL', '$MSGTXT', '$MSGPHOTO', '$MSGVIDEO', '$CREATEDATE')";
        if(mysql_query($sql)){
            $sql = "UPDATE OWNMAS SET NMSGNO=NMSGNO+1 where COMNM='Trisoap'";
            mysql_query($sql);
            mail_receive_message($EMAIL);
            ?>
            <script>
            //redirect("../message/Message.html");
            //alert("留心語成功，已寄發通知信至您的信箱。");
            </script>
            <?
        }
        else{
            ?>
            <script>
            redirect("Create_MSGMAS.php");
            alert("留心語失敗");
            </script>
            <?
        }
    }
    else{
        ?>
        <script>
        redirect("Create_MSGMAS.php");
        alert("<?echo $message;?>");
        </script>
        <?
    }
}
else{
    ?>
    <script>
    redirect("../Homepage/index.php");
    alert("您無權限觀看此頁面!");
    </script>
    <?
}
