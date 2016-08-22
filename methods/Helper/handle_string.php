<?
function input($id){
	return addslashes(htmlspecialchars($_POST[$id]));
}
function encrypt($id){
	return substr((md5(md5($id))), 5, 12);
}
?>