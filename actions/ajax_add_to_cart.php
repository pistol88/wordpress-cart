<?php
if(isset($_POST['post_id'])) {
	
	$id = (int)$_POST['post_id'];
	$post = get_post($id);
	
	$json = array();
	if($post->ID) {
		//Если нет в корзине - добавляем
		if(!isset($_SESSION['nhb_basket'][$id])) {
			if(isset($_POST['count']) && $_POST['count'] > 0) {
				$count = (int)$_POST['count'];
			}
			else {
				$count = 1;
			}
			$tobasket = array(
				'id' => $id,
				'name' => get_the_title($post->ID),
				'price' => nhb_get_price($post->ID),
				'count' => $count,
				'link' => get_permalink($post->ID)
			);
			$_SESSION['nhb_basket'][$id] = $tobasket;
		}
		//Если уже есть в корзине - меняем кол-во
		else {
			if(isset($_POST['count']) && $_POST['count'] > 0) {
				$_SESSION['nhb_basket'][$id]['count'] = (int)$_POST['count'];
			}
			else {
				$_SESSION['nhb_basket'][$id]['count']++;
			}
		}
		$json = nhb_get_basket(true);
	}
	else {
		$json['error'] = __('Товар не найден', 'nhb');
	}
	echo json_encode($json);
	die();
}
?>