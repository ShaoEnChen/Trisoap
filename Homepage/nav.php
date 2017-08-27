<nav class="navbar navbar-custom navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" data-toggle="collapse" data-target=".navbar-main-collapse" class="navbar-toggle">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="/" class="navbar-brand">
        <!-- Img or text logo-->
        <img src="img/logo.png" alt="" class="logo">
      </a>
    </div>
    <div class="collapse navbar-collapse navbar-main-collapse">
      <ul class="nav navbar-nav navbar-left">
        <li class="hidden"><a href="#page-top"></a></li>
        <li><a href="/">首頁</a></li>
        <li><a href="#">關於三三<i class="fa fa-angle-down"></i><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="about.php">三三團隊</a></li>
            <li><a href="product_intro.php">三三堅持</a></li>
            <li><a href="faq.php">顧客問答</a></li>
            <li><a href="contact.php">聯絡我們</a></li>
          </ul>
        </li>
        <li><a href="#">三三產品<i class="fa fa-angle-down"></i><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="moonfest_products.php">中秋禮皂</a></li>
            <li class="dropdown-header">臺東系列產品</li>
            <li><a href="product.php">單品</a></li>
            <li><a href="soapstring.php">旅用皂絲</a></li>
            <li><a href="shopping_guide.php">購物須知</a></li>
          </ul>
        </li>
        <li><a href="trial.php">試用品申請</a></li>
        <li><a href="message.php">希望留心語</a></li>
        <li><a href="#">異業合作<i class="fa fa-angle-down"></i><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="partner.php">合作夥伴</a></li>
            <li><a href="media.php">媒體報導</a></li>
          </ul>
        </li>
        <?php
    	    $CUSIDT = $_SESSION['CUSIDT'];
    	    if($CUSIDT == 'A'){
        ?>
          <li><a href="#">管理平台<i class="fa fa-angle-down"></i><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="../methods/Update_Manager.php">權限管理</a></li>
              <li><a href="../methods/Update_ITEMMAS.php">商品管理</a></li>
              <li><a href="../methods/Update_ORDMAS.php">訂單管理</a></li>
	      <li><a href="../Trisoap_WL/controller/index.php">倉儲暨物流管理</a></li>
	      <li><a href="../methods/Update_DCTMAS.php">折扣管理</a></li>
              <li><a href="../methods/Update_MSGMAS.php">留心語管理</a></li>
              <li><a href="../methods/View_CUSMAS.php">查看客戶</a></li>
              <li><a href="../methods/Create_ORDMAS1.php">建立訂單</a></li>
            </ul>
          </li>
          <li><a href="#">會員中心/登出<i class="fa fa-angle-down"></i><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="../methods/View_ORDMAS.php">查看訂單</a></li>
              <li><a href="../methods/Update_CUSMAS.php">修改資料</a></li>
              <li><a href="../methods/User_ChangePW.php">修改密碼</a></li>
              <li><a href="../methods/View_Purchase.php">購物車內容</a></li>
              <li><a href="../methods/User_logout.php">登出</a></li>
            </ul>
          </li>
        <?php
          }
          elseif($CUSIDT == 'B'){
        ?>
          <li><a href="#">會員中心/登出<i class="fa fa-angle-down"></i><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="../methods/View_ORDMAS.php">查看訂單</a></li>
              <li><a href="../methods/Update_CUSMAS.php">修改資料</a></li>
              <li><a href="../methods/User_ChangePW.php">修改密碼</a></li>
              <li><a href="../methods/View_Purchase.php">購物車內容</a></li>
              <li><a href="../methods/User_logout.php">登出</a></li>
            </ul>
          </li>
        <?php
          }
          else{
        ?>
          <li><a href="#">註冊/登入<i class="fa fa-angle-down"></i><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="../methods/Create_CUSMAS.php">註冊</a></li>
              <li><a href="../methods/User_login.php">登入</a></li>
            </ul>
          </li>
        <?php
        }
        ?>
      </ul>
    </div>
  </div>
</nav>
