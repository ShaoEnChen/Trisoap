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
								<a href="/">
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
						<h4>
							文字&nbsp;
							<a href="../methods/Create_MSGMAS.php">
								<i class="fa fa-pencil" aria-hidden="true"></i>
							</a>
						</h4>
						<?php 
						session_start();
						include_once("../methods/Helper/mysql_connect.php");

						$query_msg_text = "SELECT * FROM MSGMAS WHERE MSGPHOTO = 0 AND MSGVIDEO = 0 AND MSGSTAT = 'D' AND ACTCODE = 1";
						$results = mysql_query($query_msg_text);
						$msg_num = mysql_num_rows($results);
						if($msg_num) {
							$per = 3;
							$html_rows_num = ceil($msg_num / $per);

							for($i = 0; $i < $html_rows_num; $i++) {
						?>
								<div class="row">
									<?php 
									for($j = 0; $j < $per; $j++) {
										$result = mysql_fetch_array($results);
										if($result) {
									?>
											<div class="choice col-sm-6 col-md-4">
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
									<?php 
										}
										else {
											break;
										}
									}
									?>
								</div>
							<?php 
							}
						}
						else {
							?>
							<p class="alarm-no-content">暫無內容！</p>
						<?php 
						}
						?>
					</div>
					<div>
						<h4>
							照片&nbsp;
							<a href="../methods/Create_MSGMAS.php">
								<i class="fa fa-camera-retro" aria-hidden="true"></i>
							</a>
						</h4>
						<?php 
						$query_msg_photo = "SELECT * FROM MSGMAS WHERE MSGPHOTO = 1 AND MSGSTAT = 'D' AND ACTCODE = 1";
						$results = mysql_query($query_msg_photo);
						$msg_num = mysql_num_rows($results);
						if($msg_num) {
							$per = 3;
							$html_rows_num = ceil($msg_num / $per);

							for($i = 0; $i < $html_rows_num; $i++) {
						?>
								<div class="row">
									<?php 
									for($j = 0; $j < $per; $j++) {
										$result = mysql_fetch_array($results);
										if($result) {
											$msgno = $result['MSGNO'];
									?>
											<div class="choice choice-photo col-sm-6 col-md-4">
												<img src="picture/<?php  echo $msgno; ?>.png">
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
									<?php 
										}
									}
									?>
								</div>
							<?php 
							}
						}
						else {
							?>
							<p class="alarm-no-content">暫無內容！</p>
						<?php 
						}
						?>
					</div>
					<div>
						<h4>影片&nbsp;
							<a href="../methods/Create_MSGMAS.php">
								<i class="fa fa-play" aria-hidden="true"></i>
							</a>
						</h4>
						<?php 
						$query_msg_video = "SELECT * FROM MSGMAS WHERE MSGVIDEO = 1 AND MSGSTAT = 'D' AND ACTCODE = 1";
						$results = mysql_query($query_msg_video);
						$msg_num = mysql_num_rows($results);
						if($msg_num) {
							$per = 3;
							$html_rows_num = ceil($msg_num / $per);

							for($i = 0; $i < $html_rows_num; $i++) {
						?>
								<div class="row">
									<?php 
									for($j = 0; $j < $per; $j++) {
										$result = mysql_fetch_array($results);
										if($result) {
											$msgno = $result['MSGNO'];
									?>
											<div class="choice choice-video col-sm-6 col-md-4">
												<!-- video here -->
												<video controls>
													<source type="video/mp4" src="video/<?php  echo $msgno; ?>.mp4"></iframe>
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
									<?php 
										}
									}
									?>
								</div>
							<?php 
							}
						}
						else {
							?>
							<p class="alarm-no-content">暫無內容！</p>
						<?php 
						}
						?>
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
						<div class="col-sm-4 contact">
				          	<p>
				          		<a href="../Homepage/contact.php">聯絡我們</a>
				          	</p>
				          	<?php 
				          	include("../methods/Helper/mysql_connect.php");
				            include("../methods/Helper/sql_operation.php");
							$COMTEL = search('COMTEL', 'OWNMAS', 'COMNM', 'Trisoap');
							$COMEMAIL = search('COMEMAIL', 'OWNMAS', 'COMNM', 'Trisoap');
							$COMADD = search('COMADD', 'OWNMAS', 'COMNM', 'Trisoap');
							?>
			            	<p>
			            		<i class="fa fa-phone fa-fw fa-lg"></i> <?php echo $COMTEL;?>
		            		</p>
		            		<p>
								<i class="fa fa-envelope fa-fw fa-lg"></i> <?php echo $COMEMAIL;?>
		            		</p>
		            		<p>
								<i class="fa fa-map-marker fa-fw fa-lg"></i> <?php echo $COMADD;?>
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
	<script src="js/gallery.js"></script>
</html>
