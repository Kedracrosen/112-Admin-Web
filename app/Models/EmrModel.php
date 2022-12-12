<?php namespace App\Models;

use CodeIgniter\Model;

class EmrModel extends Model{

    protected $table = 'rescue_team';
    protected $primaryKey = 'id';
    protected $allowedFields = ['firstname', 'lastname', 'category', 'email', 'mobile', 'app_id', 'password', 'session_id'];

    protected $useTimestamps = false;
    protected $createdFeild = 'created';

    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];


    protected function beforeInsert(array $data) {
        $data = $this->passwordHash($data);
        return $data;
    }

    protected function beforeUpdate(array $data) {
        $data = $this->passwordHash($data);
        return $data;
    }

    protected function passwordHash(array $data) {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        } else if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }

    public function createSession($email, $type = 'email') {
        $db = \Config\Database::connect();
        $now = date('Y-m-d h:i:s');
        $session_id = md5($now.rand());
        $query = $db->query('UPDATE `rescue_team` SET `session_id`="'.$session_id.'" WHERE `email`="'.$email.'" ');
        if($query) {
            return $session_id;
        }
        return false;
    }

    public function verifySession($session_id,$type,$id) {
        $db = \Config\Database::connect();
        $session_id = $session_id; 

        if($type == "email") {
            $email = $id;
            $query = $db->query('SELECT `session_id` FROM `rescue_team` WHERE `email`="'.$email.'"');
        } else if( $type == "mobile") {
            $mobile = $id;
            $query = $db->query('SELECT `session_id` FROM `rescue_team` WHERE `mobie`="'.$mobile.'"');
        } else {
            $id = $id;
            $query = $db->query('SELECT `session_id` FROM `rescue_team` WHERE `id`="'.$id.'"');
            // echo 1;
        }
        
        if( !empty($query->getResult()[0]->session_id) == $session_id) {
            return true;
        }
        return false;
    }

    public function destroySession($id) {
        $db = \Config\Database::connect();
        $query = $db->query('UPDATE `rescue_team` SET `session_id`=NULL WHERE `id`="'.$id.'" ');
        if($query) {
            return true;
        }
        return false;
    }

    public function validateLogin($data) {
        $db = \Config\Database::connect();
        // $password_hash = password_hash($data['password'], PASSWORD_DEFAULT);
        $email = $data['email'];
        $query = $db->query('SELECT * FROM `rescue_team` WHERE `email`="'.$email.'"'); //AND `password`="'.$password_hash.'"
        $data_r = $query->getResult();
        if( empty($data_r) ) {
            return false;
        }
        
        $hashed_password = $data_r[0]->password;
        if( !empty($hashed_password) ) {
            if( password_verify($data['password'], $hashed_password) ) {
                return true;
            } 
        }
        return false;
    }

    public function verifyAccount($email) {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM `rescue_team` WHERE `email`="'.$email.'"'); 
        if( empty($query->getResult())){
            return false;
        }
        return true;
    }

    public function getEmr($email){
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM `rescue_team` WHERE `email`="'.$email.'"'); 
        return $query->getResult();
    }


    // public function register
       
}