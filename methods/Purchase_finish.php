<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Homepages/img/misc/favicon.png">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap Core CSS-->
    <link href="../Homepages/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS-->
    <link href="../Homepages/css/trisoap1.css" rel="stylesheet">
    <!--other pages-->
    <link rel="stylesheet" href="../Homepages/assets/css/main.css">
    <!--end other pages-->

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>加入購物車</title>
  </head>

  <body>
    <!-- <nav class="navbar navbar-custom navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" data-toggle="collapse" data-target=".navbar-main-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            <img src="image/logo5.png" alt="" class="logo"></a>

        </div>
        <div class="collapse navbar-collapse navbar-main-collapse">
          <ul class="nav navbar-nav navbar-left">
            <li class="hidden"><a href="#page-top"></a></li>
            <li><a href="../Homepages/index.php">首頁<i class="fa fa-angle-down"></i><span class="caret"></span></a></li> -->
            <!--  
            <li><a href="about.html">關於三三<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            
            <li><a href="product.html">產品故事<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            -->
            <!-- <li><a href="../Homepages/story.html">三三故事<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            
            <li><a href="../Homepages/product.php">如何購皂<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>

            <li><a href="../Homepages/faq.html">顧客問答<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>

            <li><a href="../Message/Message.php">留心語<i class="fa fa-angle-down"></i><span class="caret"></span></a></li> -->
            <!--
            <li><a href="contact.html">聯絡我們<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            -->
            <!-- <li class="dropdown"><a href="#" class="dropdown-toggle"><span class="lang">會員中心/登出</span><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">查看訂單</a></li>
                <li><a href="../methods/Update_CUSMAS1.php">修改資料</a></li>
                <li><a href="../methods/User_ChangePW1.php">修改密碼</a></li>
                <li><a href="../methods/Order_Confirm.php">購物車內容</a></li>
                <li><a href="../methods/User_logout.php">登出</a></li>
              </ul>
            </li>
         
            <li class="dropdown"><a href="#" class="dropdown-toggle"><span class="lang">Eng</span><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="english.html">English</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav> -->

    <!-- 內容想置中>< -->
    <div id="wrapper" style="text-align:center">
        <header id="header"><br><br><br></header> 
        <section id="about-slider">
            <div style="margin: 0 auto; margin-top: 15%;">
            
            <?php
            session_start();
      			include("Helper/mysql_connect.php");
            include("Helper/update_price.php");
      			$EMAIL = $_SESSION['EMAIL'];
      			$ORDNO = $_SESSION['ORDNO'];
            $ITEMNO = input('ITEMNO');
      			$ORDAMT = input('ORDAMT');
            if(is_numeric($ORDAMT) == FALSE || $ORDAMT < 0){
              $ORDAMT = '0';
            }
      			if($EMAIL != null){
      				if($ITEMNO != null){
      					if($ORDNO == null){
                  $ORDNO = '100000000';
      					}
                date_default_timezone_set('Asia/Taipei');
    						$CREATEDATE = date("Y-m-d H:i:s");
    			      $UPDATEDATE = date("Y-m-d H:i:s");
    						$sql = "insert into ORDITEMMAS (ORDNO, ITEMNO, ORDAMT, EMAIL, CREATEDATE, UPDATEDATE) values ('$ORDNO', '$ITEMNO', '$ORDAMT', 'EMAIL', '$CREATEDATE', '$UPDATEDATE')";
    						unset($_SESSION['ITEMNO']);
    						if(mysql_query($sql)){
    							echo "<h1>成功加入購物車</h1>";
                  if($ORDNO != '100000000'){
                    update_price($ORDNO);
                  }
      			?>
        
      			<a href="../Homepage/product.php" class="btn" size="4"><h2>繼續購物</h2></a> 
    				<a href="Order_Confirm.php" class="btn" size="4"><h2>結帳</h2></a> <br>
    
      			<?php
                }
    						else{
    							echo "<h1>加入購物車失敗</h1><br>";
    							echo '<meta http-equiv=REFRESH CONTENT=2;url=../Homepage/product.php>';
    						}
      				}
      				else{
      					echo '請先選擇商品<br>';
      					echo '<meta http-equiv=REFRESH CONTENT=2;url=../Homepage/product.php>';
      				}
      			}
      			else{
              echo '您無權限觀看此頁面!';
              echo '<meta http-equiv=REFRESH CONTENT=2;url=../Homepage/index.php>';
      			}
      			?>

            </div>
        </section>
    </div>
    
  </body>
</html>


