<?php namespace App\Models;

use CodeIgniter\Model;

class EmrCategoryModel extends Model{

    protected $table = 'rescue_team_category';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'details'];

    protected $useTimestamps = false;
    protected $createdFeild = 'date';
       
}