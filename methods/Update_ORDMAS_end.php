<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../Homepage/img/misc/favicon.png">
<?php
session_start();
include("Helper/mysql_connect.php");
include("Helper/handle_string.php");
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
                if($ORIGIN == '1')
                        ?><meta http-equiv=REFRESH CONTENT=0.5;url=Update_ORDMAS_1.php><?
                elseif($ORIGIN == 'F')
                        ?><meta http-equiv=REFRESH CONTENT=0.5;url=Update_ORDMAS_F.php><?
                else
                        ?><meta http-equiv=REFRESH CONTENT=0.5;url=Update_ORDMAS_R.php><?
}
else{
        ?>
        <script>
        alert("您無權限觀看此頁面!");
        </script>
        <meta http-equiv=REFRESH CONTENT=0.5;url=../Homepage/index.php>
        <?
}
?>