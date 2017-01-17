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
</head>

<body>
  <br>
  <div class="sign-block" style="width: 350px;">
    <?php 
      session_start();
      include_once("Helper/mysql_connect.php");
      include_once("Helper/handle_string.php");
      include_once("Helper/update_price.php");
      include_once("Helper/redirect.js");
      include_once("Helper/analyticstracking.php");
      $EMAIL = $_SESSION['EMAIL'];
      $ORDNO = '100000000';
      $ITEMNO = input('ITEMNO');
      $ORDAMT = input('ORDAMT');
      if(is_numeric($ORDAMT) == FALSE || $ORDAMT < 0 || is_float($ORDAMT)){
        $ORDAMT = 0;
      }
      if($EMAIL != null){
        if($ITEMNO != null){
          date_default_timezone_set('Asia/Taipei');
          $CREATEDATE = date("Y-m-d H:i:s");
          $UPDATEDATE = date("Y-m-d H:i:s");
          $checkorder1 = "SELECT ORDAMT FROM ORDITEMMAS WHERE ORDNO='$ORDNO' AND EMAIL='$EMAIL' AND ITEMNO='$ITEMNO'";
          $checkorder2 = mysql_fetch_row(mysql_query($checkorder1));
          if($checkorder2[0] == ''){
            $sql = "INSERT INTO ORDITEMMAS (ORDNO, ITEMNO, ORDAMT, EMAIL, CREATEDATE, UPDATEDATE) values ('$ORDNO', '$ITEMNO', '$ORDAMT', '$EMAIL', '$CREATEDATE', '$UPDATEDATE')";
          }
          else{
            $sql = "UPDATE ORDITEMMAS SET ORDAMT=ORDAMT+$ORDAMT WHERE ORDNO='$ORDNO' AND EMAIL='$EMAIL' AND ITEMNO='$ITEMNO'";
          }
          if(mysql_query($sql)){
            echo "<br><h1>商品已成功加入購物車</h1>";
      ?>
      <p style="font-family: 微軟正黑體; font-size: 14px;">目前全館滿777即可享臺灣本島免運費！</p>
      <a href="View_Purchase.php"><button type="button" class="promise">前往結帳</button></a>
      <a href="../Homepage/product.php"><button type="button" class="promise">繼續購物</button></a>
    
      <?php         }
          else{
            ?>
            <script>
            redirect("../Homepage/product.php");
            alert("系統錯誤，加入購物車失敗");
            </script>
            <?php         }
        }
        else{
          ?>
          <script>
          redirect("../Homepage/product.php");
          alert("請先選擇商品");
          </script>
          <?php       }
      }
      else{
        ?>
        <script>
        redirect("/");
        alert("請先登入或註冊!");
        </script>
        <?php     }
      ?>
    </div>
</body>
</html>