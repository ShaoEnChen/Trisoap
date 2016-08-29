<?php
include_once(dirname(__FILE__)."/mysql_connect.php");
include_once(dirname(__FILE__)."/sql_operation.php");
function update_price($ORDNO){
	$row = select('ORDMAS', 'ORDNO', $ORDNO);
	$SHIPFEE = $row['SHIPFEE'];
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
	$sql = "UPDATE ORDMAS SET REALPRICE='$TOTALAMT' WHERE ORDNO='$ORDNO'";
	mysql_query($sql);
}
function set_price($ORDNO, $DISCOUNT){
	$row = select('ORDMAS', 'ORDNO', $ORDNO);
	$SHIPFEE = $row['SHIPFEE'];
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
	$REALPRICE = $price * $DISCOUNT;
	$REALPRICE += $SHIPFEE;
	$sql = "UPDATE ORDMAS SET REALPRICE='$REALPRICE' WHERE ORDNO='$ORDNO'";
	mysql_query($sql);
}
function set_price_dir($ORDNO, $newPRICE){
	$row = select('ORDMAS', 'ORDNO', $ORDNO);
	$SHIPFEE = $row['SHIPFEE'];
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
	$sql = "UPDATE ORDMAS SET REALPRICE='$newPRICE' WHERE ORDNO='$ORDNO'";
	mysql_query($sql);
}
?>