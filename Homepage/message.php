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
		<header data-background="img/jumbotrons/message.png" class="intro introhalf" id="intro-product">
			<!-- Intro Header-->
			<div class="intro-body">
				<h1>希望留心語</h1>
				<h4>讓憨兒們收到您的心聲</h4>
				<a href="../methods/Create_MSGMAS.php" role="button" class="btn">上傳心語</a>
			</div>
		</header>

		<section>
			<div class="container">
				<h3>活動辦法</h3>
				<h5>
					活動時間：
				</h5>
				<p>
					105年6月13日起至12月13日
				</p>
				<h5>
					活動方式：
				</h5>
				<p>
					將您想對憨兒說的話、相片、影片上傳到希望留心語，經審核通過就可獲得商品折扣、禮盒等豐富大獎！<br>同時您的留言也將公布在希望留心語首頁，讓憨兒們收到您的心聲！
				</p>
			</div>

			<div class="container choices">
				<h4>精采選集</h4>
				<div>
					<ul>
					<?php
					$query = "SELECT * FROM MSGMAS WHERE ACTCODE = 1"; # AND MSGSTAT = 'E'";
					$results = mysql_query($query);
					$msg_num = mysql_num_rows($results);
					if($msg_num) {
						for($i = 0; $i < $msg_num; $i++) {
							$result = mysql_fetch_array($results);
							// text only
							if($result['MSGPHOTO'] == 0 && $result['MSGVIDEO'] == 0) {
					?>
						<li>
							<div class="choice">
								<p class="msg-text"><?php echo $result['MSGTXT']; ?></p>
								<p class="author"> -
									<?php
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
						</li>
						<?php
							}
							else {
								$msgno = $result['MSGNO'];
								if($result['MSGPHOTO'] == 1) {
							?>
						<li>
							<div class="choice choice-photo">
								<img src="picture/<?php echo $msgno; ?>.png">
								<div class="desc">
									<p>
										<?php echo $result['MSGTXT']; ?>
									</p>
								</div>
								<p class="author"> -
									<?php
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
						</li>
							<?php
								}
								if($result['MSGVIDEO'] == 1) {
							?>
						<li>
							<div class="choice choice-video">
								<!-- video here -->
								<video controls>
									<source type="video/mp4" src="video/<?php echo $msgno; ?>.mp4"></iframe>
								</video>
								<div class="desc"><?php echo $result['MSGTXT']; ?></div>
								<p class="author"> -
									<?php
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
						</li>
							<?php
								}
							}
						}
					}
					else {
					?>
						<li>
							<p class="alarm-no-content">暫無內容！</p>
						</li>
					<?php
					}
					?>
					</ul>
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