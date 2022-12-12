<?php namespace App\Models;

use CodeIgniter\Model;

class CallModel extends Model{

    protected $table = 'calls';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'emr_id', 'type', 'category', 'status', 'user_lat', 'user_long', 'emr_lat', 'emr_long', 'user_address', 'emr_address', 'channel_id', 'report'];

    protected $useTimestamps = false;
    protected $createdFeild = 'date';

    // protected $beforeInsert = ['beforeInsert'];
    // protected $beforeUpdate = ['beforeUpdate'];


    // protected function beforeInsert(array $data) {
    //     $data = $this->passwordHash($data);
    //     return $data;
    // }

    // protected function beforeUpdate(array $data) {
    //     $data = $this->passwordHash($data);
    //     return $data;
    // }

}