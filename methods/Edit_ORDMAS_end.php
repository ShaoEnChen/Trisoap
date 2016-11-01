<meta charset="utf-8">
<link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
<?php
session_start();
include_once("Helper/mysql_connect.php");
include_once("Helper/handle_string.php");
include_once("Helper/update_price.php");
include_once("Helper/redirect.js");
$EMAIL = $_SESSION['EMAIL'];
$ORDNO = $_SESSION['ORDNO'];
$number = $_SESSION['number'];
$message = null;
$price = 0;

if($EMAIL != null){
    $row = select('ORDMAS', 'ORDNO', $ORDNO);
    if($row['ORDSTAT'] != 'E'){
            $message = $message . '此訂單已進入執行狀態，故無法更新<br>';
    }
    if($row['PAYSTAT'] == '1'){
            $message = $message . '無法更新已付款之訂單<br>';
    }
    unset($_SESSION['ORDNO']);
    if($message == null){
        while($number > 0){
            date_default_timezone_set('Asia/Taipei');
            $CREATEDATE = date("Y-m-d H:i:s");
            $UPDATEDATE = date("Y-m-d H:i:s");
            $ITEMNOnumber = 'ITEMNO' . "$number";
            $ITEMAMTnumber = 'ITEMAMT' . "$number";
            $ITEMNO = input($ITEMNOnumber);
            $ORDAMT = input($ITEMAMTnumber);
            if(is_numeric($ORDAMT) == FALSE || $ORDAMT < 0 || is_float($ORDAMT)){
                $ORDAMT = 0;
            }
            $sql = "SELECT * FROM ORDITEMMAS WHERE ORDNO=$ORDNO AND ITEMNO=$number";
		    $result = mysql_query($sql);
			$row = mysql_fetch_array($result);
            if($row == false){
            	if($ORDAMT != 0){
					$sql = "INSERT INTO ORDITEMMAS (ORDNO, ITEMNO, ORDAMT, EMAIL, CREATEDATE, UPDATEDATE) values ('$ORDNO', '$ITEMNO', '$ORDAMT', '$EMAIL', '$CREATEDATE', '$UPDATEDATE')";
                }
                else{
					$sql = '';
                }
            }
            else{
            	$sql = "UPDATE ORDITEMMAS SET ORDAMT='$ORDAMT', UPDATEDATE='$UPDATEDATE' WHERE ITEMNO='$ITEMNO'";
            }
            if($sql != ''){
                if(!mysql_query($sql)){
                	$message = $message . '更新失敗<br>';
                }
            }
        $number -= 1;
        }
        unset($_SESSION['number']);
        update_price($ORDNO);
        unset($_SESSION['ORDNO']);
    }
    else{
        ?>
        <script>
        redirect("Edit_ORDMAS.php");
        alert("<?php echo $message;?>");
        </script>
        <?php 
    }
    if($message == null){
        ?>
        <script>
        redirect("View_ORDMAS.php");
        alert("更新成功");
        </script>
        <?php 
    }
    else{
        ?>
        <script>
        redirect("Edit_ORDMAS.php");
        alert("更新失敗");
        </script>
        <?php 
    }
}
else{
    ?>
    <script>
    redirect("/");
    alert("您無權限觀看此頁面!");
    </script>
    <?php 
}
?>