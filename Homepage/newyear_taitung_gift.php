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
    <title>台東新春嘉年禮｜三三吾鄉手工皂Trisoap</title>
    <meta name="description" content="三三吾鄉台東新春嘉年禮，選用來自台東五位優秀小農的產品特殊研發與製作，配上一致好評的三三吾鄉經典款配方以田靜山巒禾風皂為主打，創造出台東小農特色。更在亮眼但又舒適的粉紅底下排入台東的象徵-熱氣球，除了希望新的一年能向煙火般絢爛之外，更希望能和熱氣球同般登空，往更好的一年飛去。">
    <!-- Bootstrap Core CSS-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
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
    <header data-background="img/product/newyear/jumbotron_gift.jpg" class="intro introhalf">
      <!-- Intro Header-->
      <div class="intro-body">
        <h1>商品一覽</h1>
	<h4>台東新春嘉年禮</h4>
      </div>
    </header>
    <!-- shop-->
    <section id="shop" class="section-small">
      <div class="container">
        <div class="row">
          <!-- shop carousel-->
          <div id="carousel-shop" class="carousel slide">
            <div class="col-lg-6 carousel-outer">
              <!-- Wrapper for slides-->
              <div class="carousel-inner">
                <div class="item active"><img src="img/product/newyear/taitung_newyear_gift01.jpg" alt="台東新春嘉年禮01"></div>
		<div class="item"><img src="img/product/newyear/taitung_newyear_gift02.jpg" alt="台東新春嘉年禮02"></div>
		<div class="item"><img src="img/product/newyear/taitung_newyear_gift03.jpg" alt="台東新春嘉年禮03"></div>
                <!-- <div class="item"><img src="" alt=""></div> -->
              </div>
              <!-- Controls-->
              <a href="#carousel-shop" data-slide="prev" class="left carousel-control">
                <span class="icon-prev"></span>
              </a>
              <a href="#carousel-shop" data-slide="next" class="right carousel-control">
                <span class="icon-next"></span>
              </a>
            </div>
            <div class="col-lg-6 slide">
              <h4>台東新春嘉年禮</h4>
              <p>
              	臺東是三三吾鄉的發源。
		逐漸深耕在臺東的我們看見臺東近年的改變。
		除了國慶煙火在臺東以及盛大的熱氣球節之外更看見許多小農奮力辛勤地在風災之後為生計努力打拼的模樣。

		三三吾鄉台東新春嘉年禮，選用來自台東五位優秀小農的產品特殊研發與製作，配上一致好評的三三吾鄉經典款配方以田靜山巒禾風皂為主打，創造出台東小農特色。
更在亮眼但又舒適的粉紅底下排入台東的象徵-熱氣球，除了希望新的一年能向煙火般絢爛之外，更希望能和熱氣球同般登空，往更好的一年飛去。
	      </p>
              <!-- Indicators-->
              <ol class="carousel-indicators mCustomScrollbar">
                <li data-target="#carousel-shop" data-slide-to="0" class="active"><img src="img/product/newyear/taitung_newyear_gift01.jpg" alt="台東新春嘉年禮01"></li>
                <li data-target="#carousel-shop" data-slide-to="1"><img src="img/product/newyear/taitung_newyear_gift02.jpg" alt="台東新春嘉年禮02"></li>
		<li data-target="#carousel-shop" data-slide-to="2"><img src="img/product/newyear/taitung_newyear_gift03.jpg" alt="台東新春嘉年禮03"></li>
              </ol>
              <hr>
              <p>
		禮盒內含/
		臺東金絲森林渲染皂一百克 x1
		臺東田靜山巒禾風皂一百克 x1
		臺東釋迦手感果力皂一百克 x1
		臺東萱草米黃旅用皂絲包 x2
		臺東洛神紅麴旅用皂絲包 x2
		臺東薑黃暖暖旅用皂絲包 x2
	      </p>
              <form class="form-inline" method="post" action="../methods/Purchase_finish.php">
                <div class="form-group">
                  <h2 class="no-pad">$1100<small>（企業採購$500）</small></h2>
                </div>
                <div class="form-group">
                  <label for="number"></label>
                  <input id="number" type="number" name="ORDAMT" value="1" max="50" min="1" class="form-control">
                  <input type="hidden" name="ITEMNO" value="1">
                </div>
                <button type="submit" class="btn btn-dark">加入購物車</button>
              </form>
            </div>
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
