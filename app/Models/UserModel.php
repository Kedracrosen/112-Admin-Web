<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['firstname', 'lastname', 'email', 'mobile', 'password', 'dob', 'blood_type', 'height', 'weight', 'allergies', 'session_id'];

    protected $useTimestamps = false;
    protected $createdFeild = 'registered';

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

    public function createSessionWithMobile($mobile) {
        $db = \Config\Database::connect();
        $now = date('Y-m-d h:i:s');
        $session_id = md5($now.rand());
        $query = $db->query('UPDATE users SET `session_id`="'.$session_id.'" WHERE `mobile`="'.$mobile.'" ');
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
            $query = $db->query('SELECT `session_id` FROM `users` WHERE `email`="'.$email.'"');
        } else if( $type == "mobile") {
            $mobile = $id;
            $query = $db->query('SELECT `session_id` FROM `users` WHERE `mobie`="'.$mobile.'"');
        } else {
            $id = $id;
            $query = $db->query('SELECT `session_id` FROM `users` WHERE `id`="'.$id.'"');
            // echo 1;
        }
        
        if($query->getResult()[0]->session_id == $session_id) {
            return true;
        }
        return false;
    }

    public function destroySession($id) {
        $db = \Config\Database::connect();
        $query = $db->query('UPDATE `users` SET `session_id`=NULL WHERE `id`="'.$id.'" ');
        if($query) {
            return true;
        }
        return false;
    }
}