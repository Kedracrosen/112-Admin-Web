<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Response;

// use \App\Libraries\Oauth;
// use \OAuth2\Request;
use CodeIgniter\API\ResponseTrait;
use App\Models\EmrModel;
use App\Models\ResponseModel;
use App\Models\CallModel;
use App\Models\RescueModel;
use App\Models\UserModel;
use App\Models\ReportModel;

class Emr extends BaseController
{

    use ResponseTrait;

    function __construct() {
        $this->ResponseModel = new ResponseModel();
        $this->EmrModel = new EmrModel();
    }

    public function register() {

        $request = service('request');
        helper('form');
        $data = [];

        if ( $request->getMethod() != 'post' ) 
            return $this->fail('Only post request is allowed');

        
        $rules = [
            'firstname' => 'required|min_length[3]|max_length[20]',
            'lastname' => 'required|min_length[3]|max_length[20]',
            'mobile' =>  'required|min_length[11]|max_length[11]|is_unique[users.mobile]',
            'email' => 'required|valid_email|is_unique[users.email]'
        ];

        if(!$this->validate($rules)){
            return $this->ResponseModel->send('error',400,$this->validator->getErrors());
        } else {

            $emr = [
                'firstname' => $this->request->getVar('firstname'),
                'lastname' => $this->request->getVar('lastname'),
                'email' => $this->request->getVar('email'),
                'mobile' => $this->request->getVar('mobile'),
                'app_id' => md5($this->request->getVar('mobile').$this->request->getVar('email'))
            ];
            $emr_id = $this->EmrModel->insert($emr);
            $emr['id'] = $emr_id;

            // $data = [ 'status' => 'success', 'response' => $emr ];
            return $this->ResponseModel->send('success',201,'emr registration successful',$emr);
        }

    }

    public function login() {

        $request = service('request');
        helper('form');

        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required'
        ];

