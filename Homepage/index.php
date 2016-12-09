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
    <link rel="shortcut icon" href="Homepage/img/misc/favicon.png">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>三三吾鄉手工皂Trisoap</title>
    <!-- Bootstrap Core CSS-->
    <link href="Homepage/css/bootstrap.min.css" rel="stylesheet">
    <!-- FlexSlider CSS -->
    <link href="../FlexSlider/flexslider.css" rel="stylesheet">
    <!-- Custom CSS-->
    <link href="Homepage/css/trisoap.css" rel="stylesheet">
  </head>
  <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" class="top">
    <!-- Preloader-->
    <div id="preloader">
      <div id="status"></div>
    </div>

    <!-- Navigation-->
    <?php include 'nav_Homepage.php'; ?>

    <!-- Header-->
    <header>
      <!-- Intro Header-->
      <div class="container-fluid flexslider">
        <ul class="slides">
          <li>
            <div>
              <a href="Homepage/about.php">
                <img class="flexslides" src="Homepage/img/index1.png">
              </a>
              <div id="slide-textarea1">
                <p class="slide-text" id="slide-text1">三三手皂<br>x<br>來自吾鄉</p>
              </div>
            </div>
          </li>
          <li>
            <div>
              <a href="Homepage/about.php">
                <img class="flexslides" src="Homepage/img/index2.png">
              </a>
              <div id="slide-textarea2-1">
                <span class="slide-text" id="slide-text2-1-1">小農</span>
                <span class="slide-text" id="slide-text2-1-2">素材</span>
              </div>
              <div id="slide-textarea2-2">
                <span class="slide-text" id="slide-text2-2-1">每個細節都是</span>
                <span class="slide-text" id="slide-text2-2-2">嚴選</span>
              </div>
              <div id="slide-textarea2-3">
                <span class="slide-text" id="slide-text2-3">。</span>
              </div>
            </div>
          </li>
          <li>
            <div>
              <a href="Homepage/about.php">
                <img class="flexslides" src="Homepage/img/index3.png">
              </a>
              <div id="slide-textarea3">
                <p class="slide-text" id="slide-text3">每一顆手工皂<br>都是注入憨兒們歡笑的<br>純淨手作</p>
              </div>
            </div>
          </li>
          <li>
            <div>
              <a href="Homepage/about.php">
                <img class="flexslides" src="Homepage/img/index4.png">
              </a>
              <div id="slide-textarea4">
                <p class="slide-text" id="slide-text4">冷製的堅持<br>手作的溫度</p>
              </div>
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

    <!-- Services Section-->
    <section id="services">
      <div class="container text-center">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <h3>三個故事 Tri  Story</h3>
            <p>一切都是從一個座落在寧靜城市裡的、專門開辦二手販售以及手工皂製作的小型作業所---「李勝賢文教基金會」開始的</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Slider Section-->
    <section id="about-slider">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div id="carousel-light" class="carousel slide carousel-fade">
              <ol class="carousel-indicators">
                <li data-target="#carousel-light" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-light" data-slide-to="1"></li>
              </ol>
              <div role="listbox" class="carousel-inner">
                <div class="item active"><img src="Homepage/img/production1.jpg" alt="" class="img-responsive center-block"></div>
                <div class="item"><img src="Homepage/img/production2.png" alt="" class="img-responsive center-block"></div>
              </div>
            </div>
          </div>
          <div class="col-lg-5 col-lg-offset-1">
            <h3>愛的釀皂</h3>
            <p>我們故事的第一主角，就是一個個穿上工作服、蓄勢待發地在一旁準備的憨兒們。我們在學習打皂時，他們活像個監督我們生產流程的督導一般。我們非常迅速地在「攪拌」關卡中，不到十分鐘便棄械投降，一旁的憨兒主動地替補了我們的工作，在測量每一種油品時的專注力高的嚇人，連一滴油都不會逃過他們的法眼，當時的我們，深深被這一幅畫面所震懾。</p>
            <!-- <a href="#" target="_blank" class="btn btn-dark">更多</a> -->
          </div>
        </div>
      </div>
    </section>

    <!-- Slider Section-->
    <section id="about-slider">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div id="carousel-light2" class="carousel slide carousel-fade">
              <ol class="carousel-indicators">
                <li data-target="#carousel-light2" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-light2" data-slide-to="1"></li>
                <li data-target="#carousel-light2" data-slide-to="2"></li>
              </ol>
              <div role="listbox" class="carousel-inner">
                <div class="item active"><img src="Homepage/img/farmer1.jpg" alt="" class="img-responsive center-block"></div>
                <div class="item"><img src="Homepage/img/farmer2.png" alt="" class="img-responsive center-block"></div>
                <div class="item"><img src="Homepage/img/farmer3.png" alt="" class="img-responsive center-block"></div>
              </div>
            </div>
          </div>
          <div class="col-lg-5 col-lg-offset-1">
            <h3>吾鄉小農</h3>
            <p>第二個故事主角，就是位於台東的在地小農與三樣特色農作物－米、金針花跟釋迦。會成為我們主角的原因很簡單，因為他們堅持好品質、有機，照顧農作物像照顧自己的孩子一樣，用山泉水灌溉並使用自然農法，他們的堅持正完全符合我們的經營理念！</p>
            <!-- <a href="#" target="_blank" class="btn btn-dark">更多</a> -->
          </div>
        </div>
      </div>
    </section>


    <!-- Quotes-->
    <section class="section-small bg-img3 text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
            <p><i class="icon fa fa-quote-left fa-lg"></i></p>
            <h4>社會企業</h4>
            <h4 class="slogan-text">
              第三個故事就是被憨兒們的可愛笑容和在地小農的堅持與用心所深深感動的我們。在更多的拜訪與研究過後我們發現，
              臺灣社福團體做的公益手工皂普遍銷路不佳紛紛面臨困境，不僅人員技術不足、通路不穩、行銷、研發......各項經驗更是挑戰，
              讓學員們作皂明明是一件一石二鳥的事情但卻常常成為社福團體的一大困擾。
              我們希望串聯起各地區的資源，和社福團體一同打造一個手工皂界的生態。
              透過社福團體、社會企業、當地小農三方協力的過程，
              並由我們研發當地素材入皂並技術移轉及培訓身障朋友，精煉生產流程再以品牌的力量作行銷與推廣。
            </h4>
            <p><i class="icon fa fa-quote-right fa-lg"></i></p>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer Section-->
    <section class="footer bg-gray">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h3><a href="Homepage/about.php">關於我們</a></h3>
            <p>「三三吾鄉」的名稱由來，是因每個產品背後，都蘊含三個故事：社福團體喜憨兒協力生產的故事，在地小農用心耕耘的故事，以及身為社會企業的我們，串聯推動夢想的故事。</p>
          </div>
          <div class="col-md-4">
            <h3><a href="Homepage/faq.php">常見問題</a></h3>
            <p>三三的肥皂都是如何製作的？「冷製手工皂」是使用純天然的基底植物油，搭配上鹼水調配再經過攪拌、保溫、晾皂等各種精細的過程，而後皂化成一個具有不同皂性的產品。</p>
          </div>
          <div class="col-md-4">
            <h3><a href="Homepage/contact.php">聯絡我們</a></h3>
            <?php
              # include "../methods/Helper/mysql_connect.php";
              # include "../methods/Helper/sql_operation.php";
              $COMTEL = search('COMTEL', 'OWNMAS', 'COMNM', 'Trisoap');
              $COMEMAIL = search('COMEMAIL', 'OWNMAS', 'COMNM', 'Trisoap');
              $COMADD = search('COMADD', 'OWNMAS', 'COMNM', 'Trisoap');
            ?>
            <p>
              <i class="fa fa-phone fa-fw fa-lg"></i>
              <?php echo $COMTEL;?>
            </p>
            <p>
              <i class="fa fa-envelope fa-fw fa-lg"></i>
              <?php echo $COMEMAIL;?>
            </p>
            <p>
              <i class="fa fa-map-marker fa-fw fa-lg"></i>
              <?php echo $COMADD;?>
            </p>
          </div>
        </div>
        <hr>
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
    <script src="Homepage/js/jquery-1.12.3.min.js"></script>
    <!-- Bootstrap Core JavaScript-->
    <script src="Homepage/js/bootstrap.min.js"></script>
    <!-- Plugin JavaScript-->
    <script src="Homepage/js/jquery.easing.min.js"></script>
    <script src="Homepage/js/jquery.countdown.min.js"></script>
    <script src="Homepage/js/device.min.js"></script>
    <script src="Homepage/js/form.min.js"></script>
    <script src="Homepage/js/jquery.placeholder.min.js"></script>
    <script src="Homepage/js/jquery.shuffle.min.js"></script>
    <script src="Homepage/js/jquery.parallax.min.js"></script>
    <script src="Homepage/js/jquery.circle-progress.min.js"></script>
    <script src="Homepage/js/jquery.swipebox.min.js"></script>
    <script src="Homepage/js/smoothscroll.min.js"></script>
    <script src="Homepage/js/tweecool.min.js"></script>
    <script src="Homepage/js/wow.min.js"></script>
    <script src="Homepage/js/jquery.smartmenus.js"></script>
    <!-- FlexSlider JS -->
    <script src="../FlexSlider/jquery.flexslider-min.js"></script>
        <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB3E86i8mx1BZDlAaLcknh_mWl4F70i4os"></script>
        <script src="Homepage/js/map.js"></script>
    <!-- Custom Theme JavaScript-->
    <script src="Homepage/js/pheromone.js"></script>
    <script src="Homepage/js/custom.js"></script>
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </body>
</html>
