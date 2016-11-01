<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
    <title>刪除折扣</title>
    <meta name="author" content="2016 NTUIM SA GROUP7">
    <meta name="description" content="">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- custom css -->
    <link href="css/sign.css" rel="stylesheet">
</head>

<body>
<br>
<div class="sign-block">
    <h1>刪除折扣</h1>
        <?php
        session_start();
        $EMAIL = $_SESSION['EMAIL'];
        $CUSIDT = $_SESSION['CUSIDT'];
        if($EMAIL != null && $CUSIDT == 'A'){
            ?>
            <form method="post" action="Delete_DCTMAS_finish.php">
            <input type="text" name="DCTID" placeholder="折扣兌換碼" />
            <input type="password" name="PW" placeholder="再次輸入您的密碼" />
            <button type="submit" class="promise">確定</button>
            </form>
            <a href="Update_DCTMAS.php"><button type="button" class="cancel">取消</button></a>
            <?php
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
</div>
</body>
</html>