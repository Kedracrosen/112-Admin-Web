<?php namespace App\Models;

use CodeIgniter\Model;

class ReportModel extends Model{

    protected $table = 'reports';
    protected $primaryKey = 'id';
    protected $allowedFields = ['call_id', 'emr_id', 'report' ];

    protected $useTimestamps = false;
    protected $createdFeild = 'created_at';


}