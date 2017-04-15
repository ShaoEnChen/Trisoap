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
    <title>單品 / 禮盒｜三三吾鄉手工皂Trisoap</title>
    <meta name="description" content="">
    <!-- Bootstrap Core CSS-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS-->
    <link href="css/trisoap.css" rel="stylesheet">
    <link href="css/product.css" rel="stylesheet">
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
    <header data-background="img/jumbotrons/product_idea.jpg" class="intro introhalf" id="intro-product">
      <!-- Intro Header-->
      <div class="intro-body">
        <h1>單品 / 禮盒</h1>
        <h4>臺東系列商品</h4>
      </div>
    </header>
    <!-- News Block-->
    <section id="news" class="section-small">
      <div class="container">
        <h3 class="pull-left">商品一覽</h3>
        <div class="clearfix"></div>
        <div class="row grid-pad">
          <div class="col-sm-12 col-md-6">
            <a href="product1.php">
              <img src="img/product/rice.png" alt="" class="img-responsive center-block">
              <h5>田靜山巒禾風皂 (米皂）</h5>
            </a>
            <p>
              甜杏仁油－蘊含天然維他命的豐富油，甜杏仁油是手工皂界的優良油品，富含天然維他命對於改善過乾的肌膚有良好的作用，亦適用於敏感性肌膚調理。禾風皂由台東池上在地小農「高家米倉」提供的純淨米糠乾燥研磨後添加至皂中，可藉由純淨米糠的顆粒清除肌膚中的細微髒汙。
            </p>
            <a href="product1.php" class="btn btn-gray btn-xs">更多</a>
          </div>
          <div class="col-sm-12 col-md-6">
            <a href="product2.php">
              <img src="img/product/lily.png" alt="" class="img-responsive center-block">
              <h5>金絲森林渲染皂 (金針花皂）</h5>
            </a>
            <p>
              乳油木果脂－神奇奶油樹的聖品，由非洲乳油木樹中的果油提煉而出，在洗感上帶給肌膚滋潤卻又不黏膩的舒適體驗；搭配台東池上的乾燥金針，點點花絲由手作渲染而出的花紋更在視覺上帶來豐富感受。四種油品的經典配方是TriSoap三三的經典皂款，帶給你不論視覺或洗感上都獨一無二的經典旅程。
            </p>
            <a href="product2.php" class="btn btn-gray btn-xs">更多</a>
          </div>
          <div class="col-sm-12 col-md-6">
            <a href="product3.php">
              <img src="img/product/shakya.png" alt="" class="img-responsive center-block">
              <h5>釋迦手感果力皂 (釋迦皂）</h5>
            </a>
            <p>
              葡萄籽油－洗淨後的清爽感受，葡萄籽油是軟油中的特色油品，洗淨後帶給肌膚非常清爽而不黏膩的感受，與橄欖油的成分交疊，會有大小泡沫交雜的豐富洗感。取自台東小農「釋迦小羊牧場」所提供的釋迦果實，藉由將微弱的果酸添加減低肥皂中過於刺激的鹼性達成天然的去除膚質表面髒汙的獨家體驗。
            </p>
            <a href="product3.php" class="btn btn-gray btn-xs">更多</a>
          </div>
          <div class="col-sm-12 col-md-6">
            <a href="product4.php">
              <img src="img/product/gift.png" alt="" class="img-responsive center-block">
              <h5>三三臺東意象禮盒組</h5>
            </a>
            <p>
              三三臺東意象禮盒，乃由TriSoap三三社會企業研發後，將技術免費移轉給李勝賢文教基金會，並由其協力生產。李勝賢文教基金會位於台東市，是以服務憨兒為主的小型作業所，開辦愛心二手商店及手工皂製作已有數年之久。裡頭的憨兒各個是作皂好手，只要提及作皂他們便展現優於一般人的專注力與專業程度。作皂不只為了成品，更在於每個憨兒在作好皂後的自信笑容。
            </p>
            <a href="product4.php" class="btn btn-gray btn-xs">更多</a>
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
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </body>
</html>
