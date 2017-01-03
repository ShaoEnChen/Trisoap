<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/misc/favicon.png">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>三三吾鄉手工皂Trisoap</title>
    <!-- Bootstrap Core CSS-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS-->
    <link href="css/trisoap.css" rel="stylesheet">
    <link href="css/product.css" rel="stylesheet">
  </head>
  <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" class="top">
    <!-- GA -->
    <?php include_once("analyticstracking.php") ?>

    <!-- Preloader-->
    <div id="preloader">
      <div id="status"></div>
    </div>

    <!-- Navigation-->
    <?php include 'nav.php'; ?>

    <!-- Header-->
    <header data-background="img/jumbotrons/product_idea.jpg" class="intro introhalf" id="intro-product">
      <!-- Intro Header-->
      <div class="intro-body">
        <h1>臺東系列商品</h1>
        <h4>旅用皂絲</h4>
      </div>
    </header>
    <!-- News Block-->
    <section id="soapstring" class="section-small">
      <div class="container">
        <p>
          溫和而舒適的手作皂，綿密如雪絲，故名皂絲。
          為了解決憨兒手部精細動作不穩定的困難，
          三三吾鄉研發獨門皂絲組，將皂絲裝到不織布袋中，

          「不用拆封，沾水即可沖出獨特而舒適的洗感」

          攜帶方便，解決皂軟爛沾手黏附背包問題。
          用量設計，洗澡完即扔，輕鬆旅行無負擔。
          起泡加倍，沖洗搓揉快速來一場泡沫饗宴。
          天然環保，原料天然無毒打擊化學壓製皂。
        </p>
        <div class="clearfix"></div>
        <div class="row grid-pad">
          <div class="col-sm-12 col-md-6">
            <a href="product5.php">
              <img src="img/product/rice.png" alt="" class="img-responsive center-block">
              <h5>三三臺東意象皂絲旅行組</h5>
            </a>
            <p>
              內涵臺東洛神紅麴、萱草米黃、暖暖薑黃皂絲旅用組。
              天然手打皂絲，綿密的起泡讓你在旅途當中享受不同的驚奇。
              添加台東在地素材的旅行組，讓你在洗澡的時候也像在旅行。
            </p>
            <a href="product5.php" class="btn btn-gray btn-xs">更多</a>
          </div>
          <div class="col-sm-12 col-md-6">
            <a href="product6.php">
              <img src="img/product/lily.png" alt="" class="img-responsive center-block">
              <h5>洛神紅麴皂絲旅行組</h5>
            </a>
            <p>
              台東的艷麗珍寶，捧在農友的手上閃閃發光。
              自然主義之下的友善農法，
              將洛神與紅麴乾燥後添入的獨門絕配。
            </p>
            <a href="product6.php" class="btn btn-gray btn-xs">更多</a>
          </div>
          <div class="col-sm-12 col-md-6">
            <a href="product7.php">
              <img src="img/product/shakya.png" alt="" class="img-responsive center-block">
              <h5>暖暖薑黃旅用皂絲</h5>
            </a>
            <p>
              豔黃中帶點純樸的橘棕，
              經過薑黃伯特殊而又綿密的加工研磨，
              入皂而成的溫暖色澤讓你有個暖暖的冬天。
            </p>
            <a href="product7.php" class="btn btn-gray btn-xs">更多</a>
          </div>
          <div class="col-sm-12 col-md-6">
            <a href="product8.php">
              <img src="img/product/gift.png" alt="" class="img-responsive center-block">
              <h5>萱草米黃旅用皂絲</h5>
            </a>
            <p>
              盛開在池上的橘黃萱草，
              象徵著溫暖又偉大的母親。
              搭配來自非洲的紅棕櫚油，一起享受如母親溫暖般的呵護。
            </p>
            <a href="product8.php" class="btn btn-gray btn-xs">更多</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer Section-->
    <section class="footer bg-gray">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <ul class="list-inline">
              <li><a href="https://www.facebook.com/trisoap"><i class="fa fa-facebook fa-fw fa-lg"></i></a></li>
              <li><a href="Homepage/contact.php"><i class="fa fa-envelope fa-fw fa-lg"></i></a></li>
              <li><a href="https://www.pinkoi.com/store/trisoap">Pinkoi</a></li>
            </ul>
          </div>
          <div class="col-md-5">
            <p class="small">Copyright &copy; 2016 TriSoap All Rights Reserved</p>
          </div>
        </div>
      </div>
    </section>

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
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </body>
</html>
