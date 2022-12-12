<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Response;
use CodeIgniter\API\ResponseTrait;

// use App\Models\EmrModel;
use App\Models\ResponseModel;

class Tracker extends BaseController
{

    use ResponseTrait;

    function __construct() {

        $this->cache = \Config\Services::cache();
        $this->ResponseModel = new ResponseModel();
    //     $this->EmrModel = new EmrModel();
    }

    public function log(){

        $request = service('request');
        helper('form');

        $rules = [
            'user' => 'required',
            'long' => 'required',
            'lat' => 'required',
            'type' => 'required'
        ];

        if(!$this->validate($rules)){
            return $this->ResponseModel->send('error',400,$this->validator->getErrors());
        } else {
            $data = [
                'user' => $this->request->getVar('user'),
                'long' => $this->request->getVar('long'),
                'lat' => $this->request->getVar('lat'),
                'type' => $this->request->getVar('type')
            ];
        }
        if ( $data['type'] == 'emr') {
            $this->cache->save('emr_'.$data['user'], $data, 300);
        } else {
            $this->cache->save('user_'.$data['user'], $data, 300);
        }
         
        return $this->ResponseModel->send('success',200,'Location updated successfully');
        // $foo = $this->cache->get('foo');
        // echo $foo;
        // echo $this->cache->get();
    }

    public function get(){

    }

    private function checkExist(){

    }

    private function update(){

    }
   


    

}
