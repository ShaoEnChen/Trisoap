<!DOCTYPE html>
<html>

<head>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='css/sign.css' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">

    <title>商品加入購物車</title>
    <style>
    .sign-block {
       width: 350px;
       padding: 20px;
       border-top: 10px solid #AA0000;
       position: absolute;
       top: 50%;
       left: 50%;
       margin-right: -50%;
       transform: translate(-50%, -50%);
    }
    .sign-block h1 {
        font-family: 微軟正黑體;
    }
    .promise {
        background: #AA0000;
        border: 1px solid #880000;
    }
    .promise:hover {
        background: #880000;
    }
    </style>
</head>

<body>
  <br>
  <div class="sign-block">
    <?php
      session_start();
      include("Helper/mysql_connect.php");
      include("Helper/handle_string.php");
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
          $sql = "insert into ORDITEMMAS (ORDNO, ITEMNO, ORDAMT, EMAIL, CREATEDATE, UPDATEDATE) values ('$ORDNO', '$ITEMNO', '$ORDAMT', '$EMAIL', '$CREATEDATE', '$UPDATEDATE')";
          unset($_SESSION['ITEMNO']);
          if(mysql_query($sql)){
            echo "<br>";
            echo "<h1>商品已成功加入購物車</h1>";
            if($ORDNO != '100000000'){
              update_price($ORDNO);
            }
      ?>

      <button type="button" class="promise"></buttom><a href="Order_Confirm.php">前往結帳</a>
      <button type="button" class="cancel"></buttom><a href="../Homepage/product.php">繼續購物</a>
    
      <?php
          }
          else{
            echo "<br><h1>加入購物車失敗</h1>";
            echo '<meta http-equiv=REFRESH CONTENT=2;url=../Homepage/product.php>';
          }
        }
        else{
          echo '請先選擇商品';
          echo '<meta http-equiv=REFRESH CONTENT=2;url=../Homepage/product.php>';
          }
        }
      else{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=../Homepage/index.php>';
      }
      ?>
    </div>
</body>
</html>