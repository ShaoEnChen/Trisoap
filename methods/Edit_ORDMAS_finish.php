<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
include("Helper/mysql_connect.php");
include("Helper/handle_string.php");
include("Helper/sql_operation.php");
$EMAIL = $_SESSION['EMAIL'];
$ORDNO = input('ORDNO');
$message = null;

function ViewORDITEM($number){
	$ORDNO = input('ORDNO');
    $ITEMNOnumber = 'ITEMNO' . "$number";
    $ITEMAMTnumber = 'ITEMAMT' . "$number";
    $sql = "SELECT * FROM ORDITEMMAS WHERE ORDNO=$ORDNO AND ITEMNO=$number";
    $result = mysql_query($sql);
	$row = mysql_fetch_array($result);
    $name = search('ITEMNM', 'ITEMMAS', 'ITEMNO', $number);
    echo "商品編號：$number <br>";
    echo "<input type=\"hidden\" name=\"$ITEMNOnumber\" value=\"$number\" />";
    echo "商品名稱：$name <br>";
    if($row == false)                        
        echo "商品數量：<input type=\"text\" name=\"$ITEMAMTnumber\" value=\"0\" /> <br><br>";
    else{
        $ORDAMT = $row['ORDAMT'];
        echo "商品數量：<input type=\"text\" name=\"$ITEMAMTnumber\" value=\"$ORDAMT\" /> <br><br>";
    }
}

if($EMAIL != null){
    if($ORDNO == null){
        $message = $message . '訂單編號欄位不可空白<br>';
    }
    if($message == null){
        echo "<form name=\"form\" method=\"post\" action=\"Edit_ORDMAS_end.php\">";
        ViewORDITEM('1');
        ViewORDITEM('2');
        ViewORDITEM('3');
        ViewORDITEM('4');
        echo "<input type=\"submit\" name=\"button\" value=\"確定\" />";
        echo "</form>";
        $_SESSION['ORDNO'] = $ORDNO;
        $_SESSION['number'] = 4;
?>
<a href="Edit_ORDMAS.php">取消</a>
<?php
    }
    
    else{
        ?>
        <script>
        alert("<?echo $message;?>");
        </script>
        <meta http-equiv=REFRESH CONTENT=0;url=Edit_ORDMAS.php>
        <?
    }
}
else{
    ?>
    <script>
    alert("您無權限觀看此頁面!");
    </script>
    <meta http-equiv=REFRESH CONTENT=0;url=../Homepage/index.php>
    <?
}
?>