<title>三三吾鄉手工皂 強制結束訂單</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
include("Helper/mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];

if($EMAIL != null && $CUSIDT == 'A'){
    echo "強制結束訂單：<br>";
    $queryORDMAS = "SELECT * FROM ORDMAS WHERE ACTCODE=1 AND ORDSTAT='F'";
    $result = mysql_query($queryORDMAS);
    while($row = mysql_fetch_array($result)){
        $ORDNO = $row['ORDNO'];
        echo "訂單編號:";
        echo "<form name=\"form\" method=\"post\" action=\"View_ORDITEM_F.php\">";
        echo "<input type=\"hidden\" name=\"ORDNO\" value=\"$ORDNO\" />";
        echo "<input type=\"submit\" name=\"button\" value=\"$ORDNO\" />";
        echo "</form>";
        echo "訂單種類:".$row['ORDTYPE']." 顧客編號:".$row['EMAIL']." 缺貨狀態:".$row['BACKSTAT']." 訂單狀態:".$row['ORDSTAT']." 額外指令:".$row['ORDINST']." 訂單總額:".$row['TOTALPRICE']." 訂單總值:".$row['TOTALAMT']." 建立日期:".$row['CREATEDATE']."</br>";
    }
    echo "<br>";
?>
<a href="Update_ORDMAS.php">返回</a> <br>
<?php
}
else{
    echo '您無權限觀看此頁面!';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=../Homepage/index.php>';
}