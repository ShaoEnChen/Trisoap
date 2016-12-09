<nav class="navbar navbar-custom navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" data-toggle="collapse" data-target=".navbar-main-collapse" class="navbar-toggle">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="#page-top" class="navbar-brand page-scroll">
        <!-- Img or text logo-->
        <img src="Homepage/img/logo2.png" alt="" class="logo">
      </a>
    </div>
    <div class="collapse navbar-collapse navbar-main-collapse">
      <ul class="nav navbar-nav navbar-left">
        <li class="hidden"><a href="#page-top"></a></li>
        <li><a href="/">首頁<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
        <li><a href=#>關於三三<i class="fa fa-angle-down"></i><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="Homepage/about.php">三三團隊</a></li>
            <li><a href="Homepage/faq.php">顧客問答</a></li>
            <li><a href="Homepage/contact.php">聯絡我們</a></li>
          </ul>
        </li>
        <li><a href="Homepage/product.php">產品故事<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
        <li><a href="Homepage/service.php">如何購皂<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
        <li><a href="../message/message.php">希望留心語<i class="fa fa-angle-down"></i><span class="caret"></span></a></li>
        <?php
          $CUSIDT = $_SESSION['CUSIDT'];
          if($CUSIDT == 'A'){
        ?>
          <li><a href="#">管理平台<i class="fa fa-angle-down"></i><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="../methods/Update_Manager.php">權限管理</a></li>
              <li><a href="../methods/Update_ITEMMAS.php">商品管理</a></li>
              <li><a href="../methods/Update_ORDMAS.php">訂單管理</a></li>
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
        <li><a href="#" onClick="closed()"><span class="lang">Eng</span></a></li>
      </ul>
    </div>
  </div>
</nav>