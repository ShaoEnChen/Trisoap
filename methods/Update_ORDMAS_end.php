<meta charset="utf-8">
<link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
<?php
session_start();
include_once("Helper/mysql_connect.php");
include_once("Helper/handle_string.php");
include_once("Helper/redirect.js");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$ORIGIN = $_SESSION['ORIGIN'];
$ORDNO = $_SESSION['ORDNO'];
$message = null;

if($EMAIL != null && $CUSIDT == 'A'){
                $INVOICENO = input('INVOICENO');
                date_default_timezone_set('Asia/Taipei');
                $UPDATEDATE = date("Y-m-d H:i:s");
                $sql = "UPDATE ORDMAS SET INVOICENO='$INVOICENO' WHERE ORDNO='$ORDNO'";
                mysql_query($sql);
                $sql = "UPDATE ORDMAS SET ORDSTAT='C', UPDATEDATE='$UPDATEDATE' WHERE ORDNO='$ORDNO'";
                if(mysql_query($sql)){
                        $queryDetail = "SELECT * FROM ORDITEMMAS WHERE ORDNO='$ORDNO'";
                        $Detail = mysql_query($queryDetail);
                        while($item = mysql_fetch_array($Detail)){
                                $ITEMNO = $item['ITEMNO'];
                                $ITEMAMT = $item['ORDAMT'];
                                $amt = "UPDATE ITEMMAS SET ITEMAMT=ITEMAMT-'$ITEMAMT' WHERE ITEMNO='$ITEMNO'";
                                mysql_query($amt);
                        }
                        ?>
                        <script>
                        alert("儲存成功");
                        </script>
                        <?
                }
                else{
                        ?>
                        <script>
                        alert("儲存失敗");
                        </script>
                        <?
                }
                unset($_SESSION['ORDNO']);
                unset($_SESSION['ORIGIN']);
                if($ORIGIN == '1'){
                        ?><script>redirect("Update_ORDMAS_1.php");</script><?
                }
                elseif($ORIGIN == 'F'){
                        ?><script>redirect("Update_ORDMAS_F.php");</script><?
                }
                else{
                        ?><script>redirect("Update_ORDMAS_R.php");</script><?
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