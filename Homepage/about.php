<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/misc/favicon.png">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>三三社企-關於三三</title>
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
            <li><a href="index.php">首頁<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            <li><a href=#>關於三三<i class="fa fa-angle-down"></i><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="about.php">三三團隊</a></li>
                <li><a href="faq.php">顧客問答</a></li>
                <li><a href="contact.php">聯絡我們</a></li>
              </ul>
            </li>
            <li><a href="product.php">產品故事<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            <li><a href="service.php">如何購皂<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            <li><a href="#" onClick="closed()">希望留心語<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
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
    <header data-background="img/jumbotrons/about.png" class="intro introhalf">
      <!-- Intro Header-->
      <div class="intro-body">
        <h1>關於我們</h1>

      </div>
    </header>
    <!-- About Section-->
    <section id="about">
      <div class="container wow fadeIn">
        <div class="row">
          <div class="col-lg-6">
            <h3>理念</h3>
            <p class="no-pad">我們是三個因憨兒的笑容而聚在一起的台大學生，2015年，我們在台新的公益與社會企業競賽獲得優勝，從此展開了為期一年的籌備。
            你是不是也曾經懷疑過社福團體作出來的產品是否會有危險或是不敢使用，甚至認為產品品質低落，而默默在心中期望社福團體商品的品質能夠提升呢？
            為了解決社福團體在技術、人力、品牌行銷與通路上的問題，我們決定以社會企業的方式，結合台東在地小農與憨兒的手作，打造全新的合作模式，創建「台東意象」系列商品。<br>
            我們堅持天然，
            因為那是大自然最真實的純淨。<br>
            我們堅持手作，
            因為那是帶給憨兒自信的泉源。<br>
            我們堅持三三，
            因為三三不只是個故事，更是種生活的態度。</p>
            <h2 class="classic">Trisoap</h2>
          </div>
          <div class="col-lg-5 col-lg-offset-1 text-center">
            <h3>&nbsp;</h3>
            <div data-value="0.999" class="circle"><span></span>
              <div class="agenda">公益</div>
            </div>
            <div data-value="0.999" class="circle"><span></span>
              <div class="agenda">企業</div>
            </div>
            <div data-value="0.999" class="circle"><span></span>
              <div class="agenda">目標</div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Team Section-->
    <section id="team" class="bg-white text-center">
      <div class="container">
        <h3>團隊</h3>
        <div class="row">
          <p>幾個平凡的大學生，在因緣際會下，因為憨兒們的笑容而相聚，為了再次看到那溫暖的笑容因此以社會企業的形式來串連社福團體與當地小農兩方，靠著三方協力一起朝同一目標與夢想前進。</p>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-6">
            <h4>尹又令 Pusher</h4>
            <p>國立臺灣大學社會工作學系</p>
            <p><img src="img/photo1.png" alt="" class="img-responsive center-block"></p>
            <p>討厭歧視，討厭壓迫，或許我們未來都可以做一個夢，為了做一個沒有歧視的夢而努力。
            社工系相關領域，2015年因為認知到社福團體需要解決的問題而成為三三的創辦人之一，
            在三三中扮演研發與社福小農之間的串聯者，在跟小農洽談的時候愛上了臺東。
            在三三草創的時期也經歷過許多挫折，但因為接受到一次嚴重地對憨兒的歧視，燃起了想要推動三三的信念，
            「三三不僅是一個品牌，更是改變社會的一個生活態度。」
            </p>
            <ul class="list-inline">
              <li><a href="https://www.facebook.com/profile.php?id=100000281748300&fref=ts" target="_blank"><i class="fa fa-facebook fa-2x fa-fw"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter fa-2x fa-fw"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus fa-2x fa-fw"></i></a></li>
            </ul>
            <h5>C.E.O</h5>
          </div>
          <div class="col-md-4 col-sm-6">
            <h4>王郁仁</h4>
            <p>國立臺灣大學工商管理學系</p>
            <p><img src="img/photo2.png" alt="" class="img-responsive center-block"></p>
            <p>來自台中的大孩子，<br>
            對世界有永無止境的好奇心，<br>
            把生活當作田野，<br>
            把日常視為創新的根源。<br>
            我們會一天一天長大，外表逐漸成熟，<br>
            但內心卻得時時提醒自己<br>
            要保有小時候的那種想像力與創造力。<br>
            </p>
            <ul class="list-inline">
              <li><a href="https://www.facebook.com/jason.wang.315213?fref=ts" target="_blank"><i class="fa fa-facebook fa-2x fa-fw"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter fa-2x fa-fw"></i></a></li>
              <li><a href="#"><i class="fa fa-youtube fa-2x fa-fw"></i></a></li>
            </ul>
            <h5>C.O.O</h5>
          </div>
          <div class="col-md-4 col-sm-6">
            <h4>陳雨彤 Maggy Chen</h4>
            <p>國立臺灣大學國際企業學系</p>
            <p><img src="img/photo3.png" alt="" class="img-responsive center-block"></p>
            <p>期許自己結合愛心與能力，<br>
            一步一腳印，踏實地朝社會企業的夢想邁進。<br>
            Motto: Be the change that you wish to see in the world.<br>
            喜歡，回歸純淨自然的心生活；<br>
            希望，與世界分享幸福與微笑；<br>
            夢想，在三三彩繪吾鄉的美好！<br>
            </p>
            <ul class="list-inline">
              <li><a href="https://www.facebook.com/maggy.chen?fref=ts" target="_blank"><i class="fa fa-facebook fa-2x fa-fw"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter fa-2x fa-fw"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram fa-2x fa-fw"></i></a></li>
            </ul>
            <h5>C.M.O</h5>
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
              <li><a href="https://www.facebook.com/trisoap/?fref=ts"><i class="fa fa-facebook fa-fw fa-lg"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter fa-fw fa-lg"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus fa-fw fa-lg"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin fa-fw fa-lg"></i></a></li>
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