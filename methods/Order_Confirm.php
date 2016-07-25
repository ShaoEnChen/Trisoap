<?php session_start(); ?>
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
    <title>查看購物車內容</title>
  </head>

  <body>
    <nav class="navbar navbar-custom navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" data-toggle="collapse" data-target=".navbar-main-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            <!-- Img or text logo--><img src="image/logo5.png" alt="" class="logo"></a>

        </div>
        <div class="collapse navbar-collapse navbar-main-collapse">
          <ul class="nav navbar-nav navbar-left">
            <li class="hidden"><a href="#page-top"></a></li>
            <li><a href="../Homepages/index.php">首頁<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            <!--  
            <li><a href="about.html">關於三三<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            
            <li><a href="product.html">產品故事<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            -->
            <li><a href="../Homepages/story.html">三三故事<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            
            <li><a href="../Homepages/product.php">如何購皂<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>

            <li><a href="../Homepages/faq.html">顧客問答<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>

            <li><a href="../Message/Message.php">留心語<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            <!--
            <li><a href="contact.html">聯絡我們<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
            -->
            <li class="dropdown"><a href="#" class="dropdown-toggle"><span class="lang">會員中心/登出</span><span class="caret"></span></a>
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
    </nav>

    <!-- 內容想置中>< -->
    <div id="wrapper" style="text-align:center">
      <header id="header"><br><br><br></header> 
        <section id="about-slider">
            <div style="margin: 0 auto"> <font size="5">

                <?php
                include("Helper/mysql_connect.php");
                include("Helper/sql_operation.php");

                $EMAIL = $_SESSION['EMAIL'];
                $ORDNO = $_SESSION['ORDNO'];
                if(is_null($ORDNO)){
                    $ORDNO = '100000000';
                }
                echo "<h2>已選擇的商品</h2>";

                $ItemNo = array("ItemNo");
                $ItemName = array("ItemName");
                $Price = array(0);
                $ItemAmount = array(0);

                $sql = "SELECT ITEMNO FROM ORDITEMMAS where ORDNO = '$ORDNO' AND EMAIL = '$EMAIL'";
                $no_result = mysql_query($sql);
                while($no_row = mysql_fetch_row($no_result, MYSQL_NUM)){         //get item node
                    $node = $no_row[0];
                    $name = search('ITEMNM', 'ITEMMAS', 'ITEMNO', $node);
                    array_push($ItemName, $name);
                    $price = search('PRICE', 'ITEMMAS', 'ITEMNO', $node);
                    array_push($Price, $price);        
                }

                $sql = "SELECT ORDAMT FROM ORDITEMMAS where ORDNO = '$ORDNO' AND EMAIL = '$EMAIL'";  //get item amount
                $amt_result = mysql_query($sql);
                $number = mysql_num_rows($amt_result);
                while($amt_row = mysql_fetch_row($amt_result, MYSQL_NUM)){
                    $amt = $amt_row[0];
                    array_push($ItemAmount, $amt);
                }

                if($number != 0){
                    $shipfee = search('SHIPFEE', 'ORDMAS', 'ORDNO', $ORDNO);
                }
                else{
                    echo "目前沒有選擇任何商品";
                    echo '<br>';
                    $shipfee = 0;
                }

                $total = $shipfee;
                for($i=1; $i<=$number; $i++){
                    echo $ItemName[$i];
                    echo "(";
                    echo $Price[$i];
                    echo "/塊)";
                    echo " * ";
                    echo $ItemAmount[$i];
                    echo " = ";
                    $price = $Price[$i] * $ItemAmount[$i];
                    echo $price;
                    echo "元";
                    $total += $price;
                    echo '<br>';
                }
                echo '<br>';
                echo "運費 : ";
                echo $shipfee;
                echo "元";
                echo '<br>';
                echo "<font size=\"5\" color=\"F7920C\"> 共計 : ";
                echo $total;
                echo " 元</font>";
                echo '<br><br>';
                //echo '<hr>';
                if($ORDNO == '100000000'){
                    ?>
                    <div><buttom></buttom><a href="Create_ORDMAS2.php">確定結帳</a>
                    <br><font size="4">(結帳完成後會自動登出)</font>
                    </div>
                    <!--<a href="../Homepages/product_customer.php" style="float: right">返回</a>-->
                    <?
                }
                else{
                    ?>
                    <div><buttom></buttom><a href="cashing_test1.php">確定結帳</a>
                    <br><font size="4">(結帳完成後會自動登出)</font>
                    </div>
                    <!--<a href="../Homepages/product_customer.php" style="float: right">返回</a>-->
                    <?
                }
                ?>
            </div>
        </section>
    </div>

  </body>
</html>


