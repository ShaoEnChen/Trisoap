<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/misc/favicon.png">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>三三社企-聯絡我們
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
            <li><a href="../message/Message.html">希望留心語<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            <?
            session_start();
            include("../methods/Helper/mysql_connect.php");
            include("../methods/Helper/sql_operation.php");
            $COMTEL = search('COMTEL', 'OWNMAS', 'COMNM', 'Trisoap');
            $COMEMAIL = search('COMEMAIL', 'OWNMAS', 'COMNM', 'Trisoap');
            $COMADD = search('COMADD', 'OWNMAS', 'COMNM', 'Trisoap');
            $CUSIDT = $_SESSION['CUSIDT'];
            if($CUSIDT == 'A'){
              ?>
              <li><a href="#">管理平台<i class="fa fa-angle-down"></i><span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="../methods/Update_Manager.php">權限管理</a></li>
                  <li><a href="../methods/Update_ITEMMAS.php">商品管理</a></li>
                  <li><a href="../methods/Update_ORDMAS.php">訂單管理</a></li>
                  <li><a href="../methods/Update_MSGMAS.php">留心語管理</a></li>
                </ul>
              </li>
              <li><a href="#">會員中心/登出<i class="fa fa-angle-down"></i><span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="../methods/View_ORDMAS.php">查看訂單</a></li>
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
                  <li><a href="../methods/View_ORDMAS.php">查看訂單</a></li>
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
          </ui>
        </div>
      </div>
    </nav>
    <!-- Header-->
    <header data-background="img/jumbotrons/contact.jpg" class="intro introhalf">
      <!-- Intro Header-->
      <div class="intro-body">
        <h1>聯絡我們</h1>

      </div>
    </header>
    <!-- Contact Section-->
    <section id="contact">
      <div class="container wow fadeIn">
        <div class="row">
          <div class="col-md-8">
            <h2>有話想說</h2>
            <p>對於三三有任何疑惑與意見回饋，或演講合作邀約，都歡迎聯絡我們！</p>
          </div>
         
        </div>
        <div class="row">
          <div class="col-md-8">
            <!-- Map Section-->
            <div id="map"></div>
            <p></p>
          </div>
          <div class="col-md-4">
            <!-- Contact Form - Enter your email address on line 17 of the mail/contact_me.php file to make this form work. For more information on how to do this please visit the Docs!-->
            <form id="contactForm" name="sentMessage" novalidate="">
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label for="name" class="sr-only control-label">name</label>
                  <input id="name" type="text" placeholder="您的姓名" required="" data-validation-required-message="Please enter name" class="form-control input-lg"><span class="help-block text-danger"></span>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label for="email" class="sr-only control-label">email</label>
                  <input id="email" type="email" placeholder="信箱" required="" data-validation-required-message="Please enter email" class="form-control input-lg"><span class="help-block text-danger"></span>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label for="phone" class="sr-only control-label">phone</label>
                  <input id="phone" type="tel" placeholder="電話" required="" data-validation-required-message="Please enter phone number" class="form-control input-lg"><span class="help-block text-danger"></span>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label for="message" class="sr-only control-label">Message</label>
                  <textarea id="message" rows="2" placeholder="訊息" required="" data-validation-required-message="Please enter a message." aria-invalid="false" class="form-control input-lg"></textarea><span class="help-block text-danger"></span>
                </div>
              </div>
              <div id="success"></div>
              <button type="submit" class="btn btn-dark btn-lg">確認送出</button>
            </form>
            <hr>
            <p><i class="fa fa-phone fa-fw fa-lg"></i> <?echo $COMTEL;?> <br>
            <i class="fa fa-envelope fa-fw fa-lg"></i> <?echo $COMEMAIL;?> <br>
            <i class="fa fa-map-marker fa-fw fa-lg"></i> <?echo $COMADD;?>
            </p>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGuJZxSh8-7yols35KtdE21XJI-GBlRGo"></script>
    <script src="js/map.js"></script>
    <!-- Custom Theme JavaScript-->
    <script src="js/pheromone.js"></script>
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </body>
</html>