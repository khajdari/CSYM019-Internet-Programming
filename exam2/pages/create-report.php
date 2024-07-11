<?php
	session_start();
    include_once('../helpers/auth.php');
    include_once('../helpers/social-media-collection.php');
    include_once('../config/db.php');
    include_once('../services/DataService.php');
    protectedpage();
?>
<?php include_once("./../shared/header.php"); ?>
<?php include_once("./../shared/navbar.php"); ?>

<?php
    $conn = new Db();
    $dataService = new DataService($conn);
    $programs = [];
    $programIds = $_GET['programIds'];

    /*
     * In case a programId is not assigned to the loggedIn user, we are forcing a page redirection
     * to homepage.
     *
     * !!! IMPORTANT !!!
     * This is a security mechanism (Authorisation), because all the program identifiers (id) are passed
     * using a URI parameters so they are editable and not hidden!!!!
     */
    if(!$dataService->hasAccessOnProgramIds($programIds)) {
        header("Location: /pages/home.php");
        die();
    }

    foreach ($programIds as $programId) {
        $program = $dataService->getProgramAggregatedById($programId);
        array_push($programs, $program);
    }
?>

<section class="app-container">
    <?php include_once("./../shared/navigation.php"); ?>
    <div id="reports-container" style="width: 700px; margin: 0 auto;"></div>
</section>
<?php
    /*
     * In order to have dynamic charts in our platform, we need a javascript library (ChartJs).
     * To pass all the required data that the library needs, we are using a JSON representation
     * inside a <script type='application/json'>
     *
     * This technique is called Hydration.
     *
     * Docs: https://en.wikipedia.org/wiki/Hydration_(web_development)
     */
?>
<script id="programData" type="application/json"><?php echo json_encode($programs)?></script>
<?php
/*
 * 'report.js' is the script where all the Chartjs functionality will take place after
 * the appropriate data will be passed as JSON on browsers document body element.
 *
 * report.js will do the rest using the Hydration technique!
 */
?>
<script type="text/javascript" src="/js/report.js"></script>
<?php include_once("./../shared/footer.php"); ?>