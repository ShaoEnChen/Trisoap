<?
/*function insert(){
	$sql = 
	if(!mysql_query($sql)){
		return 'Insert failed';
	}
}*/

function delete($db, $con, $con_value){
	if(!mysql_query("UPDATE $db SET ACTCODE = 0 WHERE $con = '$con_value'"))
		return 'Delete failed';
}

/*function update(){
	$sql = 
	if(!mysql_query($sql)){
		return 'Update failed';
	}
}*/

function search($id, $db, $con, $con_value){
	$row = mysql_fetch_row(mysql_query("SELECT $id FROM $db WHERE $con = '$con_value'"));
	return $row[0];
}

function select($db, $con, $con_value){
	return mysql_fetch_array(mysql_query("SELECT * FROM $db WHERE $con = '$con_value'"));
}
?>