<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="image/icon/favicon.png">
		<title>希望留心語</title>
		<meta name="author" content="2016 NTUIM SA GROUP7">
		<meta name="description" content="">
		<!-- bootstrap css -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- custom css -->
		<link href="css/gallery.css" rel="stylesheet">
	</head>
	<body>
		<div>
			<nav class="navbar navbar-fixed-top nav-custom">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" data-toggle="collapse" data-target=".navbar-main-collapse" class="navbar-toggle">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="message.php" class="navbar-brand">
							<img src="image/icon/logo.png" alt="" class="logo">
						</a>
					</div>
					<div class="collapse navbar-collapse navbar-main-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="message.php">
									心語首頁
								</a>
							</li>
							<li>
								<a href="gallery.php">
									精彩畫廊
								</a>
							</li>
							<li>
								<a href="../methods/Create_MSGMAS.php">
									上傳心語
								</a>
							</li>
							<li>
								<a href="../Homepage/index.php">
									回到三三
								</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<section class="content">
				<div class="container">
					<div>
						<h4>文字</h4>
						<div class="row">
							<div class="choice choice-text col-sm-6 col-md-4">
								<p></p>
							</div>
							<div class="choice choice-text col-sm-6 col-md-4">
								<p></p>
							</div>
							<div class="choice choice-text col-sm-6 col-md-4">
								<p></p>
							</div>
						</div>
					</div>
					<div>
						<h4>照片</h4>
						<div class="row">
							<div class="choice choice-photo col-sm-6 col-md-4">
								
							</div>
							<div class="choice choice-photo col-sm-6 col-md-4">
								
							</div>
							<div class="choice choice-photo col-sm-6 col-md-4">
								
							</div>
						</div>
					</div>
					<div>
						<h4>影片</h4>
					</div>
				</div>
			</section>
			<hr>
			<section class="footer">
				<div class="container">
					<div class="row">
						<div class="col-sm-4">
							<ul class="list-inline">
								<li><a href="https://www.facebook.com/trisoap/?fref=ts"><i class="fa fa-facebook fa-fw fa-lg"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter fa-fw fa-lg"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus fa-fw fa-lg"></i></a></li>
								<li><a href="../Homepage/contact.php"><i class="fa fa-envelope fa-fw fa-lg"></i></a></li>
							</ul>
						</div>
						<div class="col-sm-4">
							<p class="small">&copy;2016 TriSoap All Rights Reserved</p>
						</div>
						<div class="col-sm-4">
				          	<a href="../Homepage/contact.php">聯絡我們</a>
				          	<?
				          	include("../methods/Helper/mysql_connect.php");
				            include("../methods/Helper/sql_operation.php");
							$COMTEL = search('COMTEL', 'OWNMAS', 'COMNM', 'Trisoap');
							$COMEMAIL = search('COMEMAIL', 'OWNMAS', 'COMNM', 'Trisoap');
							$COMADD = search('COMADD', 'OWNMAS', 'COMNM', 'Trisoap');
							?>
			            	<p>
			            		<i class="fa fa-phone fa-fw fa-lg"></i> <?echo $COMTEL;?> <br>
								<i class="fa fa-envelope fa-fw fa-lg"></i> <?echo $COMEMAIL;?> <br>
								<i class="fa fa-map-marker fa-fw fa-lg"></i> <?echo $COMADD;?>
			            	</p>
			          	</div>
					</div>
				</div>
			</section>
		</div>
	</body>
	<!-- jquery -->
	<script src="js/jquery-1.12.3.min.js"></script>
	<!-- bootstrap js -->
	<script src="js/bootstrap.min.js"></script>
	<!-- custom js -->
	<script src="js/custom.js"></script>
</html>