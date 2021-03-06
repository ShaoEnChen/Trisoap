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
    <title>金絲森林渲染皂｜三三吾鄉手工皂Trisoap</title>
    <meta name="description" content="點點金黃的花絲在皂上綴躍，好比座落在太麻里原生的花田，點綴著清幽的臺東。手作渲染的花紋，隨著不同的心情有所變化；每種皂款都為你獻上獨一。">
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
    <header data-background="img/product/detail/series.jpg" class="intro introhalf">
      <!-- Intro Header-->
      <div class="intro-body">
        <h1>商品一覽</h1>
        <h4>單品</h4>
        </h4>
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
                <div class="item active"><img src="img/product/lily.png" alt=""></div>
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
              <h4>金絲森林渲染皂 (金針花皂) </h4>
              <p>
                點點金黃的花絲在皂上綴躍，好比座落在太麻里原生的花田，點綴著清幽的臺東。
                手作渲染的花紋，隨著不同的心情有所變化；每種皂款都為你獻上獨一。
              </p>
              <!-- Indicators-->
              <ol class="carousel-indicators mCustomScrollbar">
                <li data-target="#carousel-shop" data-slide-to="0" class="active"><img src="img/product/lily.png" alt=""></li>
                <!-- <li data-target="#carousel-shop" data-slide-to="1"><img src="" alt=""></li> -->
              </ol>
              <hr>
              <p>主要成分 / 乳油木果脂 橄欖油 椰子油 棕梠油 台東乾燥金針花絲</p>
              <p>適用膚質 / 中性與乾燥之膚質適用</p>
              <div class="panel panel-default">
                <div id="heading1" role="tab" class="panel-heading">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="false" aria-controls="collapse1" class="collapsed">
                    <h4 class="panel-title">產品特色</h4>
                  </a>
                </div>
                <div id="collapse1" role="tabpanel" aria-labelledby="heading1" class="panel-collapse collapse">
                  <div class="panel-body">
                    乳油木果脂－－神奇奶油樹的聖品，由非洲乳油木樹中的果油提煉而出，在洗感上帶給肌膚滋潤卻又不黏膩的舒適體驗；搭配台東池上的乾燥金針，點點花絲由手作渲染而出的花紋更在視覺上帶來豐富感受。四種油品的經典配方是TriSoap三三的經典皂款，帶給你不論視覺或洗感上都獨一無二的經典旅程。
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div id="heading2" role="tab" class="panel-heading">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapse2" class="collapsed">
                    <h4 class="panel-title">在地小農</h4>
                  </a>
                </div>
                <div id="collapse2" role="tabpanel" aria-labelledby="heading2" class="panel-collapse collapse">
                  <div class="panel-body">
                    小農食在 －－ 清淨後花園的金針故鄉
                    金絲森林渲染皂當中的金針，乃是由「小農食在」所提供。小農食在的金針花田，有別於一般種植於高山上，而是在台東縣池上鄉的平地栽培，因此在非高山金針產季時，也能夠提供最新鮮的金針花。
                    市面上的金針花的加工品，為保有其鮮豔色澤與延長保存期間，經常添加二氧化硫，使含硫量超標，這些含硫金針，亦稱為「紅針、有毒金針」。而小農食在在製作過程中，完全不添加亞硫酸及其他添加物，是用於製作肥皂最好、安心的無硫金針。
                    <a target="_blank" href="https://www.facebook.com/pinganmipu/">
                      小農食在 https://www.facebook.com/pinganmipu/
                    </a>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div id="heading3" role="tab" class="panel-heading">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapse3" class="collapsed">
                    <h4 class="panel-title">愛心協力</h4>
                  </a>
                </div>
                <div id="collapse3" role="tabpanel" aria-labelledby="heading3" class="panel-collapse collapse">
                  <div class="panel-body">
                    金絲森林渲染皂，乃由TriSoap三三社會企業研發後，將技術免費移轉給李勝賢文教基金會，並由其協力生產。李勝賢文教基金會位於台東市區，是以服務憨兒為主的小型作業所，開辦愛心二手商店以及手工皂製作已有數年之久。裡頭的憨兒各個是作皂好手，只要提及作皂他們便展現優於一般人的專注力與專業程度。作皂不只為了成品，更在於每個憨兒在做好皂後的自信笑容。三三台東意象的每樣產品，在經過數個月的技術移轉與培訓後成功開發，每一顆手工皂，都是來自憨兒們歡笑天堂的純淨手作。
                  </div>
                </div>
              </div>
              <form class="form-inline" method="post" action="../methods/Purchase_finish.php">
                <div class="form-group">
                  <h2 class="no-pad">$300</h2>
                </div>
                <div class="form-group">
                  <label for="number"></label>
                  <input id="number" type="number" name="ORDAMT" value="1" max="50" min="1" class="form-control">
                  <input type="hidden" name="ITEMNO" value="product_sp_002">
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
