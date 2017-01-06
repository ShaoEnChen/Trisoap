<?php
  session_start();
  include "../methods/Helper/mysql_connect.php";
  include "../methods/Helper/sql_operation.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/misc/favicon.png">
    <title>三三吾鄉手工皂Trisoap</title>
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
    <header>
      <!-- Intro Header-->
      <div class="container-fluid flexslider">
        <ul class="slides">
          <li>
            <div>
              <a href="product.php">
                <img class="flexslides" src="img/index1.png">
              </a>
            </div>
          </li>
          <li>
            <div>
              <a href="about.php">
                <img class="flexslides" src="img/index2.png">
              </a>
            </div>
          </li>
          <li>
            <div>
              <a href="#">
                <img class="flexslides" src="img/index3.png">
              </a>
              <div id="slide-textarea3">
                <p class="slide-text" id="slide-text3">每一顆手工皂<br>都是注入憨兒們歡笑的<br>純淨手作</p>
              </div>
            </div>
          </li>
          <li>
            <div>
              <a href="about.php">
                <img class="flexslides" src="img/index4.png">
              </a>
            </div>
          </li>
        </ul>
        <div class="flexslider-controls">
          <ol class="flex-control-nav">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
          </ol>
        </div>
      </div>
    </header>

    <section id="buy-product">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <div class="product-element" id="product-element1">
              <div class="img-cover">
                <a href="product4.php" class="buy-now vertical-middle">立即購買</a>
              </div>
              <img src="img/product/gift.png" alt="">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="product-element" id="product-element2">
              <div class="img-cover">
                <a href="product1.php" class="buy-now vertical-middle">立即購買</a>
              </div>
              <img src="img/product/rice.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Services Section-->
    <section id="services" class="bg-orange">
      <div class="container text-center">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <h3>三個故事 Tri Story</h3>
            <p>一切都是從一個座落在寧靜城市裡的、專門開辦二手販售以及手工皂製作的小型作業所 -「李勝賢文教基金會」開始的</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Slider Section-->
    <section id="about-slider">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-12">
            <img src="img/society.png" class="img-responsive">
          </div>
          <div class="col-lg-5 col-lg-offset-1 col-md-12">
            <h3>愛的釀皂</h3>
            <p>
              我們故事的第一主角，就是一個個穿上工作服、蓄勢待發地在一旁準備的憨兒們。我們在學習打皂時，他們活像個監督我們生產流程的督導一般。我們非常迅速地在「攪拌」關卡中，不到十分鐘便棄械投降，一旁的憨兒主動地替補了我們的工作，在測量每一種油品時的專注力高的嚇人，連一滴油都不會逃過他們的法眼，當時的我們，深深被這一幅畫面所震懾。
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Slider Section-->
    <section id="about-slider2">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-12">
            <img src="img/farm.png" class="img-responsive">
          </div>
          <div class="col-lg-5 col-lg-offset-1 col-md-12">
            <h3>吾鄉小農</h3>
            <p>
              第二個故事主角，就是位於台東的在地小農與三樣特色農作物－米、金針花跟釋迦。會成為我們主角的原因很簡單，因為他們堅持好品質、有機，照顧農作物像照顧自己的孩子一樣，用山泉水灌溉並使用自然農法，他們的堅持正完全符合我們的經營理念！
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Slider Section-->
    <section id="about-slider3">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-12">
            <img src="img/intern.png" class="img-responsive">
          </div>
          <div class="col-lg-5 col-lg-offset-1 col-md-12">
            <h3>社會企業</h3>
            <p>
              第三個故事就是因著在地小農和社福團體而生的社會企業的故事，三三吾鄉秉持著社會企業的精神，協助解決在地的社會問題，期待透過新的創新，帶動在地的新生。
            </p>
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
    <!-- FlexSlider JS -->
    <script src="../FlexSlider/jquery.flexslider-min.js"></script>
        <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB3E86i8mx1BZDlAaLcknh_mWl4F70i4os"></script>
        <script src="js/map.js"></script>
    <!-- Custom Theme JavaScript-->
    <script src="js/pheromone.js"></script>
    <script src="js/custom.js"></script>
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </body>
</html>
