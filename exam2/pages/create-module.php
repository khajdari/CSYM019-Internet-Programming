<?php
	session_start(); 
	include_once('../helpers/db.php'); 
	protectedpage();
?>
<?php include_once("./../shared/header.php"); ?>
<?php include_once("./../shared/navbar.php"); ?>

<?php
    $conn = new Db();
    if(isset($_POST['name'])) {
		$name = $_POST['name'];
		$credits = $_POST['credits'];
		$description = $_POST['description'];
		$status = $_POST['status'];
        $code = $_POST['code'];

		$query = "
			INSERT INTO modules (name, credits, description, status, code)
			VALUES 
			('".$name."', '".$credits."', '".$description."', '".$status."', '".$code."')
		";

		$resp = $conn->sqlExec($query);
		if($resp) {
			header("Location: home.php");
		} else {
			
		}
		
	}
?>



<section class="app-container">
    <?php include_once("./../shared/navigation.php"); ?>
	<form method="POST"
          id="create-module-form"
          class="create-module-form"
          action="create-module.php"
    >
	  <div class="form-group">
	    <label>Name</label>
	    <input type="text" name="name" class="form-control" required>
	  </div>
	  <div class="form-group">
	    <label>Credits</label>
	    <input type="number" name="credits" class="form-control" required min="5">
	  </div>
	  <div class="form-group">
	    <label>Description</label>
          <textarea name="description" class="form-control" required></textarea>
	  </div>
	  <div class="form-group">
	    <label>Status</label>
	    <input type="text" name="status" class="form-control" required />
	  </div>
	  <div class="form-group">
	    <label>Code</label>
	    <input type="text" name="code" class="form-control" required />
	  </div>

	  <button type="SUBMIT-FORM" class="btn btn-primary">Save</button>
	</form>
</section>

<?php include_once("./../shared/footer.php"); ?>