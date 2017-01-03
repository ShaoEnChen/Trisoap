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
    <header data-background="img/jumbotrons/contact.jpg" class="intro introhalf" id="intro-contact">
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
            <?php
              include "../methods/Helper/mysql_connect.php";
              include "../methods/Helper/sql_operation.php";
              $COMTEL = search('COMTEL', 'OWNMAS', 'COMNM', 'Trisoap');
              $COMEMAIL = search('COMEMAIL', 'OWNMAS', 'COMNM', 'Trisoap');
              $COMADD = search('COMADD', 'OWNMAS', 'COMNM', 'Trisoap');
            ?>
            <p><i class="fa fa-phone fa-fw fa-lg"></i> <?php echo $COMTEL;?> <br>
            <i class="fa fa-envelope fa-fw fa-lg"></i> <?php echo $COMEMAIL;?> <br>
            <i class="fa fa-map-marker fa-fw fa-lg"></i> <?php echo $COMADD;?>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkgvqaeUhwvRuSvrBjp9OCZOgP2mPGL9M"></script>
    <script src="js/map.js"></script>
    <!-- Custom Theme JavaScript-->
    <script src="js/pheromone.js"></script>
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </body>
</html>
