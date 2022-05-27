<?php include_once 'gpconfig.php';
if(isset($_GET['code'])){  
	$gclient->authenticate($_GET['code']);  
	$_SESSION['token'] = $gclient->getAccessToken();  
	header('Location: ' . filter_var($redirect_url, FILTER_SANITIZE_URL));
}
if (isset($_SESSION['token'])) {  
	$gclient->setAccessToken($_SESSION['token']);
}
if ($gclient->getAccessToken()) {  
	include 'config.php';

	$gpuserprofile = $google_oauthv2->userinfo->get();  
	$nama = $gpuserprofile['given_name']." ".$gpuserprofile['family_name']; // Ambil nama dari Akun Google  
	$email = $gpuserprofile['email']; // Ambil email Akun Google nya

	  $sql = $pdo->prepare("SELECT id, username, nama FROM user WHERE email=:a");  
	  $sql->bindParam(':a', $email);  
	  $sql->execute();

	$user = $sql->fetch(); // Ambil datanya dari hasil query tadi  
	if(empty($user)){
		    $ex = explode('@', $email); // Pisahkan berdasarkan "@"    
		    $username = $ex[0];

		$sql = $pdo->prepare("INSERT INTO user(email, nama, username) VALUES(:email, :nama, :username)");   
	    $sql->bindParam(':email', $email);
	    $sql->bindParam(':nama', $nama);
	    $sql->bindParam(':username', $username);    
	    $sql->execute();

	$id = $pdo->lastInsertId(); // Ambil id user yang baru saja di insert  
	}
	else{    
	$id = $user['id']; // Ambil id pada tabel user    
	$username = $user['username']; // Ambil username pada tabel user    
	$nama = $user['nama']; 
}
$_SESSION['id'] = $id;  
$_SESSION['username'] = $username;  
$_SESSION['nama'] = $nama;    
$_SESSION['email'] = $email;    
header("location: user/index.php");
} 
else {  
	$authUrl = $gclient->createAuthUrl();  
	header("location: ".$authUrl);
}
?>