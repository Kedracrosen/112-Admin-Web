<?php namespace App\Models;

use CodeIgniter\Model;

class RescueModel extends Model{

    protected $table = 'rescue_users';
    protected $primaryKey = 'id';
    // protected $allowedFields = ['firstname', 'lastname', 'email', 'mobile', 'password', 'dob', 'blood_type', 'height', 'weight', 'allergies', 'session_id'];

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

    public function getRescueCategories( $type = 'all', $id = 'null'){
        $db = \Config\Database::connect();
        if( $type == 'single') {
            $query = $db->query('SELECT * FROM `rescue_team_category` WHERE `id`="'.$id.'"');
        } else {
            $query = $db->query('SELECT * FROM `rescue_team_category`');
        }
        return $query->getResult(); 
    }
    // public function getRescue
    public function getRescueTeam($category_id) {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM `rescue_team` WHERE `category`="'.$category_id.'" ');
        return $query->getResult();
    }

}