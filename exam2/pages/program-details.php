<?php
session_start();
include_once('../helpers/auth.php');
include_once('../config/db.php');
include_once('../services/DataService.php');
protectedpage();
?>
<?php include_once("./../shared/header.php"); ?>
<?php include_once("./../shared/navbar.php"); ?>


<?php
    $splittedParams = explode( '/',$_SERVER['REQUEST_URI']);
    $programId = intval($splittedParams[count($splittedParams) - 1 ]);

    $conn = new Db();
    $dataService = new DataService($conn);
    if(!$dataService->hasAccessOnProgramIds([$programId])) {
        header("Location: /pages/home.php");
        die();
    }

$program = $dataService->getProgramAggregatedById($programId);


?>



<section class="app-container">
    <?php include_once("./../shared/navigation.php"); ?>

    <div class="program-details">
        <div class="info-row-one-line">
            <img class="logo" src="<?php echo $program['logo_url'] ?>" />
        </div>
        <div class="info-row">
            <div class="info-row-item info-row-item--left">Name:</div>
            <div class="info-row-item info-row-item--right">
                <?php echo $program['name']; ?>
            </div>
        </div>
        <div class="info-row">
            <div class="info-row-item info-row-item--left">Degree:</div>
            <div class="info-row-item info-row-item--right">
                <?php
                    $degreeMappings = array(
                        "msc" => "Master",
                        "bsc" => "Bachelor",
                        "phd" => "Doctor",
                    );
                    echo $degreeMappings[$program['degree']];
                ?>
            </div>
        </div>
        <div class="info-row">
            <div class="info-row-item info-row-item--left">Full Time Duration:</div>
            <div class="info-row-item info-row-item--right">
                <b><?php echo $program['duration_full_time']; ?></b> Months
            </div>
        </div>
        <div class="info-row">
            <div class="info-row-item info-row-item--left">Part Time Duration:</div>
            <div class="info-row-item info-row-item--right">
                <b><?php echo $program['duration_part_time'];?></b> Months
            </div>
        </div>
        <div class="info-row">
            <div class="info-row-item info-row-item--left">Highlights:</div>
            <div class="info-row-item info-row-item--right">
                <?php echo $program['highlights']; ?>
            </div>
        </div>
        <div class="info-row">
            <div class="info-row-item info-row-item--left">Starting Months:</div>
            <div class="info-row-item info-row-item--right">
                <?php echo $program['starting_months']; ?>
            </div>
        </div>
        <div class="info-row">
            <div class="info-row-item info-row-item--left">Content:</div>
            <div class="info-row-item info-row-item--right">
                <?php echo $program['content']; ?>
            </div>
        </div>
        <div class="info-row">
            <div class="info-row-item info-row-item--left">Social Info:</div>
            <div class="info-row-item info-row-item--right">
                <?php
                    $obj = json_decode($program['social_info']);
                    foreach ($obj as $key => $value) {
                        echo "<a class='social-media-link' href='{$value}'>
                            <img src='/static/images/{$key}.png'/>
                        </a>";
                    }
                ?>
            </div>
        </div>
        <div class="info-row">
            <div class="info-row-item info-row-item--left">Facilities:</div>
            <div class="info-row-item info-row-item--right">
                <?php echo $program['facilities']; ?>
            </div>
        </div>
        <div class="info-row">
            <div class="info-row-item info-row-item--left">Fees:</div>
            <div class="info-row-item info-row-item--right">
                <ul>
                    <?php
                    $durationMappings = array(
                        'full_time' => 'Full Time',
                        'part_time' => 'Part Time',
                    );
                        foreach ($program['fees'] as $fee) {
                            echo "<li>{$durationMappings[$fee['duration']]}, total: <b>{$fee['pounds']}&#xa3;</b>. At Location: {$fee['location']}</li>";
                        }
                    ?>
                </ul>
            </div>
        </div>
        <div class="info-row">
            <div class="info-row-item info-row-item--left">Modules:</div>
            <div class="info-row-item info-row-item--right">
                <div class="module-wrapper">
                    <?php
                    foreach ($program['modules'] as $module) {
                        echo "
                        <div class='module'>
                            <div class='info-row'>
                                <div class='info-row-item info-row-item--left'>Name:</div>
                                <div class='info-row-item info-row-item--right'>{$module['name']}</div>
                            </div>
                            <div class='info-row'>
                                <div class='info-row-item info-row-item--left'>Description:</div>
                                <div class='info-row-item info-row-item--right'>{$module['description']}</div>
                            </div>
                            <div class='info-row'>
                                <div class='info-row-item info-row-item--left'>Status:</div>
                                <div class='info-row-item info-row-item--right'>{$module['status']}</div>
                            </div>
                            <div class='info-row'>
                                <div class='info-row-item info-row-item--left'>Code:</div>
                                <div class='info-row-item info-row-item--right'>{$module['code']}</div>
                            </div>
                            <div class='info-row'>
                                <div class='info-row-item info-row-item--left'>Credits:</div>
                                <div class='info-row-item info-row-item--right'>{$module['credits']}</div>
                            </div>
                        </div>
                        ";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="info-row">
            <div class="info-row-item info-row-item--left">Requirements:</div>
            <div class="info-row-item info-row-item--right">
                <ol>
                    <?php
                    foreach ($program['requirements'] as $requirement) {
                        echo "<li>{$requirement['type']}</li>";
                    }
                    ?>
                </ol>
            </div>
        </div>
        <div class="info-row">
            <div class="info-row-item info-row-item--left">FAQs:</div>
            <div class="info-row-item info-row-item--right">
                <?php
                foreach ($program['faqs'] as $faq) {
                    echo "
                        <div class='faq-element'>
                            <div class='faq-question'>{$faq['question']}</div>
                            <div class='faq-answer'>{$faq['answer']}</div>
                        </div>";
                }
                ?>
            </div>
        </div>
    </div>
</section>

<?php include_once("./../shared/footer.php"); ?>
