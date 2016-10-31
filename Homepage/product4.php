<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/misc/favicon.png">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>三三社企-產品介紹</title>
    <!-- Bootstrap Core CSS-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS-->
    <link href="css/trisoap.css" rel="stylesheet">
    <script>
    function closed(){
      alert("此功能將在近期開放，敬請期待");
    }
    </script>
  </head>
  <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" class="top">
    <!-- Preloader-->
    <div id="preloader">
      <div id="status"></div>
    </div>
    <!-- Navigation-->
    <nav class="navbar navbar-custom navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" data-toggle="collapse" data-target=".navbar-main-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="#page-top" class="navbar-brand page-scroll">
            <!-- Img or text logo--><img src="img/logo2.png" alt="" class="logo"></a>
        </div>
        <div class="collapse navbar-collapse navbar-main-collapse">
          <ul class="nav navbar-nav navbar-left">
            <li class="hidden"><a href="#page-top"></a></li>
            <li><a href="/">首頁<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            <li><a href=#>關於三三<i class="fa fa-angle-down"></i><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="about.php">三三團隊</a></li>
                <li><a href="faq.php">顧客問答</a></li>
                <li><a href="contact.php">聯絡我們</a></li>
              </ul>
            </li>
            <li><a href="product.php">產品故事<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            <li><a href="service.php">如何購皂<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            <li><a href="../message/message.php">希望留心語<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            <?
            session_start();
            $CUSIDT = $_SESSION['CUSIDT'];
            if($CUSIDT == 'A'){
              ?>
              <li><a href="#">管理平台<i class="fa fa-angle-down"></i><span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="../methods/Update_Manager.php">權限管理</a></li>
                  <li><a href="../methods/Update_ITEMMAS.php">商品管理</a></li>
                  <li><a href="../methods/Update_ORDMAS.php">訂單管理</a></li>
                  <li><a href="../methods/Update_DCTMAS.php">折扣管理</a></li>
                  <li><a href="../methods/Update_MSGMAS.php">留心語管理</a></li>
                  <li><a href="../methods/View_CUSMAS.php">查看客戶</a></li>
                  <li><a href="../methods/Create_ORDMAS1.php">建立訂單</a></li>
                </ul>
              </li>
              <li><a href="#">會員中心/登出<i class="fa fa-angle-down"></i><span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="../methods/View_ORDMAS.php">查看訂單</a></li>
                  <li><a href="../methods/Update_CUSMAS.php">修改資料</a></li>
                  <li><a href="../methods/User_ChangePW.php">修改密碼</a></li>
                  <li><a href="../methods/View_Purchase.php">購物車內容</a></li>
                  <li><a href="../methods/User_logout.php">登出</a></li>
                </ul>
              </li>
              <?
            }
            elseif($CUSIDT == 'B'){
              ?>
              <li><a href="#">會員中心/登出<i class="fa fa-angle-down"></i><span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="../methods/View_ORDMAS.php">查看訂單</a></li>
                  <li><a href="../methods/Update_CUSMAS.php">修改資料</a></li>
                  <li><a href="../methods/User_ChangePW.php">修改密碼</a></li>
                  <li><a href="../methods/View_Purchase.php">購物車內容</a></li>
                  <li><a href="../methods/User_logout.php">登出</a></li>
                </ul>
              </li>
              <?
            }
            else{
              ?>
              <li><a href="#">註冊/登入<i class="fa fa-angle-down"></i><span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="../methods/Create_CUSMAS.php">註冊</a></li>
                  <li><a href="../methods/User_login.php">登入</a></li>
                </ul>
              </li>
              <?
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header-->
    <header data-background="img/product/detail/series.jpg" class="intro introhalf">
      <!-- Intro Header-->
      <div class="intro-body">
        <h1>商品一覽</h1>
        <h4>禮盒</h4>
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
                <div class="item active"><img src="img/product/detail/taitung_small.jpg" alt=""></div>
                <div class="item"><img src="img/product/detail/taitung_green.jpg" alt=""></div>
              </div>
              <!-- Controls-->
              <a href="#carousel-shop" data-slide="prev" class="left carousel-control"><span class="icon-prev"></span></a><a href="#carousel-shop" data-slide="next" class="right carousel-control"><span class="icon-next"></span></a>
            </div>
            <div class="col-lg-6 slide">
              <h4>三三臺東意象禮盒組</h4>
              <p class="small">REF. 9583301-234</p>
              <p>三三吾鄉，我們的共同原鄉，來自台東最純淨的唯一。
              清風徐過的稻田、翠綠飽滿的釋迦、嬌豔暖橘的金針，融合當地的憨兒手作，三種特色，造就臺東意象禮盒組的經典</p>
              <!-- Indicators-->
              <ol class="carousel-indicators mCustomScrollbar">
                <li data-target="#carousel-shop" data-slide-to="0" class="active"><img src="img/product/detail/taitung_small.jpg" alt=""></li>
                <li data-target="#carousel-shop" data-slide-to="1"><img src="img/product/detail/taitung_green.jpg" alt=""></li>
              </ol>
              <hr>
              <p>禮盒內含 / 金絲森林渲染皂一顆 釋迦手感果力皂一顆 田靜山巒禾風皂一顆</p>
              <p>（照片形象擺設僅供參考；實品將以三三獨家設計禮盒包裝）</p>
              <form class="form-inline" method="post" action="../methods/Purchase_finish.php">
                <div class="form-group">
                  <h2 class="no-pad">$900</h2>
                </div>
                <div class="form-group">
                  <label for="number"></label>
                  <input id="number" type="number" name="ORDAMT" value="1" max="50" min="1" class="form-control">
                  <input type="hidden" name="ITEMNO" value="4">
                </div>
                <button type="submit" class="btn btn-dark">加入購物車</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Footer Section-->
    <section class="footer bg-gray">
      <div class="container">
        <div class="row">
          
        </div>
  
        <div class="row">
          <div class="col-md-4">
            <ul class="list-inline">
              <li><a href="https://www.facebook.com/trisoap/?fref=ts"><i class="fa fa-facebook fa-fw fa-lg"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter fa-fw fa-lg"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus fa-fw fa-lg"></i></a></li>
              <li><a href="contact.php"><i class="fa fa-envelope fa-fw fa-lg"></i></a></li>
            </ul>
          </div>
          
          <div class="col-md-3">
            <p class="small">&copy;2016 TriSoap All Rights Reserved</p>
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
