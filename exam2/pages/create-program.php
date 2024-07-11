<?php
	session_start();
    include_once('../helpers/auth.php');
    include_once('../helpers/social-media-collection.php');
    include_once('../config/db.php');
    include_once('../services/DataService.php');
    protectedpage();

    $conn = new Db();
    $dataService = new DataService($conn);
    $modules = $dataService->getAllModules();

    if(isset($_POST['name'])) {
		$name = $_POST['name'];
		$degree = $_POST['degree'];
		$duration_full_time = $_POST['duration_full_time'];
		$duration_part_time = $_POST['duration_part_time'];
        $highlights = $_POST['highlights'];
		$starting_months = $_POST['starting_months'];
		$content = $_POST['content'];
		$logo_url = $_POST['logo_url'];
		$facilities = $_POST['facilities'];
		$social_info = $_POST['social_info'];
		$modulesReq = $_POST['modules'];
        $fees = $_POST['fees'];
        $faqs = $_POST['faqs'];
        $requirements = $_POST['requirements'];


        $programSaved = $dataService->createProgram(
                $name,
                $degree,
                $duration_full_time,
                $duration_part_time,
                $highlights,
                $starting_months,
                $content,
                $logo_url,
                $facilities,
                $social_info,
                $modulesReq,
                $fees,
                $faqs,
                $requirements
        );

		if($programSaved) {
            header("Location: home.php");
		}
		
	}
?>

<?php include_once("./../shared/header.php"); ?>
<?php include_once("./../shared/navbar.php"); ?>
<section class="app-container">
    <?php include_once("./../shared/navigation.php"); ?>
	<form method="POST"
          id="create-program-form"
          class="create-program-form custom-form"
          action="create-program.php"
          onsubmit="onCreateProgramSubmit(event)"
    >
	  <div class="form-group">
	    <label>Name</label>
	    <input type="text" name="name" class="form-control" required>
	  </div>
	  <div class="form-group">
	    <label>Degree</label>
          <select name="degree" class="form-control">
              <option value="msc">Master</option>
              <option value="bsc">Bachelor</option>
              <option value="phd">Doctor</option>
          </select>
	  </div>
	  <div class="form-group">
	    <label>Full Time Duration</label>
	    <input type="number" name="duration_full_time" class="form-control" min="5" max="100" required>
	  </div>
	  <div class="form-group">
	    <label>Part Time Duration</label>
	    <input type="number" name="duration_part_time" class="form-control" min="5" max="100">
	  </div>
	  <div class="form-group">
	    <label>Modules (Select multiple)</label>
          <div class="form-group modules-wrapper">
              <?php
              foreach ($modules as $key => $value) {
                  echo '
                    <div class="form-check">
                        <input name="modules[]" class="form-check-input" type="checkbox" value="'.$value['id'].'" id="'.$value['id'].'">
                        <label class="form-check-label" for="'.$value['id'].'">
                        '.$value['code'].' -- '.$value['name'].' ('.$value['credits'].' Creds)
                        </label>
                    </div>
                  ';
              }
              ?>
          </div>
	  </div>
	  <div class="form-group">
	    <label>Highlights</label>
          <textarea name="highlights" class="form-control"></textarea>
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
	    <input type="url" name="logo_url" class="form-control" required>
	  </div>
	  <div class="form-group">
	    <label>Facilities</label>
	    <input type="text" name="facilities" class="form-control" required>
	  </div>
	  <input type="hidden" name="social_info" class="social_info" value="" />
      <label>Social Media</label>
	  <div class="form-group replicate-rows-wrapper">
	    <div class="row g-3 item-row">
		  <div class="col-auto">
              <select name="socialMediaName" class="form-control">
                  <?php
                    foreach (getSocialMediaCollection() as $item){
                       echo "<option value='{$item}'>{$item}</option>";
                    }
                  ?>
              </select>
		  </div>
		  <div class="col-auto">
		    <input name="socialMediaLink" type="url" class="form-control" placeholder="Link">
		  </div>
		  <div class="col-auto">
		    <button type="button" class="btn btn-primary mb-3  fa-solid fa-plus add-new-btn" onclick="addOneSocialMedia(event)">
			</button>
		  </div>
		</div>
	  </div>
      <label>Fees</label>
      <div class="form-group">
            <div class="replicate-rows-wrapper" data-counter="0">
                <div class="row g-3 item-row">
                    <div class="col-auto">
                        <label>Location</label>
                        <input name="fees[0][location]" type="text" class="form-control" placeholder="Leave empty for remote">
                    </div>
                    <div class="col-auto">
                        <label>Duration</label>
                        <select name="fees[0][duration]" class="form-control">
                            <option value="full_time">Full Time</option>
                            <option value="part_time">Part Time</option>
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
        <label>FAQs</label>
      <div class="form-group">
          <div class="replicate-rows-wrapper" data-counter="0">
              <div class="row g-3 item-row">
                  <div class="col-auto">
                      <label>FAQ</label>
                      <input name="faqs[0][question]" type="text" class="form-control">
                  </div>
                  <div class="col-auto">
                      <label>Answer</label>
                      <textarea name="faqs[0][answer]"  class="form-control"></textarea>
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
        <label>Requirements</label>
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
        <button type="SUBMIT-FORM" class="btn btn-primary save-button">Save</button>
    </form>
</section>

<?php include_once("./../shared/footer.php"); ?>