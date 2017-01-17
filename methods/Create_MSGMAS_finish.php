<meta charset="utf-8">
<link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
<?php
session_start();
include_once("Helper/mysql_connect.php");
include_once("Helper/sql_operation.php");
include_once("Helper/handle_string.php");
include_once("Helper/mail/mail.php");
include_once("Helper/redirect.js");
include_once("Helper/analyticstracking.php");
$EMAIL = $_SESSION['EMAIL'];
$MSGPHOTO = 0;
$MSGVIDEO = 0;
$message = '';

if($EMAIL != null){
    $MSGTXT = input('MSGTXT');
    $MSGNO = search('NMSGNO', 'OWNMAS', 'COMNM', 'Trisoap');
    if($_FILES["MSGPHOTO"]["error"] == 0){
        if($_FILES["MSGPHOTO"]["type"] != 'image/jpeg' && $_FILES["MSGPHOTO"]["type"] != 'image/jpg' && $_FILES["MSGPHOTO"]["type"] != 'image/png'){
            $message .= '請上傳格式為 jpeg/jpg/png 的照片 \n';
        }
        else{
            move_uploaded_file($_FILES["MSGPHOTO"]["tmp_name"], '../message/picture/'.$MSGNO.'.png');
            $MSGPHOTO = 1;
        }
    }
    if($_FILES["MSGVIDEO"]["error"] == 0){
        if($_FILES["MSGVIDEO"]["type"] != 'video/mp4'){
            $message .= '請上傳格式為 mp4 的影片 \n';
        }
        else{
            move_uploaded_file($_FILES["MSGVIDEO"]["tmp_name"], '../message/video/'.$MSGNO.'.mp4');
            $MSGVIDEO = 1;
        }
    }
    date_default_timezone_set('Asia/Taipei');
    $CREATEDATE = date("Y-m-d H:i:s");
    if($MSGTXT == null){
        $message .= '留言文字欄位不可空白';
    }
    if($message == ''){
        $sql = "INSERT INTO MSGMAS (MSGNO, EMAIL, MSGTXT, MSGPHOTO, MSGVIDEO, CREATEDATE) VALUES ('$MSGNO', '$EMAIL', '$MSGTXT', '$MSGPHOTO', '$MSGVIDEO', '$CREATEDATE')";
        if(mysql_query($sql)){
            $sql = "UPDATE OWNMAS SET NMSGNO=NMSGNO+1 where COMNM='Trisoap'";
            mysql_query($sql);
            mail_receive_message($EMAIL);
            ?>
            <script>
            redirect("../message/message.php");
            alert("留心語成功，已寄發通知信至您的信箱。");
            </script>
            <?php 
        }
        else{
            ?>
            <script>
            redirect("Create_MSGMAS.php");
            alert("留心語失敗");
            </script>
            <?php 
        }
    }
    else{
        ?>
        <script>
        redirect("Create_MSGMAS.php");
        alert("<?php echo $message;?>");
        </script>
        <?php 
    }
}
else{
    ?>
    <script>
    redirect("/");
    alert("您無權限觀看此頁面!");
    </script>
    <?php 
}
?>