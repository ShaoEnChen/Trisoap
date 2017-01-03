<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="img/misc/favicon.png">
		<title>三三吾鄉手工皂Trisoap</title>
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
		<header data-background="img/jumbotrons/product_idea.jpg" class="intro introhalf" id="intro-product">
			<!-- Intro Header-->
			<div class="intro-body">
				<h1>媒體報導</h1>
				<h4>一路走來，感謝各家媒體對於三三的支持，每篇報導，都是宣揚三三理念的好夥伴。</h4>
			</div>
		</header>

		<section>
			<div class="container">
				<h3>國內外媒體報導</h3>
		        <div class="row">
		        	<div class="col-xs-12 col-sm-6 col-md-4">
		        		<a href="https://castnet.nctu.edu.tw/castnet/article/9986?issueID=630"><img src="img/media/castnet.png" alt="喀報"></a>
		        	</div>
		        	<div class="col-xs-12 col-sm-6 col-md-4">
		        		<a href="http://www.storm.mg/lifestyle/200500"><img src="img/media/storm.png" alt="風傳媒"></a>
		        	</div>
		        	<div class="col-xs-12 col-sm-6 col-md-4">
		        		<a href="#"><img src="img/media/hakkatv.png" alt="客家電視台"></a>
		        	</div>
		        	<div class="col-xs-12 col-sm-6 col-md-4">
		        		<a href="https://www.peopo.org/news/316929"><img src="img/media/peopo.png" alt="Peopo 公民新聞"></a>
		        	</div>
		        	<div class="col-xs-12 col-sm-6 col-md-4">
		        		<a href="http://www.vita.tw/2016/09/blog-post_5.html"><img src="img/media/vita.png" alt="生命力新聞"></a>
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
		<!-- Custom Theme JavaScript-->
		<script src="js/pheromone.js"></script>
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</body>
</html>