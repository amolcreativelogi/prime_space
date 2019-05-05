<?php

session_start();		
		
include_once('php/config.php');
include_once('php/chat_realtime.php');
$chat = new Chat_realtime($name, $host, $username, $password, $imageDir);
		
$data = array();
$base_url = "http://" . $_SERVER['SERVER_NAME'].'/public/images/user-profile/';

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	if(!empty($_POST['data'])){
		
		if($_POST['data'] == 'cek'){
			if(isset($_SESSION['user']['user_id'])){

				$data['status'] = 'success';
				$data['user'] 	= $_SESSION['user']['user_id'];
				$data['avatar'] =  $base_url.$_SESSION['user']['profile_pic'];
			}else{
				$data['status'] = 'error';
			}
		}else if($_POST['data'] == 'login'){
			if(!empty($_POST['name']) && !empty($_POST['avatar'])){
				$data = $chat->user_login($_POST['name'], $_POST['avatar']);
				
			}
		}else if($_POST['data'] == 'message'){
			if(!empty($_POST['ke']) && !empty($_POST['tipe'])){
				//$data = $chat->get_message($_POST['tipe'], $_POST['ke'], $_SESSION['user']['user_id']);
				$data = $chat->get_message('users', $_POST['ke'], $_SESSION['user']['user_id']);
			}			
		}else if($_POST['data'] == 'user'){
			if($_SESSION['user']['user_type_permission'] == 'host') {
			$data = $chat->get_user_for_host($_SESSION['user']['user_id']);
			} else {
			$data = $chat->get_user($_SESSION['user']['user_id'],$_POST['property_id']);	
			} 
		}else if($_POST['data'] == 'send'){
			if(isset($_SESSION['user']['user_id']) && !empty($_POST['ke']) && !empty($_POST['date']) && !empty($_POST['avatar']) && !empty($_POST['tipe']) && isset($_POST['message']) && isset($_POST['images'])){
				$images = json_decode($_POST['images']);
				if(!empty($_POST['message']) && count($images) < 1){
					$data = $chat->send_message($_SESSION['user']['user_id'], $_POST['ke'], $_POST['message'], "", $_POST['date'], $_POST['avatar'], $_POST['tipe']);
				}else if(!empty($_POST['message']) && count($images) > 0){
					$h = 0;
					foreach($images as $image){
						$n = $chat->arrayToBinaryString($image->binary);
						$chat->createImg($n, $image->name, 'image/png');
						if($h == 0){
							$data = $chat->send_message($_SESSION['user']['user_id'], $_POST['ke'], $_POST['message'], $image->name, $_POST['date'], $_POST['avatar'], $_POST['tipe']);
						}else{	
							$data = $chat->send_message($_SESSION['user']['user_id'], $_POST['ke'], "", $image->name, $_POST['date'], $_POST['avatar'], $_POST['tipe']);
						}
						$h++;
					}
				}else if(empty($_POST['message']) && count($images) > 0){
					foreach($images as $image){
						$n = $chat->arrayToBinaryString($image->binary);
						$chat->createImg($n, $image->name, 'image/png');
						$data = $chat->send_message($_SESSION['user']['user_id'], $_POST['ke'], "", $image->name, $_POST['date'], $_POST['avatar'], $_POST['tipe']);
					}
				}
			}
		}else if($_POST['data'] == 'logout'){
			$data = $chat->user_logout($_SESSION['user']['user_id']);
			if($data['status'] == 'success'){
				session_destroy();
			}
		}
	}
}else{
	$data["aa"] = "bb";
}



		
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// echo '<pre>';
// print_r($data);
echo json_encode($data);
