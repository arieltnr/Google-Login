<?php 
if(isset($_SESSION['username'])){ // Jika session username ada berarti dia sudah login  
	header('location: user/index.php'); 
	}
	?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login Refactory</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="bootstrap/css/styles.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<style type="text/css">
	h3 {
		font-family: Forte;
		background-color: cyan;
	}
</style>
</head>

<body>
<div class="row">
	<center>
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="" method="post">
      <div class="modal-body col-md-5">
					<div class="panel-heading">Daftar</div>
						<input type="text" name="user" class="form-control" placeholder="Username"> <br>
						<input type="password" name="password" class="form-control" placeholder="Password"> <br>
      </div>
      <div class="modal-footer">
      	<input type="submit" name="submit" class="btn btn-primary" value="Login">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

		<div class="col-sm-3">
            <h3>Login Refactory</h3>
					<form role="form" action="" method="post">
							<div class="col-lg-8">
								<input class="form-control" placeholder="Email" name="email" type="txt" autofocus="" required="">
							</div>
							<div class="col-lg-8">
								<input class="form-control" placeholder="Password" name="pass" type="password" value="" required="">
							</div>
							<div style="margin-top: 5px;">
								<input type="submit" name="kirim" class="btn btn-block btn-success btn-sm" value="Masuk" style="margin-bottom: 5px;">
								<button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#myModal" style="margin-bottom: 5px;">Daftar</button>
							</div>
					</form>
					<a href="google.php" class="btn btn-danger btn-sm">Login With Google</a>
					<button type="button" class="btn btn-primary btn-sm">Login With FB</button> <br>
		</div><!-- /.col-->
	</center>
	<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document" style="margin-top: 12%;">
    	<div class="login-panel panel panel-default" style="width:50%;">
  			
		</div>
	</div>
  </div>
</div>

</body>
</html>

<?php
include 'config.php';

if(isset($_POST['kirim'])){
    $user = $_POST['email'];
    $pass = $_POST['pass'];
    
$sql = $conn -> query("SELECT * FROM user WHERE username = '$user' AND password = '$pass'");
    $data = $sql -> fetch_array();
    $id = $data[1];
if ($sql -> num_rows > 0){
    session_start();
    $_SESSION['username'] = $id;?>
    
    <script language="JavaScript">
	alert('Selamat Datang');
	document.location='user/index.php';
	</script>
    
<?php }
else { ?>
    <script language="JavaScript">
	alert('Username atau Password tidak sesuai!');
	document.location='index.php';
	</script>
<?php }
} ?>