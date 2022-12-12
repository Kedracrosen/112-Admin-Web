<?php namespace App\Models;

use CodeIgniter\Model;

class LogModel extends Model{

    protected $table = 'log';
    protected $primaryKey = 'id';
    protected $allowedFields = ['type', 'actor_id', 'action'];

    protected $useTimestamps = false;
    protected $createdFeild = 'time';

    public function create($id,$action,$type) {
        $db = \Config\Database::connect();
        $query = $db->query("INSERT into `log` (`type`,`actor_id`,`action`) VALUES ('$type','$id','$action' ");
        if($query) {
            return true;
        }
        return false;
    }

    // private function _get_log_message($action) {
    //     switch ($action) {
    //         case 'login':
    //             $action = "Logged in";
    //           break;
    //         case 'logout':
    //             $action = "Logged out";
    //           break;
    //         case 'add_emr':
    //             $action = "Added new emergency responder";
    //           break;
    //         default:
    //           $action = 'No switch to handle the log';
    //       }
    //       return $action;
    // } 
}