        if(!$this->validate($rules)) {
            return $this->ResponseModel->send('error',400,$this->validator->getErrors());
        } else {

            $emr = [
                'email' => $this->request->getVar('email'),
                'password' => $this->request->getVar('password')
            ];

            if( $this->EmrModel->validateLogin($emr) ) {

                $emr_data = $this->EmrModel->where('email', $this->request->getVar('email'))->first();
                // $emr_app_id = [
                //     'app_id' => $this->request->getVar('app_id')
                // ];
                // // echo $this->request->getVar('app_id');
                // $emr_update = $this->EmrModel->update($emr_id, $emr_app_id);

                $emr_data['session_id'] = $this->EmrModel->createSession($emr['email']);
                unset($emr_data['password']);
                unset($emr_data['category']); unset($emr_data['status']); unset($emr_data['created']);
                return $this->ResponseModel->send('success',200,'Login successful',$emr_data);

            } else {
                return $this->ResponseModel->send('error',400,'Invalid Login credentials');

            }
            // $this->EmrModel->validateLogin($emr);


        }

    }


    public function request_password_reset() {
        $request = service('request');
        helper('form');

        $rules = [
            'email' => 'required|valid_email'
        ];

        if(!$this->validate($rules)) {
            return $this->ResponseModel->send('error',400,$this->validator->getErrors());
        } else {
            
           if ( $this->EmrModel->verifyAccount( $this->request->getVar('email') ) ){
                $id = $this->EmrModel->getEmr($this->request->getVar('email'))[0]->id;
                                        // ->where('email', $this->request->getVar('email') );
                // echo json_encode($id);
                return $this->ResponseModel->send('success',200,'A reset OTP of "2020" has been sent to your email address', [ 'user_id' => $id ]);
            }
            return $this->ResponseModel->send('error',400,'No record found for '.$this->request->getVar('email'));

        }
    }


    public function update_password() {
        $request = service('request');
        helper('form');

        $rules = [
            'email' => 'required|valid_email',
            'OTP' => 'required|min_length[4]',
            'user_id' => 'required',
            'new_password' => 'required'
        ];

        if(!$this->validate($rules)) {
            return $this->ResponseModel->send('error',400,$this->validator->getErrors());
        } else {
            if( $this->request->getRawInput()['OTP'] == 2020 ) {

                $emr = [
                    'password' => $this->request->getRawInput()['new_password']
                ];

                // $password_hash = $this->EmrModel->getEmr($emr['email'])[0]->password;
                // // echo $password_hash;
                // if( password_verify($emr['old_password'], $password_hash) ) {
                //     return $this->ResponseModel->send('error',400,'Invalid OTP entered');
                // }

                $emr_update = $this->EmrModel->update($this->request->getRawInput()['user_id'], $emr);

                // echo json_encode($emr);

                if ( $emr_update ){
                    return $this->ResponseModel->send('success',200,'Password update successful');
                }
                
            } else {
                return $this->ResponseModel->send('error',400,'Invalid OTP entered');
            }

        }

    }

    public function fetch_profile() {
        $request = service('request');
        helper('form');

        $rules = [
            'user_id' => 'required',
            'session_id' => 'required'
        ];

        if(!$this->validate($rules)) {
            return $this->ResponseModel->send('error',400,$this->validator->getErrors());
        } else {
            if ( !$this->EmrModel->verifySession($this->request->getVar('session_id'), 'id', $this->request->getVar('user_id') ) ) {
                return $this->ResponseModel->send('error',401, 'Session deos not exist.');
            } 

            $emr_data = $this->EmrModel->where('id', 13)->first();
            unset( $emr_data['password'] );

            return $this->ResponseModel->send('success',200,'Emr profile fetched successfully',$emr_data);

        }
    }


    public function logout() {

        $request = service('request');
        helper('form');

        $rules = [
            'user_id' => 'required',
            'session_id' => 'required'
        ];

        if(!$this->validate($rules)) {
            return $this->ResponseModel->send('error',400,$this->validator->getErrors());
        } else {
            if ( $this->EmrModel->verifySession($this->request->getVar('session_id'), 'id', $this->request->getVar('user_id') ) ) {
                $this->EmrModel->destroySession( $this->request->getVar('user_id') );
                return $this->ResponseModel->send('success', 200, 'Session destroyed successfully!');
            } else {
                return $this->ResponseModel->send('error',401, 'Session deos not exist');
            }

        }

    }

    public function emergencies() {
        // $request = service('request');
        // helper('form');

        $rules = [
            'user_id' => 'required',
            'session_id' => 'required'
        ];

        if(!$this->validate($rules)) {
            return $this->ResponseModel->send('error',400,$this->validator->getErrors());
        } else {
            if ( !$this->EmrModel->verifySession($this->request->getVar('session_id'), 'id', $this->request->getVar('user_id') ) ) {
                return $this->ResponseModel->send('error',401, 'Session deos not exist.');
            } 

            $CallModel = new CallModel();
            $RescueModel = new RescueModel();
            $UserModel = new UserModel();

            $emergencies = $CallModel->where('emr_id',$this->request->getVar('user_id'))->findAll();

            $i = 0;
            foreach( $emergencies as $emergency ) {
                $emergencies[$i]['category'] =  $RescueModel->getRescueCategories('single',$emergency['category'])[0]->name;
                // $UserModel->where('id', $emergencies[$i]['user_id']);
                $emergencies[$i]['user_data'] = $UserModel->where('id', $emergencies[$i]['user_id'])->findAll()[0];
                unset($emergencies[$i]['user_data']['password']); unset($emergencies[$i]['user_data']['registered']); unset($emergencies[$i]['user_data']['session_id']);
                $i++;
            }


            // echo json_encode( $emergencies );
            return $this->ResponseModel->send('success',200,'Emergencies fetched successfully',$emergencies);


            // return;

            // $emr_data = $this->EmrModel->where('id', 13)->first();
            // unset( $emr_data['password'] );

            // return $this->ResponseModel->send('success',200,'Emr profile fetched successfully',$emr_data);

        }
    }

    public function create_report(){

        $rules = [
            'emr_id' => 'required',
            'call_id' => 'required',
            'report_body' => 'required'
        ];

        if(!$this->validate($rules)){
            return $this->ResponseModel->send('error',400,$this->validator->getErrors());
        } else {
            $ReportModel = new ReportModel();
            $report_data = [
                'call_id' => $this->request->getVar('call_id'),
                'emr_id' => $this->request->getVar('emr_id'),
                'report' => $this->request->getVar('report_body')
            ];
            if($ReportModel->insert($report_data)){
                return $this->ResponseModel->send('Success',200,'Report saved',$report_data);
            } else {
                return $this->ResponseModel->send('error',500,'Unable to save report');
            }
        }

    }

    public function fetch_report(){

        $rules = [
            'call_id' => 'required'
        ];

        if(!$this->validate($rules)){
            return $this->ResponseModel->send('error',400,$this->validator->getErrors());
        } else {
            $ReportModel = new ReportModel();
            $report = $ReportModel->where('call_id', $this->request->getVar('call_id'))->findAll();
            // echo json_encode( $report );
            if( $report ){
                return $this->ResponseModel->send('Success',200,'Report fetched',$report);
            } else {
                return $this->ResponseModel->send('error',404,'No report found');
            }
        }
    }

}
