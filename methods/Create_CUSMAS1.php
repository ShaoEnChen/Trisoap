<!DOCTYPE html>
<html>

<head>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='css/sign.css' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">

    <title>三三社企-註冊</title>
</head>

<body>
<br>
<div class="sign-block">
    <h1>Register</h1>
    <form name="form" method="post" action="Create_CUSMAS_finish.php">
        <?
        session_start();
        $CUSNM = $_SESSION['CUSNM'];
        $CUSADD = $_SESSION['CUSADD'];
        $CUSTYPE = $_SESSION['CUSTYPE'];
        $CUSBIRTHY = $_SESSION['CUSBIRTHY'];
        $CUSBIRTHM = $_SESSION['CUSBIRTHM'];
        $CUSBIRTHD = $_SESSION['CUSBIRTHD'];
        $TEL = $_SESSION['TEL'];
        $EMAIL = $_SESSION['EMAIL'];
        $TAXID = $_SESSION['TAXID'];
        $KNOWTYPE = $_SESSION['KNOWTYPE'];
        $SPEINS = $_SESSION['SPEINS'];
        ?>
        <label for="username"><input type="text" name="EMAIL" value="<?echo $EMAIL;?>" placeholder="電子信箱*" id="username"/></label>
        <label for="name"><input type="text" name="CUSNM" value="<?echo $CUSNM;?>" placeholder="您的姓名*" id="name"/></label>
        <label for="password"><input type="password" name="CUSPW1" placeholder="設定密碼*" id="password"/></label>
        <label for="password2"><input type="password" name="CUSPW2" placeholder="再次輸入密碼*" id="password2"/></label>
        <!-- <label for="country"><input type="text" name="COUNTRY" value="Taiwan" placeholder="所屬國家" id="country"/></label> -->
        <label for="bookdate"><input type="date" name="CUSBIRTH" placeholder="生日  ex.1999-12-31" id="bookdate"/></label>
        <label for="phonenumber"><input type="text" name="TEL" value="<?php echo $TEL;?>" placeholder="聯絡電話" id="phonenumber"/></label>
        <label for="address"><input type="text" name="CUSADD" value="<?php echo $CUSADD;?>" placeholder="通訊地址" id="address"/></label> 
        <label for="uniformnum"><input type="text" name="TAXID" value="<?php echo $TAXID;?>" placeholder="統一編號" id="uniformnum"/></label>
        <label for="skin">
            <div class="q-select">
                <select name="CUSTYPE" id="skin">
                    <option value="">您的膚質*</option>
                    <option value="A">乾性</option>
                    <option value="B">中性</option>
                    <option value="C">油性</option>
                    <option value="D">混和性</option>
                </select>
            </div>
        </label>
        <label for="know">
            <div class="q-select">
                <select name="KNOWTYPE" id="know">
                    <option value="">如何認識三三*</option>
                    <option value="A">粉絲專頁</option>
                    <option value="B">親友介紹</option>
                    <option value="C">媒體宣傳</option>
                    <option value="D">實體攤位</option>
                    <option value="E">其它</option>
                </select>
            </div>
        </label>
        <label for="request"><textarea name="SPEINS" value="<?php echo $SPEINS;?>" placeholder="特殊要求" id="request"></textarea></label>
        <button type="submit" class="promise">註冊</button>
    </form>
    <button type="button" class="cancel"></buttom><a href="../Homepage/index.php">取消</a>
</div>
</body>
</html>