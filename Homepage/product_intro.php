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
		<title>三三堅持｜三三吾鄉手工皂Trisoap</title>
		<meta name="description" content="三三吾鄉手工皂，堅持品質最高的「冷製」作法。「冷製手工皂」是使用純天然的基底植物油進行皂化，再經過攪拌、保溫、晾皂等精細製程，而後打皂出一個個具有不同皂性的產品。">
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
		<header data-background="img/jumbotrons/product_intro.png" class="intro introhalf" id="intro-product">
			<!-- Intro Header-->
			<div class="intro-body">
				<h1>三三堅持</h1>
			</div>
		</header>

		<section id="product-intro" class="bg-white">
			<div class="container">
				<h3 class="text-center">三三堅持</h3>
				<div>
					<div class="content">
						<img src="img/product/intro/cold.png" alt="手皂製法，堅持冷製">
					</div>
					<div class="content content-text clear">
						<h4 class="text-center">手皂製法，堅持冷製</h4>
						<p>
							三三吾鄉手工皂，堅持品質最高的「冷製」作法。「冷製手工皂」是使用純天然的基底植物油進行皂化，再經過攪拌、保溫、晾皂等精細製程，而後打皂出一個個具有不同皂性的產品。有別於一般大型賣場，或各式藥妝開架式商店所販售的工廠壓製肥皂或沐浴精（其中多為石油裂解而成的產物），冷製手工皂製作過程中無任何化學添加，堅持33天以上的晾皂期，才能帶給你最天然的清潔享受。
						</p>
					</div>
				</div>
				<div>
					<div class="content content-text">
						<h4 class="text-center">油品來源，天然安心</h4>
						<p>
							油品，是製作手工皂的原料關鍵主角；不同的配方比例，造就了不同手工皂滋潤或清爽的特性。三三吾鄉手工皂，身為創新的公益手工皂品牌，油品的品質與安全，也是我們的重要堅持。我們與的油品進貨管道，來自從研發階段就是好夥伴的 <a href="http://red271.redmedia.com.tw/front/bin/home.phtml">誠香集</a>，無論是乳油木果脂、橄欖油、棕櫚油......，每一滴，都是經過手工皂專業老師核可的安心原料。日後，我們也將爭取各項油品認證，給您更安心的來源資訊，敬請安心使用！
						</p>
					</div>
					<div class="content clear">
						<img src="img/product/intro/oil.png" alt="油品來源，天然安心">
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