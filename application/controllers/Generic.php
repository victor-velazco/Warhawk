<?php 
trait Generic {  
   /*
   private function _changePass($person_id,$last,$newpass){
        $dbconnect = $this->load->database();
        $this->load->model('Welcomodel');
        $result = $this->_verPass($person_id,$last);

        if($result['verified'] == true){
          $newpass = $this->_cryptPass($newpass);
          $changed = $this->Welcomodel->changePassword($person_id,$newpass);
          echo json_encode($changed);
          if($changed == true){
            $person = $this->session->userdata('persons');
            $person->pass_created = 0;  
          }
          
        }else{
          echo json_encode(array('verified' => false, 'msg' => 'Incorrect Last Password, try again'));
        }
   }

   private function _verPass($person_id,$password){
    $dbconnect = $this->load->database();
    $this->load->model('Welcomodel');
    $User = $this->Welcomodel->verifyPass2($person_id);
    if($User == False){
            $result = array('verified' => false);
        }else{
            if($this->_compPass($password, $User->password)){
                $user_data['login'] = true;
                $user_data['persons'] = $this->Welcomodel->getPersonsData2($person_id);
                $result = array('verified' => true, 'msg' => 'Correct Last Password');
            }else{
                $result = array('verified' => false, 'msg' => 'Incorrect Last Password');
            }
        }
    return $result;
  }
  private function _cryptPass($password){
    $salt = "";
    for ($i = 0; $i < 40; $i++) {
       $salt .= substr("./ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789",mt_rand(0, 63),1);
    }
    $hashed_password = crypt ($password , $salt);
    return $hashed_password;
  }
  private function _compPass($user_input,$passDb){
    if (hash_equals($passDb, crypt($user_input, $passDb))) {
        return true;
    }else{
      return false;
    }
  }
  */
  
 } 
