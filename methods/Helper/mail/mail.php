<?
include("Helper/mail/PHPMailerAutoload.php"); //匯入PHPMailer類別

function mail_receive_message($id, $COMADD, $COMEMAIL){
      $mail= new PHPMailer(); //建立新物件
      $mail->IsSMTP(); //設定使用SMTP方式寄信
      $mail->SMTPAuth = true; //設定SMTP需要驗證
      $mail->SMTPSecure = 'ssl'; // Gmail的SMTP主機需要使用SSL連線
      $mail->Host = "smtp.gmail.com"; //Gmail的SMTP主機
      $mail->Port = 465;  //Gmail的SMTP主機的SMTP埠位為465埠。
      $mail->IsHTML(true); //設定郵件內容為HTML
      $mail->CharSet = "utf-8"; //設定郵件編碼
      $mail->Username = "trisoap2015@gmail.com"; //設定驗證帳號
      $mail->Password = "2015n0n0"; //設定驗證密碼
      $mail->From = "trisoap2015@gmail.com"; //設定寄件者信箱
      $mail->FromName = "三三吾鄉社會企業"; //設定寄件者姓名
      date_default_timezone_set('Asia/Taipei');
      $MAILDATE = date("Y-m-d");
      $mail->Subject = "三三吾鄉希望留心語通知信"; //設定郵件標題
      $mail->Body = "親愛的三三客戶您好：<br>
      <br>
      我們在此誠摯的感謝您參與三三吾鄉「希望留心語」的活動，本活動的出發便是希望可以透過社福模式的翻轉，讓消費者跟我們的身障夥伴有更多的互動，以讓他們增加和社會的聯結。<br>
      <br>
      目前您所提交的留心語內容已進入審核的程序，為避免惡意散播訊息、惡意攻擊等因素，三三吾鄉團隊將會花1-3天的時間審核各方提交之訊息，若您所投遞的訊息通過後我們將會再來信通知您，並將折扣金附於信中，還請您耐心等候。<br>
      <br>
      感謝您的體諒以及對三三吾鄉的支持，希望您和我們一起共同，持續為身障議題發聲。<br>
      <br>
      三三吾鄉社會企業團隊敬上<br>".$MAILDATE."<br>
      ________________________________<br>
      <br>
      三三吾鄉社會企業<br>
      地址 : ".$COMADD."<br>
      email : ".$COMEMAIL."<br>
      網址 : xxxxxxxxxxxxx<br>"; //設定郵件內容
      $mail->AddAddress($id); //設定收件者郵件及名稱
      if(!$mail->Send()) {        
          echo "Mail not sent!";        
      }
}

