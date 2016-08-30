<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
    <title>三三社企-留心語</title>
    <meta name="author" content="2016 NTUIM SA GROUP7">
    <meta name="description" content="">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- custim css -->
    <link href="css/sign.css" rel="stylesheet">
</head>

<body>
<br>
<div class="sign-block">
    <h1>留心語</h1>
    <?
    session_start();
    include_once("Helper/mysql_connect.php");
    include_once("Helper/redirect.js");
    $EMAIL = $_SESSION['EMAIL'];
    if($EMAIL != null){
        ?>
        <form method="post" action="Create_MSGMAS_finish.php" enctype="multipart/form-data">
            <label for="MSGTXT"><textarea name="MSGTXT" placeholder="文字(必填)" id="MSGTXT"></textarea></label>
            <label for="MSGPHOTO">照片（上傳格式限制：jpeg/jpg/png）<br>
            <input type="file" name="MSGPHOTO" id="MSGPHOTO"/></label><br>
            <label for="MSGVIDEO">影片（上傳格式限制：mp4）<br>
            <input type="file" name="MSGVIDEO" id="MSGVIDEO"/></label><br>
            <button type="submit" class="promise">上傳</button>
        </form>
        <a href="../message/message.html"><button type="button" class="cancel">取消</button></a>
        <?
    }
    else{
        ?>
        <script>
        redirect("../Homepage/index.php");
        alert("請先登入或註冊!");
        </script>
        <?
    }
    ?>
</div>
</body>
</html>