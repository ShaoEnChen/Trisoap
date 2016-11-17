<?php
include_once(dirname(__FILE__)."/../mysql_connect.php");
include_once(dirname(__FILE__)."/../sql_operation.php");
function mail_receive_message($id){
      date_default_timezone_set('Asia/Taipei');
      $MAILDATE = date("Y-m-d");
      $COMADD = search('COMADD', 'OWNMAS', 'COMNM', 'Trisoap');
      $COMEMAIL = search('COMEMAIL', 'OWNMAS', 'COMNM', 'Trisoap');
      $COMWEB = search('COMWEB', 'OWNMAS', 'COMNM', 'Trisoap');
      $to = $id;
      $subject = "三三吾鄉希望留心語通知信";
      $msg = "親愛的三三客戶您好：

      我們在此誠摯的感謝您參與三三吾鄉「希望留心語」的活動，本活動的出發便是希望可以透過社福模式的翻轉，讓消費者跟我們的身障夥伴有更多的互動，以讓他們增加和社會的聯結。
      目前您所提交的留心語內容已進入審核的程序，為避免惡意散播訊息、惡意攻擊等因素，三三吾鄉團隊將會花1-3天的時間審核各方提交之訊息，若您所投遞的訊息通過後我們將會再來信通知您，並將折扣金附於信中，還請您耐心等候。
      感謝您的體諒以及對三三吾鄉的支持，希望您和我們一起共同，持續為身障議題發聲。

      三三吾鄉社會企業團隊敬上
      ".$MAILDATE."
      ________________________________

      三三吾鄉社會企業
      地址 : ".$COMADD."
      email : ".$COMEMAIL."
      網址 : ".$COMWEB;
      $headers = "From: trisoap2015@gmail.com";

      if(!mail("$to", "$subject", "$msg", "$headers")){
            echo "信件發送失敗！";
      }
}
function mail_receive_order($id, $ORDNO, $PAYTYPE, $NAME){
      date_default_timezone_set('Asia/Taipei');
      $MAILDATE = date("Y-m-d");
      $COMADD = search('COMADD', 'OWNMAS', 'COMNM', 'Trisoap');
      $COMEMAIL = search('COMEMAIL', 'OWNMAS', 'COMNM', 'Trisoap');
      $COMWEB = search('COMWEB', 'OWNMAS', 'COMNM', 'Trisoap');
      $to = $id;
      $subject = "三三吾鄉訂單處理通知信";
      $msg = "＊此信件為系統發出信件，請勿直接回覆，謝謝！＊

      親愛的會員您好：
      此封信件來自三三吾鄉，告知您三三吾鄉已接獲您此次的訂購需求，我們將以最快速度處理！<br>
      感謝您對三三吾鄉的支持並承蒙您訂購我們的商品，以下資料是您本次的訂購清單明細，如有問題則請依訂單編號向我們查詢，並來信與我們聯絡，謝謝您！
      ＊以下幾件事情提醒您
            1. 三三吾鄉所有商品皆為堅持手作之冷製手工皂，冷製製程繁複需耗費相當多的時間以維持三三吾鄉商品之品質，如若遇缺貨時期還請您耐心等候。
            2. 三三吾鄉仍保有決定是否接受訂單及出貨與否之權利，出貨以及取貨通知函，將以E-mail方式通知您！
            3. 請再次確認您所填寫的聯絡資料是否正確，以確保貨品能正確送達到您手上。
            4. 如商品有任何瑕疵與毀損狀況，請保留發票，並寄信至我們的信箱trisoap2015@gmail.com與我們聯絡，並切勿丟棄商品，保留完整的到貨商品，我們將儘速和您聯繫。
      Dear TriSoap Member,
      This is a message from TriSoap SE.
      Please do not reply this mail directly.
      We would like to express our biggest appreciation to you that you book our commodities.<br>
      We will try our best to deal with your booking case as soon as possible and we would like to deliver our sincere thankfulness for your waiting.

      Thank You.

      訂單編號：".$ORDNO."
      付款方式：".$PAYTYPE."
      收件人：".$NAME."
      訂購商品名稱與數量：";
      $queryitem1 = "SELECT * FROM ORDITEMMAS WHERE ORDNO='$ORDNO'";
      $queryitem2 = mysql_query($queryitem1);
      while($queryitem = mysql_fetch_array($queryitem2)){
            $queryName1 = $queryitem['ITEMNO'];
            $queryName2 = "SELECT ITEMNM FROM ITEMMAS WHERE ITEMNO='$queryName1'";
            $queryName3 = mysql_query($queryName2);
            $queryName4 = mysql_fetch_array($queryName3);
            $queryName = $queryName4['ITEMNM'];
            $msg .= $queryName;
            $msg .= " x ";
            $msg .= $queryitem['ORDAMT'];
            $msg .= "<br>";
      }
      $msg .= "
      三三吾鄉堅持給你最好的服務，如有問題歡迎來信詢問。

      三三吾鄉社會企業團隊敬上
      ".$MAILDATE."
      ________________________________

      三三吾鄉社會企業
      地址 : ".$COMADD."
      email : ".$COMEMAIL."
      網址 : ".$COMWEB;
      $headers = "From: trisoap2015@gmail.com";

      if(!mail("$to", "$subject", "$msg", "$headers")){
            echo "信件發送失敗！";
      }
}
function mail_pass_message($id){
      date_default_timezone_set('Asia/Taipei');
      $MAILDATE = date("Y-m-d");
      $COMADD = search('COMADD', 'OWNMAS', 'COMNM', 'Trisoap');
      $COMEMAIL = search('COMEMAIL', 'OWNMAS', 'COMNM', 'Trisoap');
      $COMWEB = search('COMWEB', 'OWNMAS', 'COMNM', 'Trisoap');
      $to = $id;
      $subject = "三三吾鄉希望留心語核可通知";
      $msg = "親愛的三三吾鄉客戶您好：

      首先我們恭喜您近日提交至三三吾鄉網站之「希望留心語」活動已獲得核可。在此誠摯的感謝您參與本次活動，並附贈活動網頁，快去找找您的留言在哪吧！
      網站網址：trisoap.com
      三三吾鄉每半年就會將所蒐集到的顧客回饋統整成影片與照片串流放送回饋給辛苦的三三夥伴們！翻轉社福團體的作風，並讓身障朋友與社會有更多的連結。
      您的回饋折扣金 25 元已匯入您的帳號，將於您下次消費時自動抵用。
      由衷感謝您蒞臨本站。
      三三吾鄉期待下次與您的再相遇。
      讓我們一起為台灣的身障福利努力。

      三三吾鄉社會企業團隊敬上
      ".$MAILDATE."
      ________________________________

      三三吾鄉社會企業
      地址 : ".$COMADD."
      email : ".$COMEMAIL."
      網址 : ".$COMWEB;
      $headers = "From: trisoap2015@gmail.com";

      if(!mail("$to", "$subject", "$msg", "$headers")){
            echo "信件發送失敗！";
      }
}
function mail_pass_order($id, $ORDNO){
      date_default_timezone_set('Asia/Taipei');
      $MAILDATE = date("Y-m-d");
      $COMADD = search('COMADD', 'OWNMAS', 'COMNM', 'Trisoap');
      $COMEMAIL = search('COMEMAIL', 'OWNMAS', 'COMNM', 'Trisoap');
      $COMWEB = search('COMWEB', 'OWNMAS', 'COMNM', 'Trisoap');
      $to = $id;
      $subject = "三三吾鄉出貨通知信";
      $msg = "親愛的三三客戶您好：

      您的訂單（編號 ".$ORDNO."）已於今日出貨，故來信通知您，產品將於1-3日或依您指定時間到達。
      您所指定的到貨的時間及需求，我們已請貨運公司”盡量配合”您的需求，但物流過程因交通、配送路線等因素，無法保證一定可以完全依您指定時間到達，敬請見諒，提醒您，若收到貨款後發現有瑕疵，請務必保留原商品並儘速與我們聯絡，感謝您！
      您所訂購的商品或物流配送過程如有任何問題，都歡迎來信與我們聯絡：trisoap2015@gmail.com
      非常謝謝您對三三吾鄉的支持，歡迎您再次蒞臨本站！

      三三吾鄉社會企業團隊敬上
      ".$MAILDATE."
      ________________________________

      三三吾鄉社會企業
      地址 : ".$COMADD."
      email : ".$COMEMAIL."
      網址 : ".$COMWEB;
      $headers = "From: trisoap2015@gmail.com";

      if(!mail("$to", "$subject", "$msg", "$headers")){
            echo "信件發送失敗！";
      }
}
function mail_verify($id, $code){
      date_default_timezone_set('Asia/Taipei');
      $MAILDATE = date("Y-m-d");
      $COMADD = search('COMADD', 'OWNMAS', 'COMNM', 'Trisoap');
      $COMEMAIL = search('COMEMAIL', 'OWNMAS', 'COMNM', 'Trisoap');
      $COMWEB = search('COMWEB', 'OWNMAS', 'COMNM', 'Trisoap');
      $to = $id;
      $subject = "三三吾鄉會員註冊驗證碼";
      $msg = "親愛的三三客戶您好：

      我們在此誠摯的感謝您註冊三三吾鄉成為會員，期望未來能有榮幸為您服務。
      您的會員註冊驗證碼為 ".$code." ，請至原註冊頁面輸入以完成會員註冊。
      感謝您對三三吾鄉的支持。

      三三吾鄉社會企業團隊敬上
      ".$MAILDATE."
      ________________________________

      三三吾鄉社會企業
      地址 : ".$COMADD."
      email : ".$COMEMAIL."
      網址 : ".$COMWEB;
      $headers = "From: trisoap2015@gmail.com";

      if(!mail("$to", "$subject", "$msg", "$headers")){
            echo "信件發送失敗！";
      }
}
function mail_reset_password($id, $code){
      date_default_timezone_set('Asia/Taipei');
      $MAILDATE = date("Y-m-d");
      $COMADD = search('COMADD', 'OWNMAS', 'COMNM', 'Trisoap');
      $COMEMAIL = search('COMEMAIL', 'OWNMAS', 'COMNM', 'Trisoap');
      $COMWEB = search('COMWEB', 'OWNMAS', 'COMNM', 'Trisoap');
      $to = $id;
      $subject = "三三吾鄉會員密碼重設通知";
      $msg = "親愛的三三客戶您好：

      我們收到您忘記密碼的申請，已經將您的密碼重新設定，請使用新密碼登入。
      您的新密碼為 ".$code." ，請至原登入頁面登入。
      您可再去會員中心重新設定您所習慣使用的密碼，若有任何問題歡迎寄信或來電與我們聯繫。
      感謝您對三三吾鄉的支持。

      三三吾鄉社會企業團隊敬上
      ".$MAILDATE."
      ________________________________

      三三吾鄉社會企業
      地址 : ".$COMADD."
      email : ".$COMEMAIL."
      網址 : ".$COMWEB;
      $headers = "From: trisoap2015@gmail.com";

      if(!mail("$to", "$subject", "$msg", "$headers")){
            echo "信件發送失敗！";
      }
}
?>