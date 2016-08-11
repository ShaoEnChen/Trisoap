<title>三三吾鄉手工皂 待審核留言</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
<?php
session_start();
include_once("Helper/mysql_connect.php");
include_once("Helper/redirect.js");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$number = 0;

if($EMAIL != null && $CUSIDT == 'A'){
	echo "待審核留言：<br>";
    echo "<form name=\"form\" method=\"post\" action=\"Update_MSGMAS_A_finish.php\">";
    $queryMSGMAS = "SELECT * FROM MSGMAS WHERE MSGSTAT='A' AND ACTCODE='1'";
    $result = mysql_query($queryMSGMAS);
    while($row = mysql_fetch_array($result)){
		echo "留言編號:".$row['MSGNO']." 顧客編號:".$row['EMAIL']." 留言文字:".$row['MSGTXT']." 留言照片/影片:";
        // 顯示影片或照片
        echo " 建立日期:".$row['CREATEDATE']." ";
        $MSGNO = $row['MSGNO'];
        $MSGNOnumber = 'MSGNO' . "$number";
        echo "<input type=\"hidden\" name=\"$MSGNOnumber\" value=\"$MSGNO\" />";
        $MSGSTATnumber = 'MSGSTAT' . "$number";
        echo "留言狀態：<select name=\"$MSGSTATnumber\" >";
        echo "<option value=\"A\">待審核</option>";
        echo "<option value=\"B\">已通過</option>";
        echo "<option value=\"C\">未通過</option>";
        echo "</select> <br>";
        $number += 1;
    }
    echo "<input type=\"submit\" name=\"button\" value=\"儲存\" />";
    echo "</form>";
    $_SESSION['number'] = $number - 1;
?>
<a href="Update_MSGMAS.php">返回</a> <br>
<?php
}
else{
    ?>
    <script>
    redirect("../Homepage/index.php");
    alert("您無權限觀看此頁面!");
    </script>
    <?
}