<?php
	session_start();
    include_once('../helpers/db.php');
    protectedpage();
?>
<?php include_once("./../shared/header.php"); ?>
<?php include_once("./../shared/navbar.php"); ?>

<?php
    $conn = new Db();
    $modules = $conn->sqlExec("SELECT * FROM modules;");

    if(isset($_POST['name'])) {
		$name = $_POST['name'];
		$duration_full_time = $_POST['duration_full_time'];
		$duration_part_time = $_POST['duration_part_time'];
		$location = $_POST['location'];
		$starting_months = $_POST['starting_months'];
		$content = $_POST['content'];
		$logo_url = $_POST['logo_url'];
		$facilities = $_POST['facilities'];
		$social_info = $_POST['social_info'];
		$modulesReq = $_POST['modules'];
        $fees = $_POST['fees'];
        $faqs = $_POST['faqs'];
        $requirements = $_POST['requirements'];

		$query = "
                INSERT INTO program (name, duration_full_time, duration_part_time, location, starting_months, content, logo_url, facilities, social_info)
                VALUES 
                ('".$name."', '".$duration_full_time."', '".$duration_part_time."', '".$location."', '".$starting_months."', '".$content."', '".$logo_url."', '".$facilities."', '".$social_info."')
		";

		$programResp = $conn->sqlExec($query);
        $programId =$conn->conn->insert_id;
        $modulesResp = true;
        $feesInsertRes = true;
        $faqsInsertRes = true;
        $requirementsRes = true;

        if($modulesReq) {
            $prodramModulesQuery = '
            INSERT INTO program_modules (program_id, module_id)
            VALUES';

            foreach ($modulesReq as $key => $value) {
                $prodramModulesQuery .= "(".$programId.", ".$value.")";

                if($key + 1 < count($modules)) {
                    $prodramModulesQuery .= ",";
                }
            }
            error_log($prodramModulesQuery);
            $modulesResp = $conn->sqlExec($prodramModulesQuery);
        }

        if($fees) {
            $insertRows = [];
            foreach ($fees as $key => $value) {
                $location = $value['location'];
                $type = $value['type'];
                $pounds = $value['pounds'];
                array_push($insertRows, "($programId, '$location', '$type', $pounds)");
            }
            $insertFeesQuery = '
                INSERT INTO fees (program_id, location, type, pounds)
                VALUES '.implode(', ', $insertRows).'
            ';
            error_log($insertFeesQuery);
            $feesInsertRes = $conn->sqlExec($insertFeesQuery);
        }

        if($faqs) {
            $insertRows = [];
            foreach ($faqs as $key => $value) {
                $question = $value['question'];
                $answer = $value['answer'];

                array_push($insertRows, "($programId, '$question', '$answer')");
            }
            $insertFaqQuery = '
                INSERT INTO faqs (program_id, question, answer)
                VALUES '.implode(', ', $insertRows).'
            ';

            $faqsInsertRes = $conn->sqlExec($insertFaqQuery);
        }

        if($requirements) {
//            $insertRows = [];
//            foreach ($requirements as $key ) {
//                $requirement = $key;
//
//
//                array_push($insertRows, "($programId, '$key')");
//            }
//            $insertRequirementsQuery = '
//                INSERT INTO requirements (program_id, type)
//                VALUES '.implode(', ', $insertRows).'
//            ';
//            error_log($insertRequirementsQuery);
//            $requirementsRes = $conn->sqlExec($insertRequirementsQuery);
        }

		if($programResp && $modulesResp && $feesInsertRes && $faqsInsertRes && $requirementsRes) {
			header("Location: home.php");
		} else {
			
		}
		
	}
?>

