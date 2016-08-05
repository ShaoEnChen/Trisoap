<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>三三吾鄉手工皂 更新訂單</title>
<?php
session_start();
include("Helper/mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
if($EMAIL != null){
        $queryORDNO = "SELECT * FROM ORDMAS where EMAIL='$EMAIL' AND ORDSTAT='E' AND PAYSTAT='0' AND ACTCODE='1'";
        $result = mysql_query($queryORDNO);
        $item = mysql_fetch_array($result);
        if($item == false){
                ?>
                <script>
                alert("您沒有可更新的訂單!");
                </script>
                <meta http-equiv=REFRESH CONTENT=0.5;url=View_ORDMAS.php>
                <?
        }
        else{
                echo "<form name=\"form\" method=\"post\" action=\"Edit_ORDMAS_finish.php\">";
                echo "訂單編號：<select name=\"ORDNO\" />";
                $ORDNO = $item['ORDNO'];
                echo "<option value=\"$ORDNO\">$ORDNO</option>";
                while($item = mysql_fetch_array($result)){
                $ORDNO = $item['ORDNO'];
                echo "<option value=\"$ORDNO\">$ORDNO</option>";       
                }
        }
        echo "</select> <br>";
        echo "<input type=\"submit\" name=\"button\" value=\"確定\" />";
        echo "</form> <br>";
?>
<a href="View_ORDMAS.php">取消</a>
<?php
}
else{
        ?>
        <script>
        alert("請先註冊或登入!");
        </script>
        <meta http-equiv=REFRESH CONTENT=0.5;url=../Homepage/index.php>
        <?
}
?>