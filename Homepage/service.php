<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/misc/favicon.png">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>三三社企-如何購皂
    </title>
    <!-- Bootstrap Core CSS-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS-->
    <link href="css/trisoap.css" rel="stylesheet">
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
            <!-- Img or text logo--><img src="img/logo.png" alt="" class="logo"></a>
        </div>
        <div class="collapse navbar-collapse navbar-main-collapse">
          <ul class="nav navbar-nav navbar-left">
            <li class="hidden"><a href="#page-top"></a></li>
            <li><a href="index.php">首頁<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            <li><a href="about.php">關於三三<i class="fa fa-angle-down"></i><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="faq.php">顧客問答</a></li>
                <li><a href="contact.php">聯絡我們</a></li>
              </ul>
            </li>
            <li><a href="product.php">產品故事<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            <li><a href="service.php">如何購皂<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            <li><a href="message/message.html">希望留心語<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            <?
            session_start();
            $CUSIDT = $_SESSION['CUSIDT'];
            if($CUSIDT == 'A'){
              ?>
              <li><a href="#">管理平台<i class="fa fa-angle-down"></i><span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="../manager/Update_Manager.php">權限管理</a></li>
                  <li><a href="../methods/Update_ITEMMAS.php">商品管理</a></li>
                  <li><a href="../methods/Update_ORDMAS.php">訂單管理</a></li>
                  <li><a href="#">留心語管理</a></li>
                </ul>
              </li>
              <li><a href="#">會員中心/登出<i class="fa fa-angle-down"></i><span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">查看訂單</a></li>
                  <li><a href="../methods/Update_CUSMAS1.php">修改資料</a></li>
                  <li><a href="../methods/User_ChangePW1.php">修改密碼</a></li>
                  <li><a href="../methods/Order_Confirm.php">購物車內容</a></li>
                  <li><a href="../methods/User_logout.php">登出</a></li>
                </ul>
              </li>
              <?
            }
            elseif($CUSIDT == 'B'){
              ?>
              <li><a href="#">會員中心/登出<i class="fa fa-angle-down"></i><span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">查看訂單</a></li>
                  <li><a href="../methods/Update_CUSMAS1.php">修改資料</a></li>
                  <li><a href="../methods/User_ChangePW1.php">修改密碼</a></li>
                  <li><a href="../methods/Order_Confirm.php">購物車內容</a></li>
                  <li><a href="../methods/User_logout.php">登出</a></li>
                </ul>
              </li>
              <?
            }
            else{
              ?>
              <li><a href="#">註冊/登入<i class="fa fa-angle-down"></i><span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="../methods/Create_CUSMAS1.php">註冊</a></li>
                  <li><a href="../methods/User_login1.php">登入</a></li>
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
    <header data-background="img/header/17.jpg" class="intro introhalf">
      <!-- Intro Header-->
      <div class="intro-body">
        <h1>如何購皂</h1>

      </div>
    </header>
    <!-- Services Section-->
    <section id="services">
      <div class="container text-center">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <h3>邀請三三擁者們，購皂響應，親身感受</h3>
            <p>虛擬通路</p>
            <a href="https://tw.carousell.com/trisoap/ SOLDA">Carousell 旋轉拍賣 / </a>
            <a href="https://solda.io/trisoap Ruten">手打拍賣 / </a>
            <a href="http://class.ruten.com.tw/user/index00.php?s=trisoap2015 ">露天拍賣</a>
          </div>
        </div>
        
      </div>
    </section>
   
    <!-- Action Section-->
    <div class="section action section-small bg-gray2">
      <div class="container wow fadeIn">
        <div class="row">
          <div class="col-md-8">
            <h3 class="no-pad">誠摯邀請您，輕鬆填寫連結表單，免費試用，體驗天然純淨的洗感，加入三三擁者的行列！ </h3>
          </div>
          <div class="col-md-4"><a href="https://trisoap.typeform.com/to/voNGpg" class="btn btn-dark">免費試用 </a></div>
        </div>
      </div>
    </div>
    <!-- Footer Section-->
    <section class="footer bg-gray">
      <div class="container">
        <div class="row">
       
        <div class="row">
          <div class="col-md-4">
            <ul class="list-inline">
              <li><a href="/"><i class="fa fa-twitter fa-fw fa-lg"></i></a></li>
              <li><a href="/"><i class="fa fa-facebook fa-fw fa-lg"></i></a></li>
              <li><a href="/"><i class="fa fa-google-plus fa-fw fa-lg"></i></a></li>
              <li><a href="/"><i class="fa fa-linkedin fa-fw fa-lg"></i></a></li>
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