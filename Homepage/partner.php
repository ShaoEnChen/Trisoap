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
		<title>合作夥伴｜三三吾鄉手工皂Trisoap</title>
		<meta name="description" content="三三吾鄉一路走來擁有許多合作夥伴，不論是協助的在地社福，或是合作的在地小農，我們都利用品牌聯名的方式，共同曝光，想瞭解更多歡迎點入瞭解。">
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
		<header data-background="img/jumbotrons/cooperate.png" class="intro introhalf" id="intro-product">
			<!-- Intro Header-->
			<div class="intro-body">
				<h1>合作夥伴</h1>
			</div>
		</header>

		<!-- Buttons-->
	    <section id="partner">
	      	<div class="container">
		        <div class="row wow fadeIn">
		        	<div class="col-md-8 col-md-offset-2">
		            	<div id="accordion" role="tablist" aria-multiselectable="true" class="panel-group">
							<div class="panel panel-default">
		                		<div id="layer1Heading_1" role="tab" class="panel-heading">
		                			<a role="button" data-toggle="collapse" data-parent="#accordion" href="#layer1Collapse_1" aria-expanded="true" aria-controls="layer1Collapse_1">
		                 				<h4 class="panel-title">臺東</h4>
		                  			</a>
		                		</div>
		                		<div id="layer1Collapse_1" role="tabpanel" aria-labelledby="layer1Heading_1" class="panel-collapse collapse in">
		                			<div class="panel-body">
										<div class="panel panel-default">
											<div id="layer2Heading_1" role="tab" class="panel-heading">
												<a role="button" data-toggle="collapse" data-parent="layer1Heading_1" href="#layer2Collapse_1" aria-expanded="true" aria-controls="layer2Collapse_1">
								  					<h4 class="panel-title">李勝賢文教基金會</h4>
												</a>
											</div>
											<div id="layer2Collapse_1" role="tabpanel" aria-labelledby="layer2Heading_1" class="panel-collapse collapse">
												<div class="panel-body">
													<h4>
														<a href="http://www.shanhsien.org.tw/">
															<img class="partner-logo" src="img/partner/lee.png" alt="">
														</a>
														李勝賢文教基金會
													</h4>
													<p>
														李勝賢文教基金會位於台東市區，是以服務憨兒為主的小型作業所，開辦愛心二手商店以及手工皂製作已有數年之久。裡頭的憨兒各個是作皂好手，只要提及作皂他們便展現優於一般人的專注力與專業程度。作皂不只為了成品，更在於每個憨兒在做好皂後的自信笑容。三三台東意象的每樣產品，在經過數個月的技術移轉與培訓後成功開發，每一顆手工皂，都是來自憨兒們歡笑天堂的純淨手作。
													</p>
													<a href="http://www.shanhsien.org.tw/" target="_blank" role="button" class="btn">
														暸解更多
														<i class="fa fa-angle-right"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="panel panel-default">
											<div id="layer2Heading_2" role="tab" class="panel-heading">
												<a role="button" data-toggle="collapse" data-parent="layer1Heading_1" href="#layer2Collapse_2" aria-expanded="true" aria-controls="layer2Collapse_2">
								  					<h4 class="panel-title">小農食在</h4>
												</a>
											</div>
											<div id="layer2Collapse_2" role="tabpanel" aria-labelledby="layer2Heading_2" class="panel-collapse collapse">
												<div class="panel-body">
													<h4>
														<a href="https://www.facebook.com/pinganmipu/">
															<img class="partner-logo" src="img/partner/tsiao.png" alt="">
														</a>
														小農食在
													</h4>
													<p>
														金絲森林渲染皂當中的金針，乃是由「小農食在」所提供。小農食在的金針花田，有別於一般種植於高山上，而是在台東縣池上鄉的平地栽培，因此在非高山金針產季時，也能夠提供最新鮮的金針花。
														市面上的金針花的加工品，為保有其鮮豔色澤與延長保存期間，經常添加二氧化硫，使含硫量超標，這些含硫金針，亦稱為「紅針、有毒金針」。而小農食在在製作過程中，完全不添加亞硫酸及其他添加物，是用於製作肥皂最好、安心的無硫金針。
													</p>
													<a href="https://www.facebook.com/pinganmipu/" target="_blank" role="button" class="btn">
														暸解更多
														<i class="fa fa-angle-right"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="panel panel-default">
											<div id="layer2Heading_3" role="tab" class="panel-heading">
												<a role="button" data-toggle="collapse" data-parent="layer1Heading_1" href="#layer2Collapse_3" aria-expanded="true" aria-controls="layer2Collapse_3">
								  					<h4 class="panel-title">高家米倉</h4>
												</a>
											</div>
											<div id="layer2Collapse_3" role="tabpanel" aria-labelledby="layer2Heading_3" class="panel-collapse collapse">
												<div class="panel-body">
													<h4>
														高家米倉
													</h4>
													<p>
														田靜山巒禾風皂，其中的米糠乃是由台東池上的「高家米倉」合作提供。產量不到全台灣1%極為珍貴的高家米倉池上米，位於花東縱谷制高點的池上鄉，擁有肥沃土壤及清澈水質，在零工業污染的潔淨環境孕育出的高品質稻米，是我們的首選素材。
														從嚴謹的檢驗過程、精密的倉儲量控管、不定期的抽查及農藥殘毒檢驗，對於每項品質把關程序都不馬虎，這是高媽媽對池上米栽培發展的堅持，也是我們選擇高家米倉池上米的信念。
													</p>
													<a href="http://atp.cs.gov.tw/rplace.php" target="_blank" role="button" class="btn">
														暸解更多
														<i class="fa fa-angle-right"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="panel panel-default">
											<div id="layer2Heading_4" role="tab" class="panel-heading">
												<a role="button" data-toggle="collapse" data-parent="layer1Heading_1" href="#layer2Collapse_4" aria-expanded="true" aria-controls="layer2Collapse_4">
								  					<h4 class="panel-title">臺東自然主義</h4>
												</a>
											</div>
											<div id="layer2Collapse_4" role="tabpanel" aria-labelledby="layer2Heading_4" class="panel-collapse collapse">
												<div class="panel-body">
													<h4>
														自然主義
													</h4>
													<p>
														臺東自然主義 –- 台東自然農法的幕後推手。
														三三洛神紅麴皂絲，乃是採用台東自然主義友善耕種乾燥過後的洛神花。臺東自然主義經營人呂宏文，從耕種開始並秉持著自然友善以及追求一種對大地自然循環的尊重，不施藥與化肥的堅持，並且擔任推廣臺東友善耕種「共好」的概念，希望更多農友加入自然主義的概念同行。
													</p>
													<a href="https://www.facebook.com/maturalism/" target="_blank" role="button" class="btn">
														暸解更多
														<i class="fa fa-angle-right"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="panel panel-default">
											<div id="layer2Heading_5" role="tab" class="panel-heading">
												<a role="button" data-toggle="collapse" data-parent="layer1Heading_1" href="#layer2Collapse_5" aria-expanded="true" aria-controls="layer2Collapse_5">
								  					<h4 class="panel-title">臺東薑黃伯</h4>
												</a>
											</div>
											<div id="layer2Collapse_5" role="tabpanel" aria-labelledby="layer2Heading_5" class="panel-collapse collapse">
												<div class="panel-body">
													<h4>
														<a href="http://www.tailosan.com/">
															<img class="partner-logo" src="img/partner/jiang.png" alt="">
														</a>
														臺東薑黃伯
													<p>
														臺東薑黃伯 – 台東樂山的薑黃淨土。
														臺東薑黃樂山野菜香草園，園區座落於台灣最後一塊淨土，其中含有多項礦物質又受太平洋水氣影響，成為種植的良好場所。臺東薑黃伯園區經過20年的耕耘，堅持無施灑農藥，以最優質的束骨秋鬱金為主，強調「純淨、優質、安心」，經過多項有機認證測驗通過，堅持帶給你最好的薑黃農產。
													</p>
													<a href="http://www.tailosan.com/" target="_blank" role="button" class="btn">
														暸解更多
														<i class="fa fa-angle-right"></i>
													</a>
												</div>
											</div>
										</div>
										<div class="panel panel-default">
											<div id="layer2Heading_6" role="tab" class="panel-heading">
												<a role="button" data-toggle="collapse" data-parent="layer1Heading_1" href="#layer2Collapse_6" aria-expanded="true" aria-controls="layer2Collapse_6">
								  					<h4 class="panel-title">釋迦小羊牧場</h4>
												</a>
											</div>
											<div id="layer2Collapse_6" role="tabpanel" aria-labelledby="layer2Heading_6" class="panel-collapse collapse">
												<div class="panel-body">
													<h4>
														<a href="https://www.facebook.com/taimalicustardapple/">
															<img class="partner-logo" src="img/partner/shaka.png" alt="">
														</a>
														釋迦小羊牧場
													</h4>
													<p>
														釋迦小羊牧場 － 青綠糖蘋果的純真天堂。

														座落太麻里的「釋迦小羊牧場」。牧場在向陽面陽光充足的情況下，搭配上山泉水的灌溉，產出的台東二號釋迦碩大又飽滿。堅持產地自銷，從施肥、剪枝、開花、授粉、疏果、除草、套袋，親手處理每一個從小羊牧場產出的釋迦；對於各種細節的注重，以及對於果實品質安全的堅持，都可看出負責人陳志韋的認真和堅毅。
														高溫後的降雨容易使釋迦產生裂果，裂果賣相不佳，常是小農的困擾。三三向釋迦小羊牧場合作購買部分裂果，純手工取出果泥、果皮與果沙整顆果實充分利用，製作成三三臺東意象的原料之一。「裂果的釋迦，像是在開懷大笑的小羊。」
													</p>
													<a href="https://www.facebook.com/taimalicustardapple/" target="_blank" role="button" class="btn">
														暸解更多
														<i class="fa fa-angle-right"></i>
													</a>
												</div>
											</div>
										</div>
		                  			</div>
	                  			</div>
							</div>
							<!-- <div class="panel panel-default">
								<div id="layer1Heading_2" role="tab" class="panel-heading">
									<a role="button" data-toggle="collapse" data-parent="#accordion" href="#layer1Collapse_2" aria-expanded="true" aria-controls="layer1Collapse_2">
										<h4 class="panel-title">花蓮</h4>
									</a>
								</div>
								<div id="layer1Collapse_2" role="tabpanel" aria-labelledby="layer1Heading_2" class="panel-collapse collapse">
									<div class="panel-body">
									啊啊啊啊啊
									</div>
								</div>
							</div> -->
							<!-- <div class="panel panel-default">
								<div id="layer1Heading_3" role="tab" class="panel-heading">
									<a role="button" data-toggle="collapse" data-parent="#accordion" href="#layer1Collapse_3" aria-expanded="true" aria-controls="layer1Collapse_3">
										<h4 class="panel-title">宜蘭</h4>
									</a>
								</div>
								<div id="layer1Collapse_3" role="tabpanel" aria-labelledby="layer1Heading_3" class="panel-collapse collapse">
									<div class="panel-body">
									啊啊啊啊啊
									</div>
								</div>
							</div> -->
							<!-- <div class="panel panel-default">
								<div id="layer1Heading_4" role="tab" class="panel-heading">
									<a role="button" data-toggle="collapse" data-parent="#accordion" href="#layer1Collapse_4" aria-expanded="true" aria-controls="layer1Collapse_4">
										<h4 class="panel-title">台北</h4>
									</a>
								</div>
								<div id="layer1Collapse_4" role="tabpanel" aria-labelledby="layer1Heading_4" class="panel-collapse collapse">
									<div class="panel-body">
									啊啊啊啊啊
									</div>
								</div>
							</div> -->
						</div>
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