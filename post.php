<?php
$post = (isset($_POST['data']) && trim($_POST['data'])<> '') ? $_POST['data'] : '';

if($post <> ''){
	try{
	include_once('config.php');
	$db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=utf8',USER,PASS);
	$data = array();
	
	if($post == 'getInfo'){
		$data['id'] = (int)$_POST['id'];
		$sql = "SELECT * FROM `_your_table` WHERE your_collumn=? ORDER BY id DESC";
		$database = $db->prepare($sql);
		$database->bindValue(1,$data['id'], PDO::PARAM_STR);
		$database->execute();
		$database->setFetchMode(PDO::FETCH_ASSOC);
		$data =  $database->fetchAll(); 
	}
	
	echo json_encode($data);

	}catch(exception $e){
		$fp = fopen('LogDb.txt', 'a');
		$write = fwrite($fp,$e);
		fclose($fp);	
	}
}



