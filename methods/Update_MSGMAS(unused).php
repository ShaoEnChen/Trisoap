<!DOCTYPE html>
<html lang="zh-Hant-TW">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
		<title>留心語管理</title>
		<meta name="author" content="2016 NTUIM SA GROUP7">
		<meta name="description" content="">
		<!-- bootstrap css -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- custom css -->
		<link href="css/style.css" rel="stylesheet">
	</head>
	<body id="page-top">
		<?php 
		session_start();
		include_once("Helper/mysql_connect.php");
		include_once("Helper/sql_operation.php");
		include_once("Helper/handle_string.php");
		include_once("Helper/redirect.js");
		$EMAIL = $_SESSION['EMAIL'];
		$CUSIDT = $_SESSION['CUSIDT'];
		if($EMAIL == null || $CUSIDT != 'A'){
			?>
			<script>
			redirect("/");
			alert("您無權限觀看此頁面!");
			</script>
			<?php 
		}
		else{
			$queryCUSNM = search('CUSNM', 'CUSMAS', 'EMAIL', $EMAIL);
			?>
			<nav class="navbar navbar-fixed-top nav-custom">
				<div class="container-fluid">
					<div class="navbar-header">
						<a href="#page-top" class="navbar-brand"><img src="image/logo.png" alt="" class="logo"></a>
					</div>
					<div class="collapse navbar-collapse navbar-main-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="/">
									回三三首頁<i class="fa fa-angle-down" aria-hidden="true"></i>
								</a>
							</li>
							<li>
								<a href="#">
									<?php  echo $queryCUSNM."，您好<br>"; ?>
								</a>
							</li>
							<li>
								<a href="User_logout.php">
									登出<i class="fa fa-angle-down" aria-hidden="true"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>

			<section>
	            <div class="orders">
	                <form name="form" method="post" action="Update_MSGMAS.php">
	                    搜尋依據：<select name="keytype" />
	                    <option value=""></option>
	                    <option value="ORDNO">留心語編號</option>
	                    <option value="EMAIL">顧客信箱</option>
	                    </select>
	                    搜尋關鍵：<input type="text" name="keyvalue" /> <br>
	                    <input type="submit" name="button" class="btn btn-dark" value="確定" />
	                </form>
	            </div>
	        </section>

			<section>
				<div class="container">
					<h2>留心語管理</h2>
					<div class="manage">
						<div class="row">
							<div class="hidden-xs col-sm-8 col-md-6" id="pills">
								<ul class="nav nav-pills">
									<li class="active"><a data-toggle="pill" href="#ALL">全部</a></li>
									<li><a data-toggle="pill" href="#A">已送出</a></li>
									<li><a data-toggle="pill" href="#B">已通過</a></li>
									<li><a data-toggle="pill" href="#C">未通過</a></li>
									<li><a data-toggle="pill" href="#D">公開中</a></li>
									<li><a data-toggle="pill" href="#E">典藏</a></li>
								</ul>
							</div>
						</div>
						<div class="row table-responsive">
							<div class="tab-content">
							<?php 
							$keytype = input('keytype');
	                        $keyvalue = input('keyvalue');
	                        for($i = 0; $i < 6; $i++){
								switch($i){
									// 全部
									case 0:
										if($keytype == null)
			                                $queryMSGMAS = "SELECT * FROM MSGMAS WHERE ACTCODE=1";
			                            else
			                                $queryMSGMAS = "SELECT * FROM MSGMAS WHERE ACTCODE=1 AND $keytype = '$keyvalue'";
										?>
										<div id="ALL" class="tab-pane fade in active">
										<?php  break;
									// 已送出
									case 1:
										if($keytype == null)
			                                $queryMSGMAS = "SELECT * FROM MSGMAS WHERE ACTCODE=1 AND MSGSTAT = 'A'";
			                            else
			                                $queryMSGMAS = "SELECT * FROM MSGMAS WHERE ACTCODE=1 AND $keytype = '$keyvalue' AND MSGSTAT = 'A'";
										?>
										<div id="A" class="tab-pane fade">
										<?php  break;
									// 已通過
									case 2:
										if($keytype == null)
			                                $queryMSGMAS = "SELECT * FROM MSGMAS WHERE ACTCODE=1 AND MSGSTAT = 'B'";
			                            else
			                                $queryMSGMAS = "SELECT * FROM MSGMAS WHERE ACTCODE=1 AND $keytype = '$keyvalue' AND MSGSTAT = 'B'";
										?>
										<div id="B" class="tab-pane fade">
										<?php  break;
									// 未通過
									case 3:
										if($keytype == null)
			                                $queryMSGMAS = "SELECT * FROM MSGMAS WHERE ACTCODE=1 AND MSGSTAT = 'C'";
			                            else
			                                $queryMSGMAS = "SELECT * FROM MSGMAS WHERE ACTCODE=1 AND $keytype = '$keyvalue' AND MSGSTAT = 'C'";
										?>
										<div id="C" class="tab-pane fade">
										<?php  break;
									// 公開中
									case 4:
										if($keytype == null)
			                                $queryMSGMAS = "SELECT * FROM MSGMAS WHERE ACTCODE=1 AND MSGSTAT = 'D'";
			                            else
			                                $queryMSGMAS = "SELECT * FROM MSGMAS WHERE ACTCODE=1 AND $keytype = '$keyvalue' AND MSGSTAT = 'D'";
										?>
										<div id="D" class="tab-pane fade">
										<?php  break;
									// 典藏
									case 5:
										if($keytype == null)
			                                $queryMSGMAS = "SELECT * FROM MSGMAS WHERE ACTCODE=1 AND MSGSTAT = 'E'";
			                            else
			                                $queryMSGMAS = "SELECT * FROM MSGMAS WHERE ACTCODE=1 AND $keytype = '$keyvalue' AND MSGSTAT = 'E'";
										?>
										<div id="E" class="tab-pane fade">
										<?php  break;
								}
								?>
								<!-- pill content -->
								<table class="table table-hover">
									<thead>
										<tr>
											<td>留言編號</td>
                                            <td>顧客信箱</td>
                                            <td>留言文字</td>
                                            <td>留言照片</td>
                                            <td>留言影片</td>
                                            <td>留言狀態</td>
                                            <td>建立日期</td>
                                            <td>發佈日期</td>
										</tr>
									</thead>
									<tbody>
										<?php 
										$result = mysql_query($queryMSGMAS);
                                        if($result != false){
											while($row = mysql_fetch_array($result)){
												$MSGNO = $row['MSGNO'];
												?>
	                                            <tr>
	                                                <!-- 留言編號 -->
	                                                <td><?php echo $MSGNO;?></td>
	                                                <!-- 顧客信箱 -->
	                                                <td><?php echo $row['EMAIL'];?></td>
	                                                <!-- 留言文字 -->
	                                                <td><?php echo $row['MSGTXT'];?></td>
	                                                <!-- 留言照片 -->
	                                                <td>
	                                                    <?php 
	                                                    if($row['MSGPHOTO'] == '1'){
	                                                        echo "<a target=\"_blank\" href=\"../message/picture/$MSGNO.png\">";
	                                                        echo "<img src=\"../message/picture/$MSGNO.png\" width=\"360\" height=\"270\" />";
	                                                        echo "</a>";
	                                                    }
	                                                    ?>
	                                                </td>
	                                                <!-- 留言影片 -->
	                                                <td>
	                                                    <?php 
	                                                    if($row['MSGVIDEO'] == '1'){
	                                                        echo "<a target=\"_blank\" href=\"../message/video/$MSGNO.mp4\">";
	                                                        echo "<video width=\"360\" height=\"270\" controls>";
	                                                        echo "<source src=\"../message/video/$MSGNO.mp4\" type=\"video/mp4\">";
	                                                        echo "</video>";
	                                                        echo "</a>";
	                                                    }
	                                                    ?>
	                                                </td>
	                                                <!-- 留言狀態 -->
	                                                <td><?php echo $row['MSGSTAT'];?></td>
	                                                <!-- 建立日期 -->
	                                                <td><?php echo $row['CREATEDATE'];?></td>
	                                                <!-- 發佈日期 -->
	                                                <td><?php echo $row['PUBLICDATE'];?></td>
	                                            </tr>
	                                            <?php 
	                                        }
	                                    }
	                                    ?>
									</tbody>
								</table>
								</div>
								<?php 
							}
							?>
							</div>
						</div>
					</div>
				</div>
			</section>
			<?php 
		}
		?>
	</body>
	<!-- jquery -->
	<script src="js/jquery-1.12.3.min.js"></script>
	<!-- bootstrap js -->
	<script src="js/bootstrap.min.js"></script>
	<!-- custom js -->
	<script src="js/trisoap.js"></script>
</html>