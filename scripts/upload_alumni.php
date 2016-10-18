<?php
    function __autoload($classname) {
        $filename = "../db/". $classname .".php";
        include_once($filename);
    }
    ini_set("auto_detect_line_endings", true);
    $mySQLConnection = new MySQLClass(DB_SERVER, DB_NAME, DB_USERNAME, DB_PASSWORD);

    if ( 0 < $_FILES['file']['error'] ) {
        echo json_encode('Error: ' . $_FILES['file']['error'] . '<br>');
    }
    else {
        $startDT = microtime(true);
    	$fullname = $_FILES['file']['name'];
    	$extPos = stripos($fullname, '.', strlen($fullname)-5);
    	$name = substr($fullname, 0, $extPos);
    	$extension = substr($fullname, $extPos);
    	$right_now = date('YmdHis');
        $finalName = '../uploads/' . $name . $right_now . $extension;
        move_uploaded_file($_FILES['file']['tmp_name'], $finalName);
    	
            // Insert data into DB
        $array_data = array("file_name" => $finalName, "uploaded_dt" => date('Y-m-d H:i:s'), "uploaded_by" => 1 );
        $mySQLConnection->insert_array("uploads", $array_data);
        $upload_id = mysql_insert_id();

        $file = fopen($finalName,"r");
        $returnStr ="";
        $index=0;
        $all_file = array();
        $inserts_array = array();
        $universities = 0;
        $universities_array = array();
        $records_inserted = 0;
        $last_university = "";
        while (($data = fgetcsv($file)) !== FALSE) {
            $queryStr = array (
                "upload_id" => $upload_id, "university" => mysql_real_escape_string($data[0]), 
                "first_name" => mysql_real_escape_string($data[1]), "last_name" => mysql_real_escape_string($data[2]), 
                "email" => mysql_real_escape_string($data[3]), "gender" => mysql_real_escape_string($data[4]), 
                "status" => mysql_real_escape_string($data[5]), "graduation_year" => mysql_real_escape_string($data[6]), 
                "country_of_origin" => mysql_real_escape_string($data[7]), "current_country" => mysql_real_escape_string($data[8]), 
                "current_city" => mysql_real_escape_string($data[9]), "occupation" => mysql_real_escape_string($data[10]), 
                "company" => mysql_real_escape_string($data[11]), "highest_level_of_education" => mysql_real_escape_string($data[12]));
            if ($index==0 && strtolower($data[0])=='university') {
                // Skip it.
            } else {
                $mySQLConnection->insert_array("data_uploads", $queryStr);
                $records_inserted += mysql_affected_rows();
                $all_file[] = $data;
                if ($last_university=="") {
                    $last_university=$data[0];
                    $universities_array[$universities] = $data[0];
                    $universities++;
                } else if ($last_university!=$data[0]) {    
                        $universities_array[$universities] = $data[0];
                        $universities++;
                }
            }
            $index++;
        }
        fclose($file);
        // Data has been loaded into temporary tables, now we have to put all of them in the proper catalog tables.
        // Load cataloges
        $genders = $mySQLConnection->sql_general('select gender from genders order by gender_id');
        $statuses = $mySQLConnection->sql_general('select status from statuses order by status_id');
        $countries = $mySQLConnection->sql_general('select country from countries order by country_id');
        $cities = $mySQLConnection->sql_general('select city_name from cities order by city_id');
        $occupations = $mySQLConnection->sql_general('select description from occupations order by occupation_id');
        $companies = $mySQLConnection->sql_general('select company_name from companies order by company_id');
        $education_levels = $mySQLConnection->sql_general('select level from education_levels order by education_level_id');
        $genders_to_insert = array();
        $statuses_to_insert = array();
        $countries_to_insert = array();
        $cities_to_insert = array();
        $occupations_to_insert = array();
        $companies_to_insert = array();
        $education_levels_to_insert = array();
        $grand_array = array();
        // Now get the Ids for each record, if not exists, then insert the proper data, and get the Id.
        echo json_encode($all_file);
        /*
        foreach ($all_file as $key => $student) {
            $gender_found = false;
            $status_found = false;
            $country_found = false;
            $city_found = false;
            $occupation_found = false;
            $company_found = false;
            $level_found = false;
            // Searching Genders
            if ($genders==null) {
                $genders[] = array("gender"=>$student[4]);
                $genders_to_insert[] = $student[4];
            } else {
                foreach ($genders as $key => $gender) {
                   if (in_array($student[4], $gender)) {
                        $gender_found = true;
                        break;
                   }
                }
                if (!$gender_found) {
                    $gender[] = array("gender"=>$student[4]);
                    $genders_to_insert[] = $student[4];
                }
            }
            error_log(print_r($genders_to_insert));
            // Actually insert the Genders needed!
            //$mySQLConnection->insert_array("genders", $queryStr);
            //Searching Statuses
            /*
            if ($statuses==null) {
                $statuses[] = array("status"=>$student[5]);
                $statuses_to_insert[] = $student[5];
            } else {
                foreach ($statuses as $key => $status) {
                   if (in_array($student[5], $status)) {
                        $status_found = true;
                        break;
                   }
                }
                if (!$status_found) {
                    $statuses[] = array("status"=>$student[5]);
                    $statuses_to_insert[] = $student[5];
                }
            }

            // Searching countries
            if ($countries==null) {
                $countries[] = array("country"=>$student[7]);
                $countries_to_insert[] = $student[7];
            } else {
                foreach ($countries as $key => $country) {
                   if (in_array($student[7], $country)) {
                        $country_found = true;
                        break;
                   }
                }
                if (!$country_found) {
                    $countries[] = array("country"=>$student[7]);
                    $countries_to_insert[] = $student[7];
                }
            }
            // Searching countries (For diferent column)
            $country_found = false;
            if ($countries==null) {
                $countries[] = array("country"=>$student[8]);
                $countries_to_insert[] = $student[8];

            } else {
                foreach ($countries as $key => $country) {
                   if (in_array($student[8], $country)) {
                        $country_found = true;
                        break;
                   }
                }
                if (!$country_found) {
                    $countries[] = array("country"=>$student[8]);
                    $countries_to_insert[] = $student[8];

                }
            }
            // Searching Cities
            if ($cities==null) {
                $cities[] = array("city_name"=>$student[9]);
                $cities_to_insert[] = $student[9];

            } else {
                foreach ($cities as $key => $city) {
                   if (in_array($student[9], $city)) {
                        $city_found = true;
                        break;
                   }
                }
                if (!$city_found) {
                    $cities[] = array("city_name"=>$student[9]);
                    $cities_to_insert[] = $student[9];
                }
            }
            // Searching Occupations
            if ($occupations==null) {
                $occupations[] = array("description"=>$student[10]);
                $occupations_to_insert[] = $student[10];
            } else {
                foreach ($occupations as $key => $occupation) {
                   if (in_array($student[10], $occupation)) {
                        $occupation_found = true;
                        break;
                   }
                }
                if (!$occupation_found) {
                    $occupations[] = array("description"=>$student[10]);
                    $occupations_to_insert[] = $student[10];
                }
            }
            // Searching Companies
            if ($companies==null) {
                $companies[] = array("company_name"=>$student[11]);
                $companies_to_insert[] = $student[11];
            } else {
                foreach ($companies as $key => $company) {
                   if (in_array($student[11], $company)) {
                        $company_found = true;
                        break;
                   }
                }
                if (!$company_found) {
                    $companies[] = array("company_name"=>$student[11]);
                    $companies_to_insert[] = $student[11];
                }
            }
            // Searching Education Levels
            if ($education_levels==null) {
                $education_levels[] = array("level"=>$student[12]);
                $education_levels_to_insert[] = $student[12];
            } else {
                foreach ($education_levels as $key => $level) {
                   if (in_array($student[12], $level)) {
                        $level_found = true;
                        break;
                   }
                }
                if (!$level_found) {
                    $education_levels[] = array("level"=>$student[12]);
                    $education_levels_to_insert[] = $student[12];
                }
            }
            
        }
        $grand_array[] = $genders_to_insert;
        $grand_array[] = $statuses_to_insert;
        $grand_array[] = $countries_to_insert;
        $grand_array[] = $cities_to_insert;
        $grand_array[] = $occupations_to_insert;
        $grand_array[] = $companies_to_insert;
        $grand_array[] = $education_levels_to_insert;
        echo json_encode($grand_array);
        // echo "File successfully inserted in: " . microtime(true) - $startDT ." milliseconds.";
        */
    }
?>