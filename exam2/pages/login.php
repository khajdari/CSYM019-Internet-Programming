<?php
session_start(); 
include_once('../helpers/auth.php');
include_once('../config/db.php');
if(isLoggedIn()) {
	header('Location: home.php');
	die();
}
?>
<?php
    $conn = new Db();
	if(isset($_POST['email']) && isset($_POST['password'])) {
		$email = $_POST['email'];
		$passwordHash = hash('sha256', $_POST['password']);

		$query = "
			SELECT * FROM users
			WHERE email='{$email}'
			AND password='{$passwordHash}'
		";
		$resp = $conn->sqlExec($query);
		if(count($resp) > 0) {
			$_SESSION['user_id'] = $resp[0]['id'];
			$_SESSION['user_name'] = $resp[0]['name'];
			header("Location: home.php");
		} else {
			header("Location: login.php?error=1");
		}
		
		die();
	}
?>

<?php include_once("./../shared/header.php"); ?>
<?php include_once("./../shared/navbar.php"); ?>

<div class="app-container">
			<?php 
				if(isset($_GET['error'])) {
					echo '
							<div class="alert alert-danger" role="alert">
							 Wrong credentials, please try again
							</div>
					';
				}
			?>
	<h2>Login</h2>
	<form action="login.php" method="POST">
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Email address</label>
		    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
		    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputPassword1" class="form-label">Password</label>
		    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
		  </div>
		 
		  <button type="submit" class="btn btn-primary">Login</button>
	</form>
</div>



<?php include_once("./../shared/footer.php"); ?>