function mail_receive_order($id, $ORDNO, $NAME, $COMADD, $COMEMAIL){
      $mail= new PHPMailer(); //建立新物件
      $mail->IsSMTP(); //設定使用SMTP方式寄信
      $mail->SMTPAuth = true; //設定SMTP需要驗證
      $mail->SMTPSecure = 'ssl'; // Gmail的SMTP主機需要使用SSL連線
      $mail->Host = "smtp.gmail.com"; //Gmail的SMTP主機
      $mail->Port = 465;  //Gmail的SMTP主機的SMTP埠位為465埠。
      $mail->IsHTML(true); //設定郵件內容為HTML
      $mail->CharSet = "utf-8"; //設定郵件編碼
      $mail->Username = "trisoap2015@gmail.com"; //設定驗證帳號
      $mail->Password = "2015n0n0"; //設定驗證密碼
      $mail->From = "trisoap2015@gmail.com"; //設定寄件者信箱
      $mail->FromName = "三三吾鄉社會企業"; //設定寄件者姓名
      date_default_timezone_set('Asia/Taipei');
      $MAILDATE = date("Y-m-d");
      $mail->Subject = "三三吾鄉訂單處理通知信"; //設定郵件標題        
      $mail->Body = "＊此信件為系統發出信件，請勿直接回覆，感謝您的配合。謝謝！＊<br>
      <br>
      親愛的會員您好：<br>
      此封信件來自三三吾鄉，告知您三三吾鄉已接獲您此次的訂購需求，我們將以最快速度處理！<br>
      感謝您對三三吾鄉的支持並承蒙您訂購我們的商品，以下資料是您本次的訂購清單明細，如有問題則請依訂單編號向我們查詢，並來信與我們聯絡，謝謝您！<br>
      ＊以下幾件事情提醒您<br>
              1. 三三吾鄉所有商品皆為堅持手作之冷製手工皂，冷製製程繁複需耗費相當多的時間以維持三三吾鄉商品之品質，如若遇缺貨時期還請您耐心等候。<br>
              2. 三三吾鄉仍保有決定是否接受訂單及出貨與否之權利，出貨以及取貨通知函，將以E-mail方式通知您！<br>
              3. 請再次確認您所填寫的聯絡資料是否正確，以確保貨品能正確送達到您手上。<br>
              4. 如商品有任何瑕疵與毀損狀況，請保留發票，並寄信至我們的信箱trisoap2015@gmail.com與我們聯絡，並切勿丟棄商品，保留完整的到貨商品，我們將儘速和您聯繫。<br>
      Dear TriSoap Member,<br>
      This is a message from TriSoap SE.<br>
      Please do not reply this mail directly.<br>
      We would like to express our biggest appreciation to you that you book our commodities.<br>
      We will try our best to deal with your booking case as soon as possible and we would like to deliver our sincere thankfulness for your waiting.<br>
      <br>
      Thank You.<br>
      <br>
      訂單編號：".$ORDNO."<br>
      付款方式：xxxxxx<br>
      收 件 人：".$NAME."<br>
      訂購商品名稱與數量：<br>";
      $queryitem1 = "SELECT * FROM ORDITEMMAS WHERE ORDNO='$ORDNO'";
      $queryitem2 = mysql_query($queryitem1);
      while($queryitem = mysql_fetch_array($queryitem2)){
          $mail->Body .= $queryitem['ITEMNO'];
          $mail->Body .= " x ";
          $mail->Body .= $queryitem['ORDAMT'];
          $mail->Body .= "<br>";
      }
      $mail->Body .= "<br>
      三三吾鄉堅持給你最好的服務，如有問題歡迎來信詢問<br>
      三三吾鄉團隊敬上<br>".$MAILDATE."<br>
      ________________________________<br>
      <br>
      三三吾鄉社會企業<br>
      地址 : ".$COMADD."<br>
      email : ".$COMEMAIL."<br>
      網址 : xxxxxxxxxxxxx<br>"; //設定郵件內容
      $mail->AddAddress($id); //設定收件者郵件及名稱
      if(!$mail->Send()) {        
          echo "Mail not sent!";        
      }
}

function mail_pass_message($id, $COMADD, $COMEMAIL){
      $mail= new PHPMailer(); //建立新物件
      $mail->IsSMTP(); //設定使用SMTP方式寄信
      $mail->SMTPAuth = true; //設定SMTP需要驗證
      $mail->SMTPSecure = 'ssl'; // Gmail的SMTP主機需要使用SSL連線
      $mail->Host = "smtp.gmail.com"; //Gmail的SMTP主機
      $mail->Port = 465;  //Gmail的SMTP主機的SMTP埠位為465埠。
      $mail->IsHTML(true); //設定郵件內容為HTML
      $mail->CharSet = "utf-8"; //設定郵件編碼
      $mail->Username = "trisoap2015@gmail.com"; //設定驗證帳號
      $mail->Password = "2015n0n0"; //設定驗證密碼
      $mail->From = "trisoap2015@gmail.com"; //設定寄件者信箱
      $mail->FromName = "三三吾鄉社會企業"; //設定寄件者姓名
      date_default_timezone_set('Asia/Taipei');
      $MAILDATE = date("Y-m-d");
      $mail->Subject = "三三吾鄉希望留心語核可通知"; //設定郵件標題
      $mail->Body = "親愛的三三吾鄉客戶您好：<br>
      <br>
      首先我們恭喜您近日提交至三三吾鄉網站之「希望留心語」活動已獲得核可。在此誠摯的感謝您參與本次活動，並附贈活動網頁，快去找找您的留言在哪吧！<br>
      網站網址：xxxxxxxxxxxxxxxx<br>
      <br>
      三三吾鄉每半年就會將所蒐集到的顧客回饋統整成影片與照片串流放送回饋給辛苦的三三夥伴們！翻轉社福團體的作風，並讓身障朋友與社會有更多的連結。
      <br>
      您的回饋折扣金 25 元已匯入您的帳號，將於您下次消費時自動抵用。<br>
      <br>
      由衷感謝您蒞臨本站。<br>
      三三吾鄉期待下次與您的再相遇。<br>
      讓我們一起為台灣的身障福利努力。<br>
      <br>
      三三吾鄉社會企業團隊敬上<br>".$MAILDATE."<br>
      ________________________________<br>
      <br>
      三三吾鄉社會企業<br>
      地址 : ".$COMADD."<br>
      email : ".$COMEMAIL."<br>
      網址 : xxxxxxxxxxxxx<br>"; //設定郵件內容
      $mail->AddAddress($id); //設定收件者郵件及名稱
      if(!$mail->Send()) {        
        echo "Mail not sent!";        
      }
}

function mail_pass_order($id, $ORDNO, $COMADD, $COMEMAIL){
      $mail= new PHPMailer(); //建立新物件
      $mail->IsSMTP(); //設定使用SMTP方式寄信
      $mail->SMTPAuth = true; //設定SMTP需要驗證
      $mail->SMTPSecure = 'ssl'; // Gmail的SMTP主機需要使用SSL連線
      $mail->Host = "smtp.gmail.com"; //Gmail的SMTP主機
      $mail->Port = 465;  //Gmail的SMTP主機的SMTP埠位為465埠。
      $mail->IsHTML(true); //設定郵件內容為HTML
      $mail->CharSet = "utf-8"; //設定郵件編碼
      $mail->Username = "trisoap2015@gmail.com"; //設定驗證帳號
      $mail->Password = "2015n0n0"; //設定驗證密碼
      $mail->From = "trisoap2015@gmail.com"; //設定寄件者信箱
      $mail->FromName = "三三吾鄉社會企業"; //設定寄件者姓名
      date_default_timezone_set('Asia/Taipei');
      $MAILDATE = date("Y-m-d");
      $mail->Subject = "三三吾鄉出貨通知信"; //設定郵件標題        
      $mail->Body = "親愛的三三客戶您好：<br>
      <br>
      您的訂單（編號 ".$ORDNO."）已於今日出貨，故來信通知您，產品將於1-3日或依您指定時間到達。<br>
      您所指定的到貨的時間及需求，我們已請貨運公司”盡量配合”您的需求，但物流過程因交通、配送路線等因素，無法保證一定可以完全依您指定時間到達，敬請見諒，提醒您，若收到貨款後發現有瑕疵，請務必保留原商品並儘速與我們聯絡，感謝您！<br>
      <br>
      您所訂購的商品或物流配送過程如有任何問題，都歡迎來信與我們聯絡：trisoap2015@gmail.com<br>
      <br>
      非常謝謝您對三三吾鄉的支持，歡迎您再次蒞臨本站！<br>
      三三吾鄉社會企業團隊敬上<br>".$MAILDATE."<br>
      ________________________________<br>
      <br>
      三三吾鄉社會企業<br>
      地址 : ".$COMADD."<br>
      email : ".$COMEMAIL."<br>
      網址 : xxxxxxxxxxxxx<br>"; //設定郵件內容
      $mail->AddAddress($id); //設定收件者郵件及名稱
      if(!$mail->Send()) {        
            echo "Mail not sent!";        
      }
}

function mail_verify($id, $code, $COMADD, $COMEMAIL){
      $mail= new PHPMailer(); //建立新物件
      $mail->IsSMTP(); //設定使用SMTP方式寄信
      $mail->SMTPAuth = true; //設定SMTP需要驗證
      $mail->SMTPSecure = 'ssl'; // Gmail的SMTP主機需要使用SSL連線
      $mail->Host = "smtp.gmail.com"; //Gmail的SMTP主機
      $mail->Port = 465;  //Gmail的SMTP主機的SMTP埠位為465埠。
      $mail->IsHTML(true); //設定郵件內容為HTML
      $mail->CharSet = "utf-8"; //設定郵件編碼
      $mail->Username = "trisoap2015@gmail.com"; //設定驗證帳號
      $mail->Password = "2015n0n0"; //設定驗證密碼
      $mail->From = "trisoap2015@gmail.com"; //設定寄件者信箱
      $mail->FromName = "三三吾鄉社會企業"; //設定寄件者姓名
      date_default_timezone_set('Asia/Taipei');
      $MAILDATE = date("Y-m-d");
      $mail->Subject = "三三吾鄉會員註冊驗證碼"; //設定郵件標題        
      $mail->Body = "親愛的三三客戶您好：<br>
      <br>
      我們在此誠摯的感謝您註冊三三吾鄉成為會員，期望未來能有榮幸為您服務。<br>
      <br>
      您的會員註冊驗證碼為 ".$code." ，請至原註冊頁面輸入以完成會員註冊。<br>
      <br>
      感謝您對三三吾鄉的支持。<br>
      <br>
      三三吾鄉社會企業團隊敬上<br>".$MAILDATE."<br>
      ________________________________<br>
      <br>
      三三吾鄉社會企業<br>
      地址 : ".$COMADD."<br>
      email : ".$COMEMAIL."<br>
      網址 : xxxxxxxxxxxxx<br>"; //設定郵件內容
      $mail->AddAddress($id); //設定收件者郵件及名稱
      if(!$mail->Send()) {        
            echo "Mail not sent!";        
      }
}