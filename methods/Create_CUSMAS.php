<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
    <title>三三社企-註冊</title>
    <meta name="author" content="2016 NTUIM SA GROUP7">
    <meta name="description" content="">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- custim css -->
    <link href="css/sign.css" rel="stylesheet">
</head>

<body>
<br>
<div class="sign-block">
    <h1>Register</h1>
    <form name="form" method="post" action="Create_CUSMAS_finish.php">
        <?
        session_start();
        $EMAIL = $_SESSION['EMAIL'];
        $CUSNM = $_SESSION['CUSNM'];
        $CUSBIRTH = $_SESSION['CUSBIRTH'];
        $TEL = $_SESSION['TEL'];
        $CUSADD = $_SESSION['CUSADD'];
        $TAXID = $_SESSION['TAXID'];
        $CUSTYPE = $_SESSION['CUSTYPE'];
        $KNOWTYPE = $_SESSION['KNOWTYPE'];
        $SPEINS = $_SESSION['SPEINS'];
        function checkTYPE($ori, $new){
            if($ori == $new) echo 'selected="selected"';
        }
        ?>
        <label for="username"><input type="text" name="EMAIL" value="<?echo $EMAIL;?>" placeholder="電子信箱" id="username"/></label>
        <label for="name"><input type="text" name="CUSNM" value="<?echo $CUSNM;?>" placeholder="您的姓名" id="name"/></label>
        <label for="password"><input type="password" name="CUSPW1" placeholder="設定密碼" id="password"/></label>
        <label for="password2"><input type="password" name="CUSPW2" placeholder="再次輸入密碼" id="password2"/></label>
        <label for="bookdate"><input type="date" name="CUSBIRTH" value="<?echo $CUSBIRTH;?>" placeholder="生日  ex.1999-8-8" id="bookdate"/></label>
        <label for="phonenumber"><input type="text" name="TEL" value="<?echo $TEL;?>" placeholder="聯絡電話(可不填)" id="phonenumber"/></label>
        <label for="address"><input type="text" name="CUSADD" value="<?echo $CUSADD;?>" placeholder="通訊地址(可不填)" id="address"/></label> 
        <label for="uniformnum"><input type="text" name="TAXID" value="<?echo $TAXID;?>" placeholder="統一編號(可不填)" id="uniformnum"/></label>
        <label for="skin">
            <div class="q-select">
                <select name="CUSTYPE" id="skin">
                    <option value="">您的膚質</option>
                    <option value="A" <?checkTYPE($CUSTYPE, 'A');?>>乾性</option>
                    <option value="B" <?checkTYPE($CUSTYPE, 'B');?>>中性</option>
                    <option value="C" <?checkTYPE($CUSTYPE, 'C');?>>油性</option>
                    <option value="D" <?checkTYPE($CUSTYPE, 'D');?>>混和性</option>
                </select>
            </div>
        </label>
        <label for="know">
            <div class="q-select">
                <select name="KNOWTYPE" id="know">
                    <option value="">如何認識三三</option>
                    <option value="A" <?checkTYPE($KNOWTYPE, 'A');?>>粉絲專頁</option>
                    <option value="B" <?checkTYPE($KNOWTYPE, 'B');?>>親友介紹</option>
                    <option value="C" <?checkTYPE($KNOWTYPE, 'C');?>>媒體宣傳</option>
                    <option value="D" <?checkTYPE($KNOWTYPE, 'D');?>>實體攤位</option>
                    <option value="E" <?checkTYPE($KNOWTYPE, 'E');?>>其它</option>
                </select>
            </div>
        </label>
        <label for="request"><textarea name="SPEINS" value="<?echo $SPEINS;?>" placeholder="特殊要求" id="request"></textarea></label>
        <button type="submit" class="promise">註冊</button>
    </form>
    <button type="button" class="cancel"></buttom><a href="../Homepage/index.php">取消</a>
</div>
</body>
</html>