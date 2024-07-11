<?php
    /*
     * Make componentization functionality for reusability using php
     *  include_once method
     */
	session_start();
    include_once('../helpers/auth.php');
    include_once('../config/db.php');
    include_once('../services/DataService.php');
	protectedpage();
?>
<?php include_once("./../shared/header.php"); ?>
<?php include_once("./../shared/navbar.php"); ?>

<?php
    $conn = new Db();
    $dataService = new DataService($conn);

	$programs = $dataService->getAllUserProgramsAggregated();
	$modules = $dataService->getAllModules();
    $users = $dataService->getAllUsers();
?>
<section class="app-container">
    <div class="actions-container">
        <a href="create-program.php" class="btn btn-primary">
            <i class="fa-solid fa-building-columns"></i>
            Create new Program <span class="badge badge-danger"><?php echo count($programs) ?></span>
        </a>
        <a href="create-module.php" class="btn btn-primary">
            <i class="fa-solid fa-book"></i>
            Create new Module <span class="badge badge-danger"><?php echo count($modules) ?></span>
        </a>
        <a href="create-user.php" class="btn btn-primary">
            <i class="fa-regular fa-user"></i>
            Create new User <span class="badge badge-danger"><?php echo count($users) ?></span>
        </a>
        <a id="generate-report-btn" href="create-report.php" class="btn btn-success" style="display: none">
            <i class="fa-solid fa-chart-simple"></i>
            Generate Report <span class="badge badge-danger"></span>
        </a>
    </div>
    <?php
        if(count($programs) === 0) {
        echo '
            <div class="alert alert-primary no-data-container " role="alert">
              Oops no data. Try creating a Program first.
            </div>
        ';
        }
    ?>
	<div>
		<table class="table <?php echo count($programs) === 0 ? 'table-hidden' : '' ?>">
		  <thead>
		    <tr>
              <th>
                  <div class="form-check">
                      <input
                              id="select-all-checkboxes"
                              class="form-check-input"
                              type="checkbox"
                              oninput="onAllCheckboxesClicked(event)"
                      >
                      <label style="width: 100px" class="form-check-label" for="select-all-checkboxes">
                          Add all
                      </label>
                  </div>
              </th>
		      <th scope="col">Name</th>
		      <th scope="col">Full Time Duration (Months)</th>
		      <th scope="col">Part Time Duration (Months)</th>
		      <th scope="col">Location</th>
		      <th scope="col">Starting Months</th>
		      <th scope="col"></th>
		      <th></th>
		    </tr>
		  </thead>
		  <tbody>
		    <?php
		    	foreach ($programs as $key => $value) {
		    		echo "
		    			<tr>
		    			    <td>
		    			        <div class='form-check'>
		    			            <input class='form-check-input select-for-report'
		    			                    type='checkbox'
		    			                    id='checkbox-program-{$programs[$key]['id']}'
		    			                    oninput='onProgramCheckboxTrigger({$programs[$key]['id']})'
		    			            />
		    			            <label class='form-check-label'
		    			                for='checkbox-program-{$programs[$key]['id']}'
		    			            ></label>
                                </div>
                            </td>
		    				<td>{$programs[$key]['name']}</td>
		    				<td>{$programs[$key]['duration_full_time']}</td>
		    				<td>{$programs[$key]['duration_part_time']}</td>
		    				<td>{$programs[$key]['location']}</td>
		    				<td>{$programs[$key]['starting_months']}</td>
		    				<td>
		    				    <a class='link-opacity-100 link-info link-offset-2'
		    				     href='./program-details.php/{$programs[$key]['id']}'
		    				     >Details</a>
		    				</td>
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