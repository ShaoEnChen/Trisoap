<?php
include("sql_operation.php");
function update_price($ORDNO){
	$row = select('ORDMAS', 'ORDNO', $ORDNO);
	$TOTALPRICE = $row['TOTALPRICE'];
	$SHIPFEE = $row['SHIPFEE'];
	$TOTALAMT = $row['TOTALAMT'];
	$queryORDITEM = "SELECT * FROM ORDITEMMAS where ORDNO='$ORDNO'";
	$result = mysql_query($queryORDITEM);
	while($row = mysql_fetch_array($result)){
		$ITEMNO = $row['ITEMNO'];
		$ITEMPRICE = search('PRICE', 'ITEMMAS', 'ITEMNO', $ITEMNO);
		$price += ($row['ORDAMT'] * $ITEMPRICE);
	}
	$TOTALPRICE = $price;
	$sql = "UPDATE ORDMAS SET TOTALPRICE='$TOTALPRICE' WHERE ORDNO='$ORDNO'";
	mysql_query($sql);
	$TOTALAMT = $price + $SHIPFEE;
	$sql = "UPDATE ORDMAS SET TOTALAMT='$TOTALAMT' WHERE ORDNO='$ORDNO'";
	mysql_query($sql);
}
?>