<?php
  session_start();
  include "../methods/Helper/mysql_connect.php";
  include "../methods/Helper/sql_operation.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/misc/favicon.png">
    <title>春節禮盒 | 三三吾鄉手工皂Trisoap</title>
    <meta name="description" content="新春。在炮竹聲響的揭幕下又開展了新的一年，我總會在新的一年開端時期許下對自己對這個社會或對這個世界的期許：期許自己仍能堅持初衷勇往直前，期許這個社會逐漸友善，也期許這個世界，能夠繼續包容我們這群任性的人類，還有鼓勵這群想一起改變世界的我們。">
    <!-- Bootstrap Core CSS-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- FlexSlider CSS -->
    <link href="../FlexSlider/flexslider.css" rel="stylesheet">
    <!-- Custom CSS-->
    <link href="css/trisoap.css" rel="stylesheet">
  </head>
  <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" class="top">
    <!-- GA -->
    <?php include_once("../methods/Helper/analyticstracking.php") ?>

    <!-- Preloader-->
    <div id="preloader">
      <div id="status"></div>
    </div>

    <!-- Navigation-->
    <?php include 'nav.php'; ?>

    <!-- Header-->
    <header data-background="img/product/newyear/jumbotron_gift.jpg" class="intro introhalf" id="intro-product">
      <!-- Intro Header-->
      <div class="intro-body">
        <h1>春節禮盒</h1>
      </div>
    </header>
    <!-- News Block-->
    <section id="soapstring" class="section-small">
      <div class="container text-center">
        <p>
          新春。
	  在炮竹聲響的揭幕下又開展了新的一年
	  我總會在新的一年開端時期許下對自己對這個社會或對這個世界的期許
	  期許自己仍能堅持初衷勇往直前
	  期許這個社會逐漸友善
	  也期許這個世界
	  能夠繼續包容我們這群任性的人類
	  還有鼓勵這群想一起改變世界的我們。
        </p>
        <h3 class="pull-left">商品一覽</h3>
        <div class="clearfix"></div>
        <div class="row grid-pad">
          <div class="col-sm-12 col-md-6">
            <a href="newyear_yilan_gift.php">
              <img src="img/product/newyear/yilan_newyear_gift01.jpg" alt="宜蘭媽祖保庇禮" class="img-responsive center-block">
              <h5>宜蘭媽祖保庇禮</h5>
            </a>
            <p>
	    	受到宜蘭古城和漁港的啟發，今年春季三三吾鄉推出宜蘭媽祖保庇禮，搶眼的粉紅色帶來溫馨和喜慶的意向，更讓象徵漁港平安的媽祖保佑每個三三吾鄉的支持者新的一年都能風調雨順。
	    </p>
            <a href="newyear_yilan_gift.php" class="btn btn-gray btn-xs">更多</a>
          </div>
          <div class="col-sm-12 col-md-6">
            <a href="newyear_taitung_gift.php">
              <img src="img/product/newyear/taitung_newyear_gift01.jpg" alt="台東新春嘉年禮" class="img-responsive center-block">
              <h5>台東新春嘉年禮</h5>
            </a>
            <p>
            	三三吾鄉台東新春嘉年禮，選用來自台東五位優秀小農的產品特殊研發與製作，配上一致好評的三三吾鄉經典款配方以田靜山巒禾風皂為主打，創造出台東小農特色。更在亮眼但又舒適的粉紅底下排入台東的象徵-熱氣球，除了希望新的一年能向煙火般絢爛之外，更希望能和熱氣球同般登空，往更好的一年飛去。
	    </p>
            <a href="newyear_taitung_gift.php" class="btn btn-gray btn-xs">更多</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer Section-->
    <?php include 'footer.php'; ?>

    <!-- jQuery-->
    <script src="js/jquery-1.12.3.min.js"></script>
    <!-- Bootstrap Core JavaScript-->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugin JavaScript-->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/device.min.js"></script>
    <script src="js/form.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/jquery.shuffle.min.js"></script>
    <script src="js/jquery.parallax.min.js"></script>
    <script src="js/jquery.circle-progress.min.js"></script>
    <script src="js/jquery.swipebox.min.js"></script>
    <script src="js/smoothscroll.min.js"></script>
    <script src="js/tweecool.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery.smartmenus.js"></script>
    <!-- Custom Theme JavaScript-->
    <script src="js/pheromone.js"></script>
    <!-- FlexSlider JS -->
    <script src="../FlexSlider/jquery.flexslider-min.js"></script>
    <script src="js/flexslider_message.js"></script>
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </body>
</html>