<section class="app-container">
    <?php include_once("./../shared/navigation.php"); ?>
	<form method="POST"
          id="create-program-form"
          class="create-program-form"
          action="create-program.php"
          onsubmit="onCreateProgramSubmit(event)"
    >
	  <div class="form-group">
	    <label>Name</label>
	    <input type="text" name="name" class="form-control" required>
	  </div>
	  <div class="form-group">
	    <label>Full Time Duration</label>
	    <input type="number" name="duration_full_time" class="form-control" min="5" max="100" required>
	  </div>
	  <div class="form-group">
	    <label>Part Time Duration</label>
	    <input type="number" name="duration_part_time" class="form-control" min="5" max="100" required>
	  </div>
	  <div class="form-group">
	    <label>Modules (Select multiple)</label>
          <select name="modules[]" class="form-select" multiple>
              <?php
              foreach ($modules as $key => $value) {
                  echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
              }
              ?>
          </select>
	  </div>

	  <div class="form-group">
	    <label>Location</label>
	    <input type="text" name="location" class="form-control" >
	  </div>
	  <div class="form-group">
	    <label>Starting Months</label>
	    <input type="text" name="starting_months" class="form-control" required>
	    <small class="form-text text-muted">example: Sept, Oct</small>
	  </div>
	  <div class="form-group">
	    <label>Content</label>
	    <input type="text" name="content" class="form-control" required>
	  </div>
	  <div class="form-group">
	    <label>Logo url</label>
	    <input type="text" name="logo_url" class="form-control" required>
	  </div>
	  <div class="form-group">
	    <label>Facilities</label>
	    <input type="text" name="facilities" class="form-control" required>
	  </div>
	  <input type="hidden" name="social_info" class="social_info" value="" />
	  <div class="form-group replicate-rows-wrapper">
	    <div class="row g-3 item-row">
		  <div class="col-auto">
		    <input name="socialMediaName" type="text" class="form-control" placeholder="Social media Name">
		  </div>
		  <div class="col-auto">
		    <input name="socialMediaLink" type="text" class="form-control" placeholder="Link">
		  </div>
		  <div class="col-auto">
		    <button type="button" class="btn btn-primary mb-3  fa-solid fa-plus add-new-btn" onclick="addOneSocialMedia(event)">
			</button>
		  </div>
		</div>
	  </div>
      <div class="form-group">
            <div class="replicate-rows-wrapper" data-counter="0">
                <div class="row g-3 item-row">
                    <div class="col-auto">
                        <label>Location</label>
                        <input name="fees[0][location]" type="text" class="form-control" placeholder="Leave empty for remote">
                    </div>
                    <div class="col-auto">
                        <label>Type</label>
                        <select name="fees[0][type]" class="form-control">
                            <option value="full-time">Full Time</option>
                            <option value="part-time">Part Time</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <label>Pounds</label>
                        <input name="fees[0][pounds]" type="number" class="form-control" placeholder="Pounds" required>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-primary add-new-btn fa-solid fa-plus" onclick="addOneFee(event)">
                        </button>
                    </div>
                </div>
            </div>
        </div>
      <div class="form-group">
          <div class="replicate-rows-wrapper" data-counter="0">
              <div class="row g-3 item-row">
                  <div class="col-auto">
                      <label>FAQ</label>
                      <input name="faqs[0][question]" type="text" class="form-control" required>
                  </div>
                  <div class="col-auto">
                      <label>Answer</label>
                      <textarea name="faqs[0][answer]"  class="form-control"  required></textarea>
                  </div>
                  <div class="col-auto">
                      <div class="col-auto">
                          <label></label>
                          <button type="button" class="btn btn-primary add-new-btn fa-solid fa-plus" onclick="addOneFaq(event)">
                          </button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
        <div class="form-group">
            <div class="replicate-rows-wrapper" data-counter="0">
                <div class="row g-3 item-row">
                    <div class="col-auto">
                        <label>Requirements</label>
                        <input name="requirements[]" type="text" class="form-control" required>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-primary add-new-btn fa-solid fa-plus" onclick="addRequirement(event)">
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <button type="SUBMIT-FORM" class="btn btn-primary">Save</button>
    </form>
</section>

<?php include_once("./../shared/footer.php"); ?>