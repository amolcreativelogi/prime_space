<?php

/*****************************************************
* #### Chat Realtime (BETA) ####
* Coded by Ican Bachors 2016.
* https://github.com/bachors/Chat-Realtime
* Updates will be posted to this site.
* Aplikasi ini akan selalu bersetatus (BETA) 
* Karena akan terus di update & dikembangkan.
* Maka dari itu jangan lupa di fork & like ya sob :).
*****************************************************/
class Chat_realtime {
	
	private $name;
	private $host;
	private $username;
	private $password;
	private $imageDir;
	function __construct($name, $host, $username, $password, $imageDir)
    {
        $this->dbh = new PDO('mysql:dbname='.$name.';host='.$host.";port=3306",$username, $password);
		$this->imageDir = $imageDir;
		

    }
	
	function user_login($user, $avatar){
		$name = htmlspecialchars($user);
		$data = array();
		$sql=$this->dbh->prepare("SELECT name FROM users WHERE name=?");
		$sql->execute(array($name));
		if($sql->rowCount() == 0){
			$upd=$this->dbh->prepare("INSERT INTO users (name,avatar,login,status) VALUES (?,?,NOW(),?)");
			$upd->execute(array($name, $avatar, 'online'));
		}else{
			$upd=$this->dbh->prepare("UPDATE users SET avatar=?, login=NOW(), status=? WHERE name=?");
			$upd->execute(array($avatar, 'online', $name));
		}
		$data['status'] = 'success';
		return $data;
	}
	
	function get_message($tipe, $ke, $user){
		$data = array();

		
		$base_url = "http://" . $_SERVER['SERVER_NAME'].'/public/images/user-profile/';
		if($tipe == 'users'){
			if($ke == 'all'){
				$sql=$this->dbh->prepare("SELECT * FROM messages WHERE (name = :id1 AND tipe= :id2) OR (ke = :id1 AND tipe = :id2) order by date DESC");
				$sql->execute(array(':id1' => $user, ':id2' => $tipe));
				$tmp = array();
				while($r = $sql->fetch()){
					$name = ($r['name'] == $user ? $r['ke'] : $r['name']);
					if(!in_array($name, $tmp)){
						array_push($tmp, $name);
						$get=$this->dbh->prepare("SELECT status,firstname FROM  prk_user_registrations WHERE user_id=?");
						$get->execute(array($name));

						$get1=$this->dbh->prepare("SELECT profile_pic FROM  prk_user_registrations WHERE user_id=?");
						$get1->execute(array($name));
						$data[] = array(
							'name' => $name,
							'firstname' => $get->fetch()['firstname'],
							'avatar' =>  $base_url.$get1->fetch()['profile_pic'],
							'date' =>  $r['date'],
							'message' => $r['message'],
							'status' => $get->fetch()['status'],
							'selektor' => ($r['name'] == $user ? "to" : "from")
						);
					}
				}
			}else{
				
		
				$sql=$this->dbh->prepare("SELECT * FROM messages WHERE (name = :id1 AND ke= :id2) OR (name = :id2 AND ke = :id1) order by date DESC");
				$sql->execute(array(':id1' => $user, ':id2' => $ke));
				while($r = $sql->fetch()){

					$get=$this->dbh->prepare("SELECT status,firstname FROM  prk_user_registrations WHERE user_id=?");
					$get->execute(array($ke));

					$get1=$this->dbh->prepare("SELECT profile_pic FROM  prk_user_registrations WHERE user_id=?");
					$get1->execute(array($ke));
					$data[] = array(
						'name' => $r['name'],
						'firstname' => $get->fetch()['firstname'],
						'avatar' =>   $base_url.$get1->fetch()['profile_pic'],
						'message' => $r['message'],
						'image' => $r['image'],
						'tipe' => $r['tipe'],
						'date' =>$r['date'],
						'selektor' => ($r['name'] == $user ? $r['ke'] : $r['name'])
					);
				}

				
			}
		}
	
		//print_r($data);
		return $data;
	}

	function get_user_for_host($user){

		$base_url = "http://" . $_SERVER['SERVER_NAME'].'/public/images/user-profile/';
		if(isset($user)){
			$sqlm=$this->dbh->prepare("SELECT user_id,firstname FROM prk_user_registrations WHERE user_id=?");
			$sqlm->execute(array($user));
			// if($sqlm->rowCount() > 0){
			// 	$upd=$this->dbh->prepare("UPDATE users SET login=NOW() WHERE name=?");
			// 	$upd->execute(array($user));
			// }
		}
		$data = array();
		$sql=$this->dbh->prepare("SELECT * FROM prk_user_registrations  WHERE user_type_id=? or user_type_id=?");
		$sql->execute(array(3,5));
		while($r = $sql->fetch()){
			$data["all"][] = array(
				'name' =>$r['user_id'],
				'firstname' => $r['firstname'],
				'avatar' => $base_url.$r['profile_pic'],
				'login' => 1,
				'status' => 1,
			);
		}
		$data["chat"] = $this->get_message("users", "all", $user);

		//print_r($data["chat"]);
		return $data;
	}
	
	function get_user($user, $property_id){

		//echo $property_id;
		$base_url = "http://" . $_SERVER['SERVER_NAME'].'/public/images/user-profile/';
		$sqlmp=$this->dbh->prepare("SELECT user_id FROM prk_add_property WHERE property_id=?");
		$sqlmp->execute(array($property_id));
	

		if(isset($user)){
			$sqlm=$this->dbh->prepare("SELECT user_id,firstname FROM prk_user_registrations WHERE user_id=?");
			$sqlm->execute(array($user));
			// if($sqlm->rowCount() > 0){
			// 	$upd=$this->dbh->prepare("UPDATE users SET login=NOW() WHERE name=?");
			// 	$upd->execute(array($user));
			// }
		}
		$data = array();
		if(!empty($property_id)) {
		$sql=$this->dbh->prepare("SELECT * FROM prk_user_registrations where user_id = ?");
		$sql->execute(array($sqlmp->fetch()['user_id']));
		} else {
		$sql=$this->dbh->prepare("SELECT * FROM prk_user_registrations WHERE user_type_id=? or user_type_id=?");
		$sql->execute(array(2,5));
		}


		while($r = $sql->fetch()){
			$data["all"][] = array(
				'name' =>$r['user_id'],
				'firstname' => $r['firstname'],
				'avatar' => $base_url.$r['profile_pic'],
				'login' => 1,
				'status' => 1,
			);
		}
		$data["chat"] = $this->get_message("users", "all", $user);

		//print_r($data["chat"]);
		return $data;
	}
	
	function send_message($name, $ke, $message, $image, $date, $avatar, $tipe){		
	
		$data = array();
		$sql=$this->dbh->prepare("INSERT INTO messages (name,ke,avatar,message,image,tipe,date) VALUES (?,?,?,?,?,?,?)");
		$sql->execute(array($name,$ke,$avatar,$message,$image,$tipe,$date));
		$data['status'] = 'success';
		return $data;
	}
	
	function user_logout($name){
		$data = array();
		$user = $this->dbh->prepare("UPDATE users SET status=? WHERE name=?");
		$user->execute(array('offline',$name));
		$data['status'] = 'success';
		return $data;
	}
	
	// upload image
	function arrayToBinaryString($arr) {
		$str = "";
		foreach($arr as $elm) {
			$str .= chr((int) $elm);
		}
		return $str;
	}

	function createImg($string, $name, $type){
		$im = imagecreatefromstring($string); 
		if($type == 'image/png'){
				imageAlphaBlending($im, true);
				imageSaveAlpha($im, true);
			imagepng($im, $this->imageDir.'/'.$name);
		}else if($type == 'image/gif'){
			imagegif($im, $this->imageDir.'/'.$name);
		}else{
			imagejpeg($im, $this->imageDir.'/'.$name);
		}
		imagedestroy($im);
	}
	
}
