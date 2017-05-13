<section class="footer bg-orange">
  <div class="container">
    <div class="row">
      <div class="col-sm-2 col-sm-offset-3">
        <h5>關於三三</h5>
        <p><a href="Homepage/about.php">三三團隊</a></p>
        <p><a href="Homepage/product_intro.php">三三堅持</a></p>
        <p><a href="Homepage/partner.php">合作夥伴</a></p>
        <p><a href="Homepage/media.php">媒體報導</a></p>
      </div>
      <div class="col-sm-2">
        <h5>客戶服務</h5>
        <p><a href="Homepage/faq.php">顧客問答</a></p>
        <p><a href="Homepage/contact.php">聯絡我們</a></p>
        <p><a href="../message/message.php">希望留心語</a></p>
      </div>
      <div class="col-sm-2">
        <h5>三三產品</h5>
        <p><a href="Homepage/product.php">臺東系列單品</a></p>
        <p><a href="Homepage/soapstring.php">旅用皂絲</a></p>
        <p><a href="Homepage/shopping_guide.php">購物須知</a></p>
        <p><a href="Homepage/trial.php">試用品申請</a></p>
      </div>
      <div class="col-sm-3">
        <h5><a href="Homepage/contact.php">聯絡我們</a></h5>
        <?php
          $COMTEL = search('COMTEL', 'OWNMAS', 'COMNM', 'Trisoap');
          $COMEMAIL = search('COMEMAIL', 'OWNMAS', 'COMNM', 'Trisoap');
          $COMADD = search('COMADD', 'OWNMAS', 'COMNM', 'Trisoap');
        ?>
        <p>
          <i class="fa fa-phone fa-fw fa-lg"></i>
          <?php echo $COMTEL;?>
        </p>
        <p>
          <i class="fa fa-envelope fa-fw fa-lg"></i>
          <?php echo $COMEMAIL;?>
        </p>
        <p>
          <i class="fa fa-map-marker fa-fw fa-lg"></i>
          <?php echo $COMADD;?>
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-3">
        <ul class="list-inline">
          <li>
            <a href="https://www.facebook.com/trisoap">
              <i class="fa fa-facebook fa-fw fa-lg"></i>
            </a>
          </li>
          <li>
            <a href="Homepage/contact.php">
              <i class="fa fa-envelope fa-fw fa-lg"></i>
            </a>
          </li>
          <li>
            <a href="https://www.pinkoi.com/store/trisoap">Pinkoi</a>
          </li>
        </ul>
      </div>
      <div class="col-sm-6">
        <p class="small">Copyright &copy; 2016 TriSoap All Rights Reserved</p>
      </div>
    </div>
  </div>
</section>