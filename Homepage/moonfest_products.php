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
    <title>中秋禮皂系列 | 三三吾鄉手工皂Trisoap</title>
    <meta name="description" content="">
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
    <header data-background="img/jumbotrons/soapstring.jpg" class="intro introhalf" id="intro-product">
      <!-- Intro Header-->
      <div class="intro-body">
        <h1>中秋禮皂</h1>
      </div>
    </header>
    <!-- News Block-->
    <section id="soapstring" class="section-small">
      <div class="container text-center">
        <p>
          想在中秋送份有意義又體面的禮盒，
          三三吾鄉中秋禮盒是您的不二選擇。
          多家企業指定贈禮。
        </p>
        <div class="slogan text-center">
          <h3>中秋，三三吾鄉與您團員</h3>
        </div>
        <div class="text-center">
          <p class="features">
          大方的剪裁配上三三吾鄉的金典款混搭，
          活潑的風格和繽紛的色彩，
          送給顧客一份歡樂和一份溫暖。
          中秋禮皂系列是大器又體面的最佳選擇。
          </p>
        </div>

        <h3 class="pull-left">商品一覽</h3>
        <div class="clearfix"></div>
        <div class="row grid-pad">
          <div class="col-sm-12 col-md-6">
            <a href="moonfest_moon_rabbit.php">
              <img src="img/product/moonfest/moonfest_moon_rabbit.jpg" alt="" class="img-responsive center-block">
              <h5>月兔捉迷藏</h5>
            </a>
            <p>
              三三吾鄉人氣繽紛贈禮，
              採用大膽的混搭色，
              襯托出月兔的活潑感，
              不同於傳統的月兔形象，
              硬是給你不一樣的三三感受。
            </p>
            <a href="moonfest_moon_rabbit.php" class="btn btn-gray btn-xs">更多</a>
          </div>
          <div class="col-sm-12 col-md-6">
            <a href="moonfest_hot_air_balloon.php">
              <img src="img/product/moonfest/moonfest_hot_air_balloon.jpg" alt="" class="img-responsive center-block">
              <h5>熱氣球登月</h5>
            </a>
            <p>
              什麼！？
              臺東熱氣球在中秋節時候登陸月球？
              在三三吾鄉的想像力世界中，
              台東專屬特色的熱氣球，
              不只帶你賞月更帶你搭熱氣球征服月亮！
            </p>
            <a href="moonfest_hot_air_balloon.php" class="btn btn-gray btn-xs">更多</a>
          </div>
          <div class="col-sm-12 col-md-6">
            <a href="">
              <img src="img/product/moonfest/moonfest_gift.jpg" alt="" class="img-responsive center-block">
              <h5>中秋混搭單品皂絲組</h5>
            </a>
            <p>
              月兔在台灣在地作物當中嬉笑，
              透過全暖色的設計帶給你三三吾鄉的絕佳精神。
              可根據顧客的需求而選擇內容物的混搭風，
              是經濟又實惠的團員禮。
            </p>
            <a href="" class="btn btn-gray btn-xs">更多</a>
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
