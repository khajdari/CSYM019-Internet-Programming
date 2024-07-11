<?php
    /*
     * DataService is a single point of truth for data integration.
     * All SQL queries are stored here and exposed as reusable public methods
     */
    class DataService {
        private $sqlConnector;
        private $userId;

        public function __construct($sqlConnector)
        {
            $this->sqlConnector = $sqlConnector;
            $this->userId = $_SESSION['user_id'];
        }

        public function getAllModules() {
            $query = "SELECT * FROM modules";
            return $this->sqlConnector->sqlExec($query);
        }

        public function getAllUsers() {
            $query = "SELECT * FROM users";
            return $this->sqlConnector->sqlExec($query);
        }

        public function getProgramAggregatedById($programId) {
            $sql = "
                SELECT *
                FROM program
                WHERE id = ".$programId." LIMIT 1";

            $programSqlResponse = $this->sqlConnector->sqlExec($sql);


            if(count($programSqlResponse) === 0) {
                return null;
            }
            $program = $programSqlResponse[0];
            $programFaqs = $this->sqlConnector->sqlExec('
            SELECT * FROM faqs WHERE program_id = '.$program['id']);

            $programFees = $this->sqlConnector->sqlExec('
            SELECT * FROM fees WHERE program_id = '.$program['id']);

            $programRequirements = $this->sqlConnector->sqlExec('
            SELECT * FROM requirements WHERE program_id = '.$program['id']);


            $programModules = $this->sqlConnector->sqlExec('
                SELECT * FROM modules
                INNER JOIN program_modules ON program_modules.module_id = modules.id
                WHERE
                    program_modules.program_id ='.$program['id']
            );

            $program['faqs'] = $programFaqs;
            $program['fees'] = $programFees;
            $program['requirements'] = $programRequirements;
            $program['modules'] = $programModules;

            return $program;
        }

        public function getAllUserProgramsAggregated() {
            $sql = "
                SELECT id
                FROM program
                WHERE user_id = ".$this->userId;

            $programsObj = [];
            $programIds = $this->sqlConnector->sqlExec($sql);

            foreach ($programIds as $program) {
                $programObj = $this->getProgramAggregatedById($program['id']);
                array_push($programsObj, $programObj);
            }

            return $programsObj;
        }

        public function hasAccessOnProgramIds($programIds) {

            $userPrograms= $this->sqlConnector->sqlExec("
                SELECT id
                FROM program
                WHERE user_id =".$_SESSION['user_id']);

            $userProgramIds = array_map(function ($item) {
                return $item['id'];
            }, $userPrograms);

            foreach ($programIds as $programId) {
                if(!in_array($programId, $userProgramIds)) {
                    return false;
                }
            }
            return true;
        }



        public function createProgram(
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
                $modules,
                $fees,
                $faqs,
                $requirements
        ) {
            $query = "
                INSERT INTO program (user_id, name, degree, duration_full_time, duration_part_time, highlights, starting_months, content, logo_url, facilities, social_info)
                VALUES 
                ('".$this->userId."','".$name."', '".$degree."','".$duration_full_time."', '".$duration_part_time."', '".$highlights."', '".$starting_months."', '".$content."', '".$logo_url."', '".$facilities."', '".$social_info."')
		        ";

            $programResp = $this->sqlConnector->sqlExec($query);
            $programId = $this->sqlConnector->lastInsertedId;
            $modulesResp = true;
            $feesInsertRes = true;
            $faqsInsertRes = true;
            $requirementsRes = true;

            if($modules) {
                $prodramModulesQuery = '
                    INSERT INTO program_modules (program_id, module_id)
                    VALUES';
                $programModulesQueryValues = [];
                foreach ($modules as $key => $value) {
                    array_push($programModulesQueryValues, "(".$programId.", ".$value.")");

                }
                $prodramModulesQuery .= implode(",",$programModulesQueryValues);
                error_log($prodramModulesQuery);
                $modulesResp = $this->sqlConnector->sqlExec($prodramModulesQuery);
            }

            if($fees) {
                $insertRows = [];
                foreach ($fees as $key => $value) {
                    $location = $value['location'];
                    $duration = $value['duration'];
                    $pounds = $value['pounds'];
                    array_push($insertRows, "($programId, '$location', '$duration', $pounds)");
                }
                $insertFeesQuery = '
                INSERT INTO fees (program_id, location, duration, pounds)
                VALUES '.implode(', ', $insertRows).'
            ';

                $feesInsertRes = $this->sqlConnector->sqlExec($insertFeesQuery);
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

                $faqsInsertRes = $this->sqlConnector->sqlExec($insertFaqQuery);
            }

            if($requirements) {
                $insertRows = [];
                foreach ($requirements as $key ) {
                    $requirement = $key;


                    array_push($insertRows, "($programId, '$key')");
                }
                $insertRequirementsQuery = '
                INSERT INTO requirements (program_id, type)
                VALUES '.implode(', ', $insertRows).'
            ';
                error_log($insertRequirementsQuery);
                $requirementsRes = $this->sqlConnector->sqlExec($insertRequirementsQuery);
            }

            return $programResp && $modulesResp && $feesInsertRes && $faqsInsertRes && $requirementsRes;
        }
    }
?>
