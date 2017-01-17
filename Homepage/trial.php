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
		<title>三三吾鄉手工皂Trisoap</title>
		<!-- Bootstrap Core CSS-->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- FlexSlider CSS -->
    	<link href="../FlexSlider/flexslider.css" rel="stylesheet">
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
		<header data-background="img/jumbotrons/trial.png" class="intro introhalf" id="intro-product">
			<!-- Intro Header-->
			<div class="intro-body">
				<h1>試用品申請</h1>
				<a href="https://trisoap.typeform.com/to/voNGpg" target="_blank" role="button" class="btn">申請試用三三吾鄉皂</a>
			</div>
		</header>

		<section id="trial" class="bg-white text-center">
			<div class="slogan">
				<h3>三三的好品質，讓試用過的人都一致好評！</h3>
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div>
								<p>一些留言1</p>
							</div>
						</li>
						<li>
							<div>
								<p>一些留言一些留言一些留言一些留言一些留言一些留言一些留言一些留言一些留言一些留言一些留言一些留言一些留言一些留言一些留言!2</p>
							</div>
						</li>
						<li>
							<div>
								<p>一些留言3</p>
							</div>
						</li>
						<li>
							<div>
								<p>一些留言4</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<hr class="seperate">
			<div class="slogan">
				<h3>三三捨去大筆金錢買廣告的行銷手法，選擇最貼近客人的試用計畫</h3>
				<p>好皂不怕人試，真正的好品質一洗就知道</p>
			</div>
			<div class="features" id="feature1">
				<div class="container vertical-middle">
					<h3>台東小農素材添加：池上米米糠、池上無硫金針，帶給你豐富體驗</h3>
				</div>
			</div>
			<div class="features" id="feature2">
				<div class="container vertical-middle">
					<h3>天然植物油調和，無毒無化學添加</h3>
				</div>
			</div>
			<div class="features" id="feature3">
				<div class="container vertical-middle">
					<h3>冷製手作堅持超過一個月以上量皂期</h3>
				</div>
			</div>
			<div class="slogan">
				<h3>上百消費者試用好評發售中</h3>
				<a href="https://trisoap.typeform.com/to/voNGpg" target="_blank" role="button" class="btn">立即申請試用</a>
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
		<!-- FlexSlider JS -->
	    <script src="../FlexSlider/jquery.flexslider-min.js"></script>
	    <script src="js/flexslider_message.js"></script>
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</body>
</html>