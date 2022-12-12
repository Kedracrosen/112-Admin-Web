<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Response;

// use \App\Libraries\Oauth;
// use \OAuth2\Request;
// use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use App\Models\TwiloModel;
use App\Models\ResponseModel;
use App\Models\RescueModel;
use App\Models\CallModel;
use App\Models\EmrModel;

class User extends BaseController
{

    // use ResponseTrait;

    function __construct() {
        $this->ResponseModel = new ResponseModel();
        $this->UserModel = new UserModel();
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
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]',
            'confirm_password' => 'required|matches[password]'
        ];

        if(!$this->validate($rules)){
            return $this->ResponseModel->send('error',400,$this->validator->getErrors());
        } else {

            $user_model = new UserModel();
            $user = [
                'firstname' => $this->request->getVar('firstname'),
                'lastname' => $this->request->getVar('lastname'),
                'email' => $this->request->getVar('email'),
                'mobile' => $this->request->getVar('mobile'),
                'password' => $this->request->getVar('password')
            ];
            $user_id = $user_model->insert($user);
            $user['id'] = $user_id;
            unset($user['password']);

            // $data = [ 'status' => 'success', 'response' => $user ];
            return $this->ResponseModel->send('success',201,'User registration successful',$user);
        }

    }


    public function quick_register() {
        $request = service('request');
        if( $request->getMethod() != 'post' ) {
            return $this->ResponseModel->send('error',401,'Only post request is allowed');
        }
        if( empty($this->request->getVar('mobile')) || strlen($this->request->getVar('mobile')) != 11 ){
            return $this->ResponseModel->send('error',400,'Invalid mobile number');
        }
        $TwiloModel = new TwiloModel();
        if( $TwiloModel->sendOTP($this->request->getVar('mobile')) ) {
            return $this->ResponseModel->send('success',200,'OTP sent successfully');
        }
        return $this->responseModel->send('error',503,'Service is currently unavailable');
    }


    public function otp_verify() {
        $request = service('request');
        if( $request->getMethod() != 'post' ) {
            return $this->ResponseModel->send('error',401,'Only post request is allowed');
        }

        if( empty($this->request->getVar('mobile')) || strlen($this->request->getVar('mobile')) != 11 ){
            return $this->ResponseModel->send('error',401,'Invalid mobile number');
        }

        if( empty($this->request->getVar('otp'))){
            return $this->ResponseModel->send('error',401,'OTP cannot be empty');
        }

        $TwiloModel = new TwiloModel();
        if( $TwiloModel->verifyOTP($this->request->getVar('mobile'), $this->request->getVar('otp')) ) {

            $mobile = trim($this->request->getVar('mobile'));
            $user = $this->UserModel->where('mobile', $mobile)->first();

            if(empty($user)) {
                return $this->ResponseModel->send('success',200,'OTP Verification successful', ['account_status' => 'unregistered']);
            }

            $session_id = $this->UserModel->createSessionWithMobile($mobile);
            return $this->ResponseModel->send('success',200,'OTP Verification successful', ['account_status' => 'registered', 'session_id' => $session_id]);
        }

        return $this->ResponseModel->send('error',200,'OTP Verification failed');
    }


    // public function login() {
    //     $oauth = new Oauth();
    //     $request = new Request();
    //     $respond = $oauth->server->handleTokenRequest($request->createFromGlobals());
    //     $code = $respond->getStatusCode();
    //     $body = $respond->getResponseBody();
    //     if($code == 200) {
    //         $data = [ 'status' => 'success', 'response' => json_decode($body) ];
    //     } else {
    //         $data = [ 'status' => 'error', 'response' => json_decode($body) ];
    //     }

    //     return $this->respond($data, $code);
    // }


    // public function reset_password() {

    // }


    public function get_user_data($id) {

        $user_model = new UserModel();
        $user = $user_model->where('id', $id)->findAll();
        
        // return $this->respond($user, 200);
        if(!empty($user)) {

            $user = $user[0];
            if(empty($user['blood_type']) || empty($user['blood_type']) || empty($user['weight']) || empty($user['allergies']) ) {
                $user['registration_status'] = "incomplete";
            } else {
                $user['registration_status'] = "complete";
            }
            unset($user['password']); unset($user['session_id']);

            return $this->ResponseModel->send('success',200,'User data fetched successfully',$user);
        } 
        // else {
        //     $error_data = [ 'error' => 'empty_response', 'error_description' => 'No result found'];
        //     $data = [ 'status' => 'error', 'response' => $error_data ];
        //     $response_code = 404;
        // }
        return $this->ResponseModel->send('error', 404,'No user found');

    }


    public function update() {

        $request = service('request');
        helper('form');
        $data = [];
        
        $rules = [
            'firstname' => 'required|min_length[3]|max_length[20]',
            'lastname' => 'required|min_length[3]|max_length[20]',
            'mobile' =>  'required|min_length[11]|max_length[11]',
            'email' => 'required|valid_email',
            'dob' => 'required',
            'blood_type' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'id' => 'required'
        ];

        if(!$this->validate($rules)){
            return $this->ResponseModel->send('error',400,$this->validator->getErrors());
        } else {

            $user_model = new UserModel();
            $user = [
                'firstname' => $this->request->getRawInput()['firstname'],
                'lastname' => $this->request->getRawInput()['lastname'],
                'email' => $this->request->getRawInput()['email'],
                'mobile' => $this->request->getRawInput()['mobile'],
                'dob' => $this->request->getRawInput()['dob'],
                'blood_type' => $this->request->getRawInput()['blood_type'],
                'height' => $this->request->getRawInput()['height'],
                'weight' => $this->request->getRawInput()['weight'],
                'allergies' => $this->request->getRawInput()['allergies']
            ];
            // return json_encode($user);

            // $intervention = $this->UserModel->find($this->request->getVar('id'));
            $user_update = $user_model->update($this->request->getRawInput()['id'], $user);
            $user['id'] = $this->request->getRawInput()['id']; 
            if ( $user_update ){
                unset($user['password']);
                return $this->ResponseModel->send('success',200,'User update successful',$user);
            }
            return $this->ResponseModel->send('error',500,'Unable to update user data');

        }

    }

    public function logout($id) {

        $request = service('request');
        helper('form');
         
        $rules = [
            'session_id' => 'required'
        ];

        if(!$this->validate($rules)){
            return $this->ResponseModel->send('error',400,$this->validator->getErrors());
        } else {
            $user_model = new UserModel();

            if($user_model->verifySession($this->request->getVar('session_id'), 'id', $id)) {
                $user_model->destroySession($id);
                return $this->ResponseModel->send('error',500,'Logged out Successfully');
            } else {
                return $this->ResponseModel->send('error',400,'Session does not exist');
            }

        }
        
    }


    public function fetch_emr_categories() {
        

        $request = service('request');
        helper('form');

        $rules = [
            'user_id' => 'required',
            'session_id' => 'required',
        ];

        // echo $request->getVar('user_id');
        // echo $request->getVar('session_id');

        if(!$this->validate($rules)){
            return $this->ResponseModel->send('error',400,$this->validator->getErrors());
        } else {

            // $user_model = new UserModel();

            // if($user_model->verifySession($this->request->getVar('session_id'), 'id', $this->request->getVar('user_id'))) {

                $RescueModel = new RescueModel();
                $data = $RescueModel->getRescueCategories();
                return $this->ResponseModel->send('success',200,'Rescue categories fetched successfully', $data);

            // } else {
            //     return $this->ResponseModel->send('error',400,'Session does not exist');
            // }

            
        }


    } 

    public function end_call_112() {

        $rules = [
            'call_id' => 'required'
        ];

        if(!$this->validate($rules)){
            return $this->ResponseModel->send('error',400,$this->validator->getErrors());
        } else {

            $call_data = [ 'status' => 2 ];
            $CallModel = new CallModel();
            $call_id = $this->request->getVar('call_id');
            
            if( $CallModel->set($call_data)->where('id', $call_id)->update() ) {
                return $this->ResponseModel->send('success', 200, 'Call ended');
            }
            return $this->ResponseModel->send('error', 500, 'Unable to end call');

        }
    }

    public function call_112() {

        $rules = [
            'user_id' => 'required',
            'user_lat'  => 'required',
            'user_long'  => 'required',
            'user_address'  => 'required',
            'emr_id' => 'required',
            'emr_lat'  => 'required',
            'emr_long'  => 'required',
            'emr_address' => 'required',
            'category' => 'required',
            'type' => 'required',
            'user_fullname' => 'required',
            'channel_id' => 'required'
        ];

        if(!$this->validate($rules)){
            return $this->ResponseModel->send('error',400,$this->validator->getErrors());
        } else {

            $call_data = [
                'user_id' => $this->request->getVar('user_id'),
                'user_lat'  => $this->request->getVar('user_lat'),
                'user_long'  => $this->request->getVar('user_long'),
                'user_address'  => $this->request->getVar('user_address'),
                'emr_id' => $this->request->getVar('emr_id'),
                'emr_lat'  => $this->request->getVar('emr_lat'),
                'emr_long'  => $this->request->getVar('emr_long'),
                'emr_address' => $this->request->getVar('emr_address'),
                'category' => $this->request->getVar('category'),
                'type' => $this->request->getVar('type'),
                'channel_id' => $this->request->getVar('channel_id')
            ];

            $CallModel = new CallModel(); $EmrModel = new EmrModel();
            if( $CallModel->insert($call_data) ) {

                $call_id = $CallModel->getInsertID();
                $os_data = [
                    "address" => $call_data['user_address'],
                    "lattitude" => $call_data['user_long'],
                    "name" => $this->request->getVar('user_fullname'),
                    "type" => $call_data['type'],
                    "category" => $call_data['category'],
                    "longitude" => $call_data['user_lat'],
                    "channel_id" => $call_data['channel_id']
                ];

                $emr_app_id = $EmrModel->where('id', $call_data['emr_id'])->first()['app_id'];
                $this->_onsignal_call_trigger($os_data, $emr_app_id);

                $os_data['call_id'] = $call_id;

                return $this->ResponseModel->send('success', 200, 'Call placed successfully', $os_data);

            }

        }

    }

    public function emergencies(){
        // $request = service('request');
        // helper('form');
        $data = [];

        // if ( $request->getMethod() != 'get' ) 
        //     return $this->fail('Only post request is allowed');

        $rules = [
            'user_id' => 'required',
        ];

        // $call_data = [
        //     'user_id' => $this->request->getVar('user_id'),

            // return $this->request->getVar('user_id');

        if(!$this->validate($rules)){
            return $this->ResponseModel->send('error',400,$this->validator->getErrors());
        } else {

            $CallModel = new CallModel();
            $RescueModel = new RescueModel();
            $UserModel = new UserModel();

            // $data['rescue_categories'] = $RescueModel->getRescueCategories();
            $emergencies = $CallModel->where('user_id',$this->request->getVar('user_id'))->findAll();
            $i = 0;
            foreach( $emergencies as $emergency ) {
                $emergencies[$i]['category'] =  $RescueModel->getRescueCategories('single',$emergency['category'])[0]->name;
                $UserModel->where('id', $emergencies[$i]['user_id']);
                $emergencies[$i]['user_data'] = $UserModel->where('id', $emergencies[$i]['user_id'])->findAll()[0];
                unset($emergencies[$i]['user_data']['password']); unset($emergencies[$i]['user_data']['registered']); unset($emergencies[$i]['user_data']['session_id']);
                $i++;
            }

            $data = [
                "page_title" => "Emergencies",
                "page" => "emergencies",
                'emergencies' => $emergencies
            ];
            //  $data;
            return $this->ResponseModel->send('Success',200,'Emergencies fetched successfully',$emergencies);


        }

        

    }

    private function _onsignal_call_trigger($os_data, $emr_app_id) {

        $content = [ "en" => 'English Message' ];
        
        // $fields = array(
        //     'app_id' => "aece1e0b-b05c-4405-bc3e-4b3d8b6f3e78",
        //     'filters' => array(array("field" => "tag", "key" => "level", "relation" => "=", "value" => "10"),array("operator" => "OR"),array("field" => "amount_spent", "relation" => "=", "value" => "0")),
        //     'data' => array("foo" => "bar"),
        //     'contents' => $content
        // );
        $fields = array(
            'app_id' => "aece1e0b-b05c-4405-bc3e-4b3d8b6f3e78",
            "include_external_user_ids" => [ $emr_app_id ],
            "contents" => [ "en" => "Someone needs help" ],
            "headings" => [ "en" => $os_data['name'].' needs help' ],
            "ttl" => 30,
            "priority" => 10,
            "buttons" => [ ["id" => "id2", "text" => "Decline", "icon" => "ic_menu_decline" ], ["id" => "id1", "text" => "Accept", "icon" => "ic_menu_accept" ] ],
            "data" => [ "a" => $os_data ]
        );
        
        $fields = json_encode($fields);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                                                   'Authorization: Basic ZGMxZTRlZDctMDBmYy00ZGNmLTliYjEtZmFjODA5ZmI1NzBk'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);
        
        return $response;
    
    }

}