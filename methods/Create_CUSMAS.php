<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
    <title>註冊</title>
    <meta name="author" content="2016 NTUIM SA GROUP7">
    <meta name="description" content="">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">
    <!-- custom css -->
    <link href="css/sign.css" rel="stylesheet">
</head>

<body>
    <br>
    <div class="sign-block">
        <h1>Register</h1>
        <form method="post" action="Create_CUSMAS_finish.php">
            <?php
            session_start();
            include_once("Helper/analyticstracking.php");
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
            <input type="text" name="EMAIL" value="<?php echo $EMAIL;?>" placeholder="電子信箱" /></label>
            <input type="text" name="CUSNM" value="<?php echo $CUSNM;?>" placeholder="您的姓名" /></label>
            <input type="password" name="CUSPW1" placeholder="設定密碼" /></label>
            <input type="password" name="CUSPW2" placeholder="再次輸入密碼" /></label>
            <input type="date" name="CUSBIRTH" value="<?php echo $CUSBIRTH;?>" placeholder="生日  ex.1999-8-8" /></label>
            <input type="text" name="TEL" value="<?php echo $TEL;?>" placeholder="聯絡電話" /></label>
            <input type="text" name="TAXID" value="<?php echo $TAXID;?>" placeholder="統一編號(可不填)" /></label>
            <div class="q-select">
                <select name="CUSTYPE" style="width: 49.35%;">
                    <option value="">您的膚質</option>
                    <option value="A" <?php checkTYPE($CUSTYPE, 'A');?>>乾性</option>
                    <option value="B" <?php checkTYPE($CUSTYPE, 'B');?>>中性</option>
                    <option value="C" <?php checkTYPE($CUSTYPE, 'C');?>>油性</option>
                    <option value="D" <?php checkTYPE($CUSTYPE, 'D');?>>混和性</option>
                </select>
                <select name="KNOWTYPE" style="width: 49.35%;">
                    <option value="">如何認識三三</option>
                    <option value="A" <?php checkTYPE($KNOWTYPE, 'A');?>>粉絲專頁</option>
                    <option value="B" <?php checkTYPE($KNOWTYPE, 'B');?>>親友介紹</option>
                    <option value="C" <?php checkTYPE($KNOWTYPE, 'C');?>>媒體宣傳</option>
                    <option value="D" <?php checkTYPE($KNOWTYPE, 'D');?>>實體攤位</option>
                    <option value="E" <?php checkTYPE($KNOWTYPE, 'E');?>>其它</option>
                </select>
            </div>
            <textarea name="SPEINS" value="<?php echo $SPEINS;?>" placeholder="特殊要求(可不填)"></textarea>
            <input type="checkbox" name="privacy" value="true">我已詳閱並同意<a href="#" onclick="showPrivacy()">個人資料保護條款</a>
            <div id="dialog" title="個人資料保護法相關聲明">
                <p class="privacy-text">
                    建皂希望有限公司（以下簡稱本公司）為保護您的個人資料，依據個人資料保護法規定，於下列事由與目的範圍內，說明本公司直接或間接蒐集、處理及利用您的個人資料，當您填表完成，表示您同意以下內容：

                    一、蒐集之目的：本公司基於個人資料保護法及相關法令之規定，取得您的個人資料，目的在於提供良好服務及執行職務或業務之必要範圍內蒐集、處理及利用您的個人資料。您同意本公司以您所提供的個人資料確認您的身份、與您進行連絡、提供您本公司及關係企業或合作夥伴之相關服務及資訊，包括但不限於進行獎項及贈品兌換活動、會員登錄及驗證、廣告行銷、服務訊息、特別活動、新服務、新產品之通知等用途，以及其他隱私權保護政策規範之使 用方式。

                    二、個人資料之類別：您可依您的需要提供個人資料，包含姓名、連絡方式，包括但不限於電話、E-MAIL或地址或其他得以直接或間接識別您個人之資料。

                    三、您同意本公司利用您個人資料的期間、地區、對象及方式：
                    （一）期間：本公司存續期間或依法令之資料保存期間。
                    （二）地區：中華民國領域。
                    （三）對象：本公司、本公司之分公司、本公司之關係企業、其他與本公司有業務往來或合作之機構。
                    （四）方式：以電話、簡訊、電子郵件、紙本或其他合於當時科技之適當方式作個人資料之利用，包括任何依法本公司得利用之方式，並於法令容許之範圍內，為行銷建檔、揭露、轉介或交互運用予本公司及其合作對象。

                    四、您對於本公司保有您的個人資料部分，您日後仍得享有下列權利：
                    （一）得向本公司查詢、請求閱覽、請求製給複製本。而本公司依法得酌收必要成本費用。
                    （二）得向本公司請求補充或更正。惟依法您應為適當之釋明。
                    （三）得向本公司請求停止蒐集、處理或利用及請求刪除您的個人資料。
                    五、本公司利用個人資料行銷，您表示拒絶接受行銷時，於法定合理期間本公司即不得以行銷之名義利用您的個人資料。
                    六、您的個人資料蒐集之目的消失或期限屆滿時，您同意本公司得繼續保存、處理或利用您的個人資料。
                    七、您得自由選擇是否提供相關個人資料予本公司蒐集、處理及利用，惟您若選擇不提供，或只提供部份/不完全/不真實/不正確個 人資料予本公司，或提供後向本公司請求刪除部分或全部個人資料，或您所提供的個人資料，經檢舉或發現不足以確認您的身分真實性或其他個人資料冒用、盜用等 情形時，導致本公司無法進行必要之審核及處理，或提供您本公司/合作機構更完善之商品及服務及活動訊息等，本公司有權暫時停止提供對您的服務，若有不便之 處尚請見諒。
                    八、若您有任何問題請來信客服信箱 <a href="mailto:trisoap2015@gmail.com">trisoap2015@gmail.com</a> ，我們將竭誠為您服務。
                    九、您已清楚瞭解此一同意符合個人資料保護法及相關法規之要求，具有書面同意本公司蒐集、處理及利用您的個人資料之效果。
                </p>
            </div>
            <button type="submit" class="promise">註冊</button>
        </form>
        <a href="/"><button type="button" class="cancel">取消</button></a>
    </div>
    <script src="//apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <script>
        $( "#dialog" ).dialog({
            width: 800,
            modal: true,
            autoOpen: false,
        });

        function showPrivacy() {
            $('#dialog').dialog('open');
        }
    </script>
</body>
</html>