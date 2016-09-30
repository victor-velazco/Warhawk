<?php

class UploadModel extends CI_Model {

    private function generatePassword() {
        $alpha = "abcdefghijklmnopqrstuvwxyz";
        $alpha_upper = strtoupper($alpha);
        $numeric = "0123456789";
        $special = ".-+=_,!@$#*%<>[]{}";
        $chars = "";
         
        // default [a-zA-Z0-9]{9}
        $chars = $alpha . $alpha_upper . $numeric . $special;
        $length = 9;
         
        $len = strlen($chars);
        $pw = '';
         
        for ($i=0;$i<$length;$i++)
                $pw .= substr($chars, rand(0, $len-1), 1);
         
        // the finished password
        return (str_shuffle($pw));
    }

    private function getUserName($fName, $lName) {
        return strtolower(substr($fName, 0, 1) . str_replace(' ', '', $lName));
    }

    function upload($request) {
        if(isset($request['file']['name'])) {
            $config['upload_path'] = 'uploads/';
            $config['allowed_types'] = 'csv';
            $fullname = $request['file']['name'];
            $extPos = stripos($fullname, '.', strlen($fullname)-5);
            $name = substr($fullname, 0, $extPos);
            $extension = substr($fullname, $extPos);
            $right_now = date('YmdHis');
            $finalName = $name . $right_now . $extension;
            $config['file_name'] = $finalName;
            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('file')) {
                /*If no upload*/
                $error = $this->upload->display_errors();
                $res_array = array("result"=>500, "message"=>$error);
                return $res_array;

            } else {
                /*If upload*/
                $resMsg = "File ". $fullname ." uploaded successfully, with a size of : " . $this->upload->data('file_size') . 'Kbytes';
                $data['file'] = $this->upload->data();
                $final_file_name = $data['file']['full_path'];/*full path of file*/
                // unlink($file);/*Delete file, is not necessary*/
                $dbconnect = $this->load->database();
                $startDT = microtime(true);
                $array_data = array("file_name" => $final_file_name, "uploaded_dt" => date('Y-m-d H:i:s'), "uploaded_by" => 1 );
                $this->db->insert('uploads', $array_data);
                $upload_id = $this->db->insert_id();

                ini_set('auto_detect_line_endings',TRUE);
                $file_csv = fopen($final_file_name,"r");
                if ($file_csv === FALSE) {
                    $res_array = array("result"=>500, "message"=>"File " . $final_file_name . " could not be opened.");
                    return $res_array;
                }
                $returnStr ="";
                $index=0;
                $all_file = array();
                $inserts_array = array();
                $universities = 0;
                $universities_array = array();
                $records_inserted = 0;
                $last_university = "";
                while (($data_file = fgetcsv($file_csv)) !== FALSE) {
                    $queryStr = array (
                        "upload_id" => $upload_id, "university" => $data_file[0], 
                        "first_name" => $data_file[1], "last_name" => $data_file[2], 
                        "email" => $data_file[3], "gender" => $data_file[4], 
                        "status" => $data_file[5], "graduation_year" => $data_file[6], 
                        "country_of_origin" => $data_file[7], "current_country" => $data_file[8], 
                        "current_city" => $data_file[9], "occupation" => $data_file[10], 
                        "company" => $data_file[11], "highest_level_of_education" => $data_file[12]);
                    if ($index==0 && strtolower($data_file[0])=='university') {
                        // Skip it.
                    } else {
                        //print_r($data_file[9]);
                        error_log($data_file[9]);
                        $this->db->insert("data_uploads", $queryStr);
                        $records_inserted += $this->db->affected_rows();
                        $all_file[] = $data_file;
                        if ($last_university=="") {
                            $last_university=$data_file[0];
                            $universities_array[$universities] = $data_file[0];
                            $universities++;
                        } else if ($last_university!=$data_file[0]) {    
                                $universities_array[$universities] = $data_file[0];
                                $universities++;
                        }
                    }
                    $index++;
                }
                fclose($file_csv);
                // Getting all the data for catalogs
                $genders = $this->db->query('select gender from genders order by gender_id')->result_array();
                $statuses = $this->db->query('select status from statuses order by status_id')->result_array();
                $countries = $this->db->query('select country_code, country_name from countries order by country_id')->result_array();
                $cities = $this->db->query('select city_name from cities order by city_id')->result_array();
                $occupations = $this->db->query('select description from occupations order by occupation_id')->result_array();
                $companies = $this->db->query('select company_name from companies order by company_id')->result_array();
                $education_levels = $this->db->query('select level from education_levels order by education_level_id')->result_array();
                $cities_qry = "";

                foreach ($all_file as $key => $student) {
                    $gender_found = false;
                    $status_found = false;
                    $country_found = false;
                    $city_found = false;
                    $occupation_found = false;
                    $company_found = false;
                    $level_found = false;
                    // Searching Genders
                    if ($genders==null || sizeof($genders) == 0) {
                        $array_data = array("gender" => $student[4]);
                        $this->db->insert('genders', $array_data);
                        $genders[] = array("gender"=>$student[4]);
                    } else {
                        foreach ($genders as $key => $gender) {
                           if ($gender['gender']==$student[4]) {
                                $gender_found = true;
                                break;
                           }
                        }
                        if (!$gender_found) {
                            $array_data = array("gender" => $student[4]);
                            $this->db->insert('genders', $array_data);
                            $genders[] = array("gender"=>$student[4]);
                        }
                    }
                    //Searching Statuses
                    if ($statuses==null) {
                        $array_data = array("status" => $student[5]);
                        $this->db->insert('statuses', $array_data);
                        $statuses[] = array("status"=>$student[5]);
                    } else {
                        foreach ($statuses as $key => $status) {
                           if (strtolower($status['status'])==strtolower($student[5])) {
                                $status_found = true;
                                break;
                           }
                        }
                        if (!$status_found) {
                            $array_data = array("status" => $student[5]);
                            $this->db->insert('statuses', $array_data);
                            $statuses[] = array("status"=>$student[5]);
                        }
                    }
                    //Searching Countries (Origin)
                    if ($countries==null) {
                        $array_data = array("country_name" => $student[7]);
                        $this->db->insert('countries', $array_data);
                        $countries[] = array("country_name"=>$student[7]);
                    } else {
                        foreach ($countries as $key => $country) {
                           if (strtolower($country['country_name'])==strtolower($student[7])) {
                                $country_found = true;
                                break;
                           }
                        }
                        if (!$country_found) {
                            $array_data = array("country_name" => $student[7]);
                            $this->db->insert('countries', $array_data);
                            $countries[] = array("country_name"=>$student[7]);
                        }
                    }
                    //Searching Countries (Current)
                    if ($countries==null) {
                        $array_data = array("country_name" => $student[8]);
                        $this->db->insert('countries', $array_data);
                        $countries[] = array("country_name"=>$student[8]);
                    } else {
                        foreach ($countries as $key => $country) {
                           if (strtolower($country['country_name'])==strtolower($student[8])) {
                                $country_found = true;
                                break;
                           }
                        }
                        if (!$country_found) {
                            $array_data = array("country_name" => $student[8]);
                            $this->db->insert('countries', $array_data);
                            $countries[] = array("country_name"=>$student[8]);
                        }
                    }
                    //Searching Cities
                    // Prepare the country search.
                    $sqlGetCountry = "SELECT country_id FROM countries WHERE country_name = '".$student[8]."'";
                    $countryFromDB = $this->db->query($sqlGetCountry)->row();
                    if ($cities==null) {
                        $array_data = array("city_name" => $student[9], "country_id" => $countryFromDB->country_id);
                        // Find the country first to have the Id of the country where this city belongs to
                        $this->db->insert('cities', $array_data);
                        $cities[] = array("city_name"=>$student[9]);
                    } else {
                        foreach ($cities as $key => $city) {
                           if (strtolower($city['city_name'])==strtolower($student[9])) {
                                $city_found = true;
                                break;
                           }
                        }
                        if (!$city_found) {
                            $array_data = array("city_name" => $student[9], "country_id" => $countryFromDB->country_id);
                            $this->db->insert('cities', $array_data);
                            $cities_qry .= $this->db->last_query();
                            $cities[] = array("city_name"=>$student[9]);
                        }
                    }
                    //Searching Occupations
                    if ($occupations==null) {
                        $array_data = array("description" => $student[10]);
                        $this->db->insert('occupations', $array_data);
                        $occupations[] = array("description"=>$student[10]);
                    } else {
                        foreach ($occupations as $key => $occupation) {
                           if (strtolower($occupation['description'])==strtolower($student[10])) {
                                $occupation_found = true;
                                break;
                           }
                        }
                        if (!$occupation_found) {
                            $array_data = array("description" => $student[10]);
                            $this->db->insert('occupations', $array_data);
                            $occupations[] = array("description"=>$student[10]);
                        }
                    }
                    //Searching Companies
                    if ($companies==null) {
                        $array_data = array("company_name" => $student[11]);
                        $this->db->insert('companies', $array_data);
                        $companies[] = array("company_name"=>$student[11]);
                    } else {
                        foreach ($companies as $key => $company) {
                           if (strtolower($company['company_name'])==strtolower($student[11])) {
                                $company_found = true;
                                break;
                           }
                        }
                        if (!$company_found) {
                            $array_data = array("company_name" => $student[11]);
                            $this->db->insert('companies', $array_data);
                            $companies[] = array("company_name"=>$student[11]);
                        }
                    }
                    //Searching Education Levels
                    if ($education_levels==null) {
                        $array_data = array("level" => $student[12]);
                        $this->db->insert('education_levels', $array_data);
                        $education_levels[] = array("level"=>$student[12]);
                    } else {
                        foreach ($education_levels as $key => $level) {
                           if (strtolower($level['level'])==strtolower($student[12])) {
                                $level_found = true;
                                break;
                           }
                        }
                        if (!$level_found) {
                            $array_data = array("level" => $student[12]);
                            $this->db->insert('education_levels', $array_data);
                            $education_levels[] = array("level"=>$student[12]);
                        }
                    }
                }

                $genders = $this->db->query('select gender_id,gender from genders order by gender_id')->result_array();
                $statuses = $this->db->query('select status_id,status from statuses order by status_id')->result_array();
                $countries = $this->db->query('select country_id, country_code, country_name from countries order by country_id')->result_array();
                $cities = $this->db->query('select city_id, city_name, country_id from cities order by city_id')->result_array();
                $occupations = $this->db->query('select occupation_id, description from occupations order by occupation_id')->result_array();
                $companies = $this->db->query('select company_id, company_name from companies order by company_id')->result_array();
                $education_levels = $this->db->query('select education_level_id, level from education_levels order by education_level_id')->result_array();

                // Once we're sure the catalog info is updated, we need to insert the data into
                // PERSONS and ALUMNI tables
                $gral_errors = "";
                foreach ($all_file as $key => $student) {
                    // Insert into PERSONS
                    $g_id = FALSE;
                    foreach ($genders as $key => $gender) {
                        if (strtolower($gender['gender'])==strtolower($student[4])) {
                            $g_id = $gender['gender_id'];
                            break;
                        }
                    }
                    if ($g_id!=FALSE) {
                        $username = $this->getUserName($student[1], $student[2]);
                        $password = $this->generatePassword();
                        $person_array = array('first_name' => $student[1], 'last_name' => $student[2], 'email' => $student[3], 
                            'username' => $username, 'password' => $password,  
                            'gender_id' => $g_id, 'profile_id' => 2);
                        $this->db->insert('persons', $person_array);
                        // Insert into ALUMNI
                        // Search for status Id
                        $s_id = FALSE;
                        foreach ($statuses as $key => $status) {
                           if (strtolower($status['status'])==strtolower($student[5])) {
                                $s_id = $status['status_id'];
                                break;
                           }
                        }
                        // Search for Current country Id
                        $c_id = FALSE;
                        foreach ($countries as $key => $country) {
                           if (strtolower($country['country_name'])==strtolower($student[8])) {
                                $c_id = $country['country_id'];
                                break;
                           }
                        }
                        // Search for city Id
                        $cy_id = FALSE;
                        foreach ($cities as $key => $city) {
                           if (strtolower($city['city_name'])==strtolower($student[9])) {
                                $cy_id = $city['city_id'];
                                break;
                           }
                        }
                        // Search for Origin country Id
                        $origc_id = FALSE;
                        foreach ($countries as $key => $country) {
                           if (strtolower($country['country_name'])==strtolower($student[7])) {
                                $origc_id = $country['country_id'];
                                break;
                           }
                        }
                        
                        // Search for occupation Id
                        $o_id = FALSE;
                        foreach ($occupations as $key => $occupation) {
                           if (strtolower($occupation['description'])==strtolower($student[10])) {
                                $o_id = $occupation['occupation_id'];
                                break;
                           }
                        }
                        // Search for Company Id
                        $comp_id = FALSE;
                        foreach ($companies as $key => $company) {
                           if (strtolower($company['company_name'])==strtolower($student[11])) {
                                $comp_id = $company['company_id'];
                                break;
                           }
                        }
                        // Search for Education Level Id
                        $el_id = FALSE;
                        foreach ($education_levels as $key => $level) {
                           if (strtolower($level['level'])==strtolower($student[12])) {
                                $el_id = $level['education_level_id'];
                                break;
                           }
                        }
                        if ($s_id!=FALSE && $c_id!=FALSE && $cy_id!=FALSE && $o_id!=FALSE && $comp_id!=FALSE && $el_id!=FALSE) {
                            $alumni_array = array('person_id'=>$this->db->insert_id(), 'status_id'=>$s_id, 'university'=>$student[0], 
                            'graduation_yr'=>$student[6], 'origin_country_id'=>$origc_id, 'current_country_id'=>$c_id, 'current_city_id'=>$cy_id, 'occupation_id'=>$o_id, 
                            'company_id'=>$comp_id, 'education_level_id'=>$el_id, 'authorized' => 1);
                            $this->db->insert('alumni', $alumni_array);
                        } /*else {
                            if ($s_id==FALSE) {
                                $gral_errors .= "Status: " . $student[5] . ", for ".$student[1].". not found in DB.<br />";
                            } elseif ($c_id==FALSE) {
                                $gral_errors .= "Country: " . $student[8] . ", for ".$student[1].". not found in DB.<br />";
                            } elseif ($cy_id==FALSE) {
                                $gral_errors .= "City: " . $student[9] . ", for ".$student[1].". not found in DB.<br />";
                            } elseif ($o_id==FALSE) {
                                $gral_errors .= "Occupation: " . $student[10] . ", for ".$student[1].". not found in DB.<br />";
                            } elseif ($comp_id==FALSE) {
                                $gral_errors .= "Company: " . $student[11] . ", for ".$student[1].". not found in DB.<br />";
                            } elseif ($el_id==FALSE) { 
                                $gral_errors .= "Education level: " . $student[12] . ", for ".$student[1].". not found in DB.<br />";
                            }
                        }*/
                    }

                }
                /*
                if (strlen($gral_errors)>1) {
                    $res_array = array("result"=>200, "message"=>$gral_errors);
                    return $res_array;
                } else {*/
                    // Return final result.
                    $res_array = array("result"=>200, "message"=>$resMsg);
                    return $res_array;
                //}
            }
        } else {
            $res_array = array("result"=>500, "message"=>"Please fill all data in the inputs to continue");
            return $res_array;
        }
    }
}
