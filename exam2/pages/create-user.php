<?php
	session_start();
    include_once('../helpers/auth.php');
	include_once('../config/db.php');
	protectedpage();
?>


<?php
    $conn = new Db();
    if(isset($_POST['name'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];


		$query = "
			INSERT INTO users (name, email, password)
			VALUES 
			('".$name."', '".$email."', '".hash('sha256',$password)."')
		";

		$resp = $conn->sqlExec($query);
		if($resp) {
			header("Location: home.php");
		}
	}
?>
<?php include_once("./../shared/header.php"); ?>
<?php include_once("./../shared/navbar.php"); ?>
<section class="app-container">
    <?php include_once("./../shared/navigation.php"); ?>
	<form method="POST"
          id="create-user-form"
          action="create-user.php"
          class="custom-form"
          onsubmit="onCreateUserSubmit(event)"
    >
        <div class="alert alert-danger" role="alert" hidden>
            Passwords do not match!!
        </div>
	  <div class="form-group">
	    <label>Name</label>
	    <input type="text" name="name" class="form-control" required>
	  </div>
	  <div class="form-group">
	    <label>Email</label>
	    <input type="email" name="email" class="form-control" required>
	  </div>
	  <div class="form-group">
	    <label>Password</label>
	    <input type="password" name="password" class="form-control" required>
	  </div>
	  <div class="form-group">
	    <label>Repeat password</label>
	    <input type="password" name="password_repeat" class="form-control" required>
	  </div>
	  <button type="SUBMIT-FORM" class="btn btn-primary save-button">Save</button>
	</form>
</section>

<?php include_once("./../shared/footer.php"); ?>