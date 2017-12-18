<section class="footer bg-orange">
  <div class="container">
    <div class="row">
      <div class="col-sm-2 col-sm-offset-3">
        <h5>關於三三</h5>
        <p><a href="about.php">三三團隊</a></p>
        <p><a href="product_intro.php">三三堅持</a></p>
        <p><a href="partner.php">合作夥伴</a></p>
        <p><a href="media.php">媒體報導</a></p>
      </div>
      <div class="col-sm-2">
        <h5>客戶服務</h5>
        <p><a href="faq.php">顧客問答</a></p>
        <p><a href="contact.php">聯絡我們</a></p>
        <p><a href="message.php">希望留心語</a></p>
      </div>
      <div class="col-sm-2">
        <h5>三三產品</h5>
        <p><a href="product.php">臺東系列單品</a></p>
        <p><a href="soapstring.php">旅用皂絲</a></p>
        <p><a href="shopping_guide.php">購物須知</a></p>
        <p><a href="trial.php">試用品申請</a></p>
      </div>
      <div class="col-sm-3">
        <h5><a href="contact.php">聯絡我們</a></h5>
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
            <a href="contact.php">
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