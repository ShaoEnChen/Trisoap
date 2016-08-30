<?
include_once(dirname(__FILE__)."/mysql_connect.php");
date_default_timezone_set('Asia/Taipei');
$nowDATE = date("Y-m-d");
$newDATE = explode('-', $nowDATE);
$queryCUSMAS = "SELECT EMAIL FROM CUSMAS WHERE ACTCODE=1";
$CUSMASresult = mysql_query($queryCUSMAS);
while($email = mysql_fetch_array($CUSMASresult)){
	$message = '';
	$SALEAMTMTD = 0;
	$SALEAMTSTD = 0;
	$SALEAMTYTD = 0;
	$SALEAMT = 0;
	$EMAIL = $email['EMAIL'];
	$queryORDMAS = "SELECT * FROM ORDMAS WHERE PAYSTAT=1 AND EMAIL = '$EMAIL'";
	$ORDMASresult = mysql_query($queryORDMAS);
	while($row = mysql_fetch_array($ORDMASresult)){
		$SALEAMT += $row['REALPRICE'];
		$DATE = explode('-', $row['CREATEDATE']);
		if($newDATE[0] == $DATE[0] && $newDATE[1] - $DATE[1] == 1){
			$SALEAMTMTD += $row['REALPRICE'];
		}
		if(abs($newDATE[1]-11) <= 1){
			if($newDATE[0] == $DATE[0] && abs($DATE[1]-8) <= 1){
				$SALEAMTSTD += $row['REALPRICE'];
			}
		}
		elseif(abs($newDATE[1]-8) <= 1){
			if($newDATE[0] == $DATE[0] && abs($DATE[1]-5) <= 1){
				$SALEAMTSTD += $row['REALPRICE'];
			}
		}
		elseif(abs($newDATE[1]-5) <= 1){
			if($newDATE[0] == $DATE[0] && abs($DATE[1]-2) <= 1){
				$SALEAMTSTD += $row['REALPRICE'];
			}
		}
		else{
			if($newDATE[0] - $DATE[0] == 1 && abs($DATE[1]-11) <= 1){
				$SALEAMTSTD += $row['REALPRICE'];
			}
		}
		if($newDATE[0] - $DATE[0] == 1){
			$SALEAMTYTD += $row['REALPRICE'];
		}
	}
	$sql = "UPDATE CUSMAS SET SALEAMTMTD = $SALEAMTMTD WHERE EMAIL = '$EMAIL'";
	if(!mysql_query($sql)){
		$message .= 'Error!';
	}
	$sql = "UPDATE CUSMAS SET SALEAMTSTD = $SALEAMTSTD WHERE EMAIL = '$EMAIL'";
	if(!mysql_query($sql)){
		$message .= 'Error!';
	}
	$sql = "UPDATE CUSMAS SET SALEAMTYTD = $SALEAMTYTD WHERE EMAIL = '$EMAIL'";
	if(!mysql_query($sql)){
		$message .= 'Error!';
	}
	$sql = "UPDATE CUSMAS SET SALEAMT = $SALEAMT WHERE EMAIL = '$EMAIL'";
	if(!mysql_query($sql)){
		$message .= 'Error!';
	}
	if($message != ''){
		?>
		<script>
		alert("Error!");
		</script>
		<?
		break;
	}
}
$set = "UPDATE OWNMAS SET SALEAMTDATE = $nowDATE WHERE COMNM = 'Trisoap'";
mysql_query($set);
?>