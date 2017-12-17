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
    <title>宜蘭媽祖保庇禮｜三三吾鄉手工皂Trisoap</title>
    <meta name="description" content="受到宜蘭古城和漁港的啟發，今年春季三三吾鄉推出宜蘭媽祖保庇禮，搶眼的粉紅色帶來溫馨和喜慶的意向，更讓象徵漁港平安的媽祖保佑每個三三吾鄉的支持者新的一年都能風調雨順。">
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
	<h4>宜蘭媽祖保庇禮</h4>
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
                <div class="item active"><img src="img/product/newyear/yilan_newyear_gift01.jpg" alt="宜蘭媽祖保庇禮01"></div>
		<div class="item"><img src="img/product/newyear/yilan_newyear_gift02.jpg" alt="宜蘭媽祖保庇禮02"></div>
		<div class="item"><img src="img/product/newyear/yilan_newyear_gift03.jpg" alt="宜蘭媽祖保庇禮03"></div>
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
              <h4>宜蘭媽祖保庇禮</h4>
              <p>
	      	宜蘭是東部多漁港的古城。
		從南方澳到烏石港，
		從蕃薯寮到大溪漁港。

		三三吾鄉的宜蘭站從頭城開始，採用頭城地區的天然石花菜經過特殊萃取而應運而生的石花淨白洗面皂以及其他地區的特色小農單品與皂絲。

		受到宜蘭古城和漁港的啟發，今年春季三三吾鄉推出宜蘭媽祖保庇禮，搶眼的粉紅色帶來溫馨和喜慶的意向，更讓象徵漁港平安的媽祖保佑每個三三吾鄉的支持者新的一年都能風調雨順。
	      </p>
              <!-- Indicators-->
              <ol class="carousel-indicators mCustomScrollbar">
                <li data-target="#carousel-shop" data-slide-to="0" class="active"><img src="img/product/newyear/yilan_newyear_gift01.jpg" alt="宜蘭媽祖保庇禮01"></li>
                <li data-target="#carousel-shop" data-slide-to="1"><img src="img/product/newyear/yilan_newyear_gift02.jpg" alt="宜蘭媽祖保庇禮02"></li>
		<li data-target="#carousel-shop" data-slide-to="2"><img src="img/product/newyear/yilan_newyear_gift03.jpg" alt="宜蘭媽祖保庇禮03"></li>
              </ol>
              <hr>
              <p>
		禮盒內含/
		宜蘭石花淨白洗面皂一百克 x 1
		宜蘭紅瓜天然家事皂一百克 x 1
		宜蘭金柑苦茶洗髮皂一百克 x 1
		宜蘭蜂蜜甜心旅用皂絲包 x2
		宜蘭黑豆清爽旅用皂絲包 x2
		宜蘭米糠蕁葉旅用皂絲包 x2
	      </p>
              <form class="form-inline" method="post" action="../methods/Purchase_finish.php">
                <div class="form-group">
                  <h2 class="no-pad">$1100</h2>
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
