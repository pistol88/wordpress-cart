<?php
if(isset($_POST['id'])) {
	$json = array();
	
	$id = (int)$_POST['id'];
	$count = (int)$_POST['count'];

	if($count >= 0) {
		$_SESSION['nhb_basket'][$id]['count'] = $count;
	}
	else {
		unset($_SESSION['nhb_basket'][$id]);
	}

	$json = nhb_get_basket(true);
	
	echo json_encode($json);
	die();
}
?>