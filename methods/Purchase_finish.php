<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
    <title>商品加入購物車</title>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='css/sign.css' rel='stylesheet' type='text/css'>
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
      include_once("Helper/mysql_connect.php");
      include_once("Helper/handle_string.php");
      include_once("Helper/update_price.php");
      include_once("Helper/redirect.js");
      $EMAIL = $_SESSION['EMAIL'];
      $ORDNO = $_SESSION['ORDNO'];
      $ITEMNO = input('ITEMNO');
      $ORDAMT = input('ORDAMT');
      if(is_numeric($ORDAMT) == FALSE || $ORDAMT < 0 || is_float($ORDAMT)){
        $ORDAMT = 0;
      }
      if($EMAIL != null){
        if($ITEMNO != null){
          if($ORDNO == null){
            $ORDNO = '100000000';
          }
          date_default_timezone_set('Asia/Taipei');
          $CREATEDATE = date("Y-m-d H:i:s");
          $UPDATEDATE = date("Y-m-d H:i:s");
          $checkorder1 = "SELECT ORDAMT FROM ORDITEMMAS WHERE ORDNO='$ORDNO' AND EMAIL='$EMAIL' AND ITEMNO='$ITEMNO'";
          $checkorder2 = mysql_query($checkorder1);
          $result = mysql_fetch_row($checkorder2);
          if($result[0] == FALSE){
            $sql = "INSERT INTO ORDITEMMAS (ORDNO, ITEMNO, ORDAMT, EMAIL, CREATEDATE, UPDATEDATE) values ('$ORDNO', '$ITEMNO', '$ORDAMT', '$EMAIL', '$CREATEDATE', '$UPDATEDATE')";
          }
          else{
            $sql = "UPDATE ORDITEMMAS SET ORDAMT=ORDAMT+$ORDAMT WHERE ORDNO='$ORDNO' AND EMAIL='$EMAIL' AND ITEMNO='$ITEMNO'";
          }
          if(mysql_query($sql)){
            echo "<br><h1>商品已成功加入購物車</h1>";
            if($ORDNO != '100000000'){
              update_price($ORDNO);
            }
      ?>

      <button type="button" class="promise"></buttom><a href="Order_Confirm.php">前往結帳</a>
      <button type="button" class="promise"></buttom><a href="../Homepage/product.php">繼續購物</a>
    
      <?
          }
          else{
            ?>
            <script>
            redirect("../Homepage/product.php");
            alert("系統錯誤，加入購物車失敗");
            </script>
            <?
          }
        }
        else{
          ?>
          <script>
          redirect("../Homepage/product.php");
          alert("請先選擇商品");
          </script>
          <?
        }
      }
      else{
        ?>
        <script>
        redirect("../Homepage/index.php");
        alert("您無權限觀看此頁面!");
        </script>
        <?
      }
      ?>
    </div>
</body>
</html>