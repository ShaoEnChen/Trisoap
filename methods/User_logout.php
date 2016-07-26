<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();
unset($_SESSION['EMAIL']);
unset($_SESSION['CUSIDT']);
unset($_SESSION['ITEMNO']);
unset($_SESSION['ORDNO']);
echo "請稍等...";
echo '<meta http-equiv=REFRESH CONTENT=1;url=../Homepage/index.php>';
?>