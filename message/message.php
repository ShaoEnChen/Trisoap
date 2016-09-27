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
		<!-- slick css -->
		<link href="slick/slick.css" rel="stylesheet">
		<link href="slick/slick-theme.css" rel="stylesheet">
		<!-- custom css -->
		<link href="css/message.css" rel="stylesheet">
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
									回到首頁
								</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<section class="content">
				<div class="container">
					<div class="row">
						<div class="intro col-sm-6">
							<h1>希望留心語</h1>
							<h3>讓憨兒們收到您的心聲</h3>
							<p>
								活動時間：105年6月13日起至12月13日
							</p>
							<p>
								活動方式：將您想對憨兒說的話、相片、影片上傳到希望留心語，經審核通過就可獲得商品折扣、禮盒等豐富大獎！同時您的留言也將公布在希望留心語首頁，讓憨兒收到您的心聲！
							</p>
						</div>
						<div class="activity-photo col-sm-5 col-sm-offset-1">
							<img src="image/example.png" alt="活動相片">
						</div>
					</div>
					<div class="choices">
						<h4>精采選集</h4>
						<div class="slickshow">
							<?
							session_start();
							include_once("../methods/Helper/mysql_connect.php");

							$query = "SELECT * FROM MSGMAS WHERE ACTCODE = 1";
							$results = mysql_query($query);
							$msg_num = mysql_num_rows($results);
							if($msg_num) {
								for($i = 0; $i < $msg_num; $i++) {
									$result = mysql_fetch_array($results);
									// text only
									if($result['MSGPHOTO'] == 0 && $result['MSGVIDEO'] == 0) {
							?>
										<div class="choice">
											<p class="msg-text"><?echo $result['MSGTXT']; ?></p>
											<p class="author"> -
												<?
													$cus_email = $result['EMAIL'];
													$query_cusnm = "SELECT CUSNM FROM CUSMAS WHERE EMAIL = '$cus_email'";
													$cusnm_result = mysql_query($query_cusnm);
													if($cusnm_result) {
														echo mysql_result($cusnm_result, 0);
													}
													else {
														echo $cus_email;
													}
												?>
											</p>
										</div>
									<?
									}
									else {
										$msgno = $result['MSGNO'];
										if($result['MSGPHOTO'] == 1) {
									?>
											<div class="choice choice-photo">
												<img src="picture/<? echo $msgno; ?>.png">
												<div class="desc">
													<p>
														<?echo $result['MSGTXT']; ?>
													</p>
												</div>
												<p class="author"> -
													<?
														$cus_email = $result['EMAIL'];
														$query_cusnm = "SELECT CUSNM FROM CUSMAS WHERE EMAIL = '$cus_email'";
														$cusnm_result = mysql_query($query_cusnm);
														if($cusnm_result) {
															echo mysql_result($cusnm_result, 0);
														}
														else {
															echo $cus_email;
														}
													?>
												</p>
											</div>
									<?
										}
										if($result['MSGVIDEO'] == 1) {
									?>
											<div class="choice choice-video">
												<!-- video here -->
												<video controls>
													<source type="video/mp4" src="video/<? echo $msgno; ?>.mp4"></iframe>
												</video>
												<div class="desc"><?echo $result['MSGTXT']; ?></div>
												<p class="author"> -
													<?
														$cus_email = $result['EMAIL'];
														$query_cusnm = "SELECT CUSNM FROM CUSMAS WHERE EMAIL = '$cus_email'";
														$cusnm_result = mysql_query($query_cusnm);
														if($cusnm_result) {
															echo mysql_result($cusnm_result, 0);
														}
														else {
															echo $cus_email;
														}
													?>
												</p>
											</div>
							<?
										}
									}
								}
							}
							else {
							?>
								<p class="alarm-no-content">暫無內容！</p>
							<?
							}
							?>
						</div>
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
				          	<p>
				          		<a href="../Homepage/contact.php">聯絡我們</a>
				          	</p>
				          	<?
				          	include("../methods/Helper/mysql_connect.php");
				            include("../methods/Helper/sql_operation.php");
							$COMTEL = search('COMTEL', 'OWNMAS', 'COMNM', 'Trisoap');
							$COMEMAIL = search('COMEMAIL', 'OWNMAS', 'COMNM', 'Trisoap');
							$COMADD = search('COMADD', 'OWNMAS', 'COMNM', 'Trisoap');
							?>
			            	<p>
			            		<i class="fa fa-phone fa-fw fa-lg"></i> <?echo $COMTEL;?> <br>
							</p>
							<p>
								<i class="fa fa-envelope fa-fw fa-lg"></i> <?echo $COMEMAIL;?> <br>
							</p>
							<p>
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
	<!-- slick -->
	<script src="slick/slick.min.js"></script>
	<!-- custom js -->
	<script src="js/message.js"></script>
</html>