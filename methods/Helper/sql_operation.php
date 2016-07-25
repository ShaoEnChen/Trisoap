<?
include("mysql_connect.php")
function insert(){
	$sql = 
	if(!mysql_query($sql)){
		return 'Insert failed';
	}
}

function delete($db, $con, $con_value){
	$sql = 'UPDATE '.$db.' SET ACTCODE = 0 WHERE '.$con.' = '.$con_value;
	if(!mysql_query($sql)){
		return 'Delete failed';
	}
}

function update(){
	$sql = 
	if(!mysql_query($sql)){
		return 'Update failed';
	}
}

function search($id, $db, $con, $con_value){
	$sql = 'SELECT '.$id.' FROM '.$db.' WHERE '.$con.' = '.$con_value;
	$result = mysql_query($sql);
	$row = mysql_fetch_row($result);
	return $row[0];
}

function select($db, $con, $con_value){
	$sql = 'SELECT * FROM '.$db.' WHERE '.$con.' = '.$con_value;
	$result = mysql_query($sql);
	return mysql_fetch_array($result);
}
?>