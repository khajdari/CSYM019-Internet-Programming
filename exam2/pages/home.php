<?php
	session_start();
    include_once('../helpers/db.php');
	protectedpage();
?>
<?php include_once("./../shared/header.php"); ?>
<?php include_once("./../shared/navbar.php"); ?>

<?php
    $conn = new Db();
	$query = "SELECT * FROM program";
	$programs = $conn->sqlExec($query);

	$query = "SELECT * FROM modules";
	$modules = $conn->sqlExec($query);

    $query = "SELECT * FROM users";
    $users = $conn->sqlExec($query);
?>
<section class="app-container">
    <div>
        <a href="create-program.php" class="btn btn-danger">
            <i class="fa-solid fa-building-columns"></i>
            Create new Program <span class="badge badge-danger"><?php echo count($programs) ?></span>
        </a>
        <a href="create-module.php" class="btn btn-danger">
            <i class="fa-solid fa-book"></i>
            Create new Module <span class="badge badge-danger"><?php echo count($modules) ?></span>
        </a>
        <a href="create-user.php" class="btn btn-danger">
            <i class="fa-regular fa-user"></i>
            Create new User <span class="badge badge-danger"><?php echo count($users) ?></span>
        </a>
    </div>

	<div>
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">Image</th>
		      <th scope="col">Name</th>
		      <th scope="col">Full Time Duration</th>
		      <th scope="col">Part Time Duration</th>
		      <th scope="col">Location</th>
		      <th scope="col">Starting Months</th>
		      <th scope="col">Content</th>
		      <th scope="col">Facilities</th>
		      <th></th>
		    </tr>
		  </thead>
		  <tbody>
		    <?php 
		    	foreach ($programs as $key => $value) {
		    		echo "
		    			<tr>
		    				<td>
		    					<img src='{$programs[$key]['logo_url']}' class='logo'/>
		    				</td>
		    				<td>{$programs[$key]['name']}</td>
		    				<td>{$programs[$key]['duration_full_time']}</td>
		    				<td>{$programs[$key]['duration_part_time']}</td>
		    				<td>{$programs[$key]['location']}</td>
		    				<td>{$programs[$key]['starting_months']}</td>
		    				<td>{$programs[$key]['content']}</td>
		    				<td>{$programs[$key]['facilities']}</td>
		    				<td>
		    					<form type='SUBMIT' method='POST' class='delete-form' action='delete-program.php'>
		    						<input type='hidden' name='program-id' value='{$programs[$key]['id']}' />
		    						<button type='submit' class='btn btn-danger' onClick='onDelete(event)'>
		    						   <i class='fa-solid fa-trash'></i>
                                    </button>
		    					</form>
	    					</td>
		    			<tr>
		    		";
		    	}
		    ?>
		  </tbody>
		</table>

	</div>
</section>

<?php include_once("./../shared/footer.php"); ?>