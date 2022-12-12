<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Response;

// use \App\Libraries\Oauth;
// use \OAuth2\Request;
// use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use App\Models\AdminModel;
use App\Models\RescueModel;
use App\Models\EmrModel;
use App\Models\CallModel;
use App\Models\FirestoreModel;
use App\Models\EmrCategoryModel;

class Dashboard extends BaseController
{

    public function index() {
        $data = [
            "page_title" => "Console",
			"page" => "console"
        ];

        if(!session()->get('isLoggedIn')) {
		    return redirect()->to('console/login');
		}

        $CallModel = new CallModel();
        $RescueModel = new RescueModel();
        $EmrModel = new EmrModel();
        $UserModel = new UserModel();
        $sql = "calls.id, calls.user_id, calls.type, calls.date, calls.user_address, calls.category, calls.type, calls.type, users.firstname as u_firstname, users.lastname as u_lastname";
        $emergencies = $CallModel->select($sql)->join('users', 'calls.user_id = users.id')->orderBy('date', 'desc')->limit(10)->find();
        // $emergencies = $CallModel->findAll();
        $i = 0;
        foreach( $emergencies as $emergency ) {
            $emergencies[$i]['category'] =  $RescueModel->getRescueCategories('single',$emergency['category'])[0]->name;
            $i++;
        }
        $data['emergencies'] = $emergencies;
        $data['all_tickets'] = $CallModel->countAll();
        $data['total_emr'] = $EmrModel->countAll();
        $data['total_users'] = $UserModel->countAll();
        $data['open_tickets'] = $CallModel->where('status', 1)->countAllResults();
        $data['closed_tickets'] = $CallModel->where('status', 2)->countAllResults();

        $this->_return_view('dashboard',$data);
    }

    public function login() {
        $data = [];
        $request = service('request');
        helper('form');
        if( $request->getMethod() == 'post' ) {

            $rules = [
                'email' => 'required',
                'password' => 'required|validateadmin[email,password]'
            ];

            $errors = [
                'password' => [
                    'validateadmin' => 'Invalid login details'
                ]
            ];

            if(!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator->getErrors();
                // $data['validation'] = $this->validator;
            } else {
                
                $admin_model = new AdminModel();
                $admin_data = $admin_model->where('email', $this->request->getVar('email'))->first();
                unset($admin_data['password']);
                $session_data = [
                    'email' => $admin_data['email'],
                    'firstname' => $admin_data['firstname'],
                    'lastname' => $admin_data['lastname'],
                    'id' => $admin_data['id'],
                    'isLoggedIn' => true
                ];
                session()->set($session_data);
                return redirect()->to('/dashboard');
                // echo 'validation successful';
                // $user_data = $UserModel->fetch;
            }

        }
        // echo json_encode($data);
        // echo $this->request->getVar('password');
        // echo password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        
        $this->_return_view('login',$data,false,false,false);
        
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/console/login');
    }



    public function emergencies() {
        // if(!session()->get('isLoggedIn')) {
		//     return redirect()->to('console/login');
		// }
        $data = [];

        $CallModel = new CallModel();
        $RescueModel = new RescueModel();
        // $data['rescue_categories'] = $RescueModel->getRescueCategories();
        $page = $this->request->getVar('page_num');
        $page = ( empty($page) ) ? 1 : $page;
        $sql = "calls.id, calls.user_id, calls.type, calls.date, calls.user_address, calls.category, calls.type, calls.type, users.firstname as u_firstname, users.lastname as u_lastname";
        $emergencies = $CallModel->select($sql)->join('users', 'calls.user_id = users.id')->orderBy('date', 'desc')->paginate(10, 'num', $page);
        
        $i = 0;
        foreach( $emergencies as $emergency ) {
            $emergencies[$i]['category'] =  $RescueModel->getRescueCategories('single',$emergency['category'])[0]->name;
            $i++;
        }

        $data = [
            "page_title" => "Emergencies",
			"page" => "emergencies",
            'emergencies' => $emergencies,
            'pager' => $CallModel->pager
        ];
        $this->_return_view('emergencies',$data);
    }


    public function rescue_teams() {

        $data = [
            "page_title" => "Rescue Team",
			"page" => "rescue-team"
        ];

        $RescueModel = new RescueModel();
        $data['rescue_categories'] = $RescueModel->getRescueCategories();
        $this->_return_view('rescue_teams',$data);
    }

    public function rescue_team($id) {

        $data = [
            "page_title" => "Rescue Team",
			"page" => "rescue-team"
        ];

        $RescueModel = new RescueModel();
        $data['rescue_category'] = $RescueModel->getRescueCategories('single', $id)[0]->name;
        $data['rescue_team'] = $RescueModel->getRescueTeam($id);
        $this->_return_view('rescue_team',$data);
    }
    

    public function add_rescue_member() {

        $data = [
            "page_title" => "Rescue Team",
			"page" => "rescue-team"
        ];

        $RescueModel = new RescueModel();
        $data['rescue_categories'] = $RescueModel->getRescueCategories();
        $this->_return_view('add_rescue_member',$data);

    }

    public function add_rescue_team(){
        $data = [
            "page_title" => "Rescue Team",
			"page" => "rescue-team"
        ];

        $this->_return_view('add_rescue_team', $data);
    }

    public function register_emr() {

        $data = [
            "page_title" => "Rescue Team",
			"page" => "rescue-team"
        ];

        helper('form');

        $rules = [
            'firstname' => 'required|min_length[3]|max_length[20]',
            'lastname' => 'required|min_length[3]|max_length[20]',
            'mobile' =>  'required|min_length[11]|max_length[11]|is_unique[rescue_team.mobile]',
            'email' => 'required|valid_email|is_unique[rescue_team.email]',
            'rescue_category' => 'required'
        ];

        $RescueModel = new RescueModel();
        $data['rescue_categories'] = $RescueModel->getRescueCategories();

        if(!$this->validate($rules)){
            $data['validation_errors'] = $this->validator->getErrors();
            $this->_return_view('add_rescue_member',$data);
            // return $this->ResponseModel->send('error',400,$this->validator->getErrors());
        } else {

            $emr = [
                'firstname' => $this->request->getVar('firstname'),
                'lastname' => $this->request->getVar('lastname'),
                'email' => $this->request->getVar('email'),
                'mobile' => $this->request->getVar('mobile'),
                'category' => $this->request->getVar('rescue_category'),
                'app_id' => 'emr_'.md5($this->request->getVar('mobile').$this->request->getVar('email')),
                'password' => 'Test1234'
            ];
            $emr_model = new EmrModel();
            if( $emr_model->insert($emr) ) {
                $data['flash_message'] = 'New emergency responder added successfully!';
                $this->_return_view('add_rescue_member',$data);
            } else {
                $data['flash_message'] = 'Error adding new responder';
                $this->_return_view('add_rescue_member',$data);
            }

        }
    }

    public function register_team(){

        $data = [
            "page_title" => "Rescue Team",
			"page" => "rescue-team"
        ];
        
        helper('form');

        $rules = [
            'title' => 'required|min_length[3]',
            'details' => 'required|min_length[3]'
        ];

        if(!$this->validate($rules)){
            $data['validation_errors'] = $this->validator->getErrors();
            $this->_return_view('add_rescue_team',$data);
            // return $this->ResponseModel->send('error',400,$this->validator->getErrors());
        } else {
            $emr_c = [
                'name' => $this->request->getVar('title'),
                'details' => $this->request->getVar('details')
            ];

            $emr_c_model = new EmrCategoryModel();

            if( $emr_c_model->insert($emr_c) ) {
                $data['flash_message'] = 'New emergency category added!';
                $this->_return_view('add_rescue_team',$data);
            } else {
                $data['flash_message'] = 'Error adding emergency category';
                $this->_return_view('add_rescue_team',$data);
            }
        }

    }

    public function list_users(){

        $user_model = new UserModel();
        $page = $this->request->getVar('page_num');
        $page = ( empty($page) ) ? 1 : $page;

        $data = [
            "page_title" => "Rescue Team",
			"page" => "users",
            "users" => $user_model->orderBy('registered', 'desc')->paginate(10, 'num', $page),
            'pager' => $user_model->pager
        ];

        $this->_return_view('users',$data);

    }

    public function user_data($user_id){
        $user_model = new UserModel();
        $call_model = new CallModel();
        $emr_c_model = new EmrCategoryModel();

        $user_data = $user_model->where('id', $user_id )->first();
        if( empty($user_data) ){
            echo 'user not found';
            return;
        }
        $user_calls = $call_model->where('user_id', $user_id)->limit(10)->find();
        $emr_categories = $emr_c_model->findAll();

        $data = [
            "page_title" => "Rescue Team",
			"page" => "users",
            "user" => $user_data,
            "emergency_history" => $user_calls,
            "emergency_categories" => $emr_categories
        ];

        // echo json_encode($data);

        $this->_return_view('user',$data);

    }

    public function emergency($call_id) {
        $user_model = new UserModel();
        $call_model = new CallModel();
        $emr_model = new EmrModel();
        $emr_c_model = new EmrCategoryModel();
        $rescue_model = new RescueModel();

        // $sql = "calls.id, calls.user_id, calls.type, calls.date, calls.user_address, calls.category, calls.type, calls.type, users.firstname as u_firstname, users.lastname as u_lastname";
        // $emergencies = $CallModel->select($sql)->limit(10)->find();
        $call_data = $call_model->where('id', $call_id)->first();
        if( empty($call_data) ){
            echo 'user not found';
            return;
        }
        
        $call_data['category'] =  $rescue_model->getRescueCategories('single',$call_data['category'])[0]->name;
        
        $user_data = $user_model->where('id', $call_data['user_id'])->first();
        $emr_data = $emr_model->where('id', $call_data['emr_id'])->first();

        $data = [
            "page_title" => "Emergencies",
			"page" => "emergencies",
            "call" => $call_data,
            "emr" => $emr_data,
            "user" => $user_data
        ];
        // echo json_encode($data);
        $this->_return_view('emergency',$data);

    }

    public function chat() {
        if(!session()->get('isLoggedIn')) {
		    return redirect()->to('console/login');
		}

        $data = [
            "page_title" => "Chat",
			"page" => "chat"
        ];
        $this->_return_view('chat',$data);
    }


    public function admins() {
        if(!session()->get('isLoggedIn')) {
		    return redirect()->to('console/login');
		}


    }

    public function location(){
        if(!session()->get('isLoggedIn')) {
		    return redirect()->to('console/login');
		}

        $FirestoreModel = new FirestoreModel();
        if( !$data = $FirestoreModel->get_location(13,'user') ) {
            echo 'error';
        } else {
            echo json_encode($data);
        }
    
    }

    public function profile() {
        if(!session()->get('isLoggedIn')) {
		    return redirect()->to('console/login');
		}

        $data = [
            "page_title" => "My Profile",
			"page" => "profile",
        ];
        $this->_return_view('profile',$data);
    }


    public function activity_log() {
        if(!session()->get('isLoggedIn')) {
		    return redirect()->to('console/login');
		}

        $data = [
            "page_title" => "Activity Log",
			"page" => "log",
        ];
        $this->_return_view('log',$data);
    }

    public function emr_location($id) {

        $FirestoreModel = new FirestoreModel();
        $data = [];
        if( !$data['location'] = $FirestoreModel->get_location($id,'user') ) {
            echo 'error';
        } else {
            $data['page_title'] = 'My Location';
            $data['page'] = 'location';
            
            $this->_return_view('map_location',$data);
            // echo json_encode($data);
        }

    }


    
    private function _return_view($name, $data, $header = true, $side_nav = true, $footer = true) {

        if( $header == true ) {
            echo view('parts/header', $data);
        }

        if( $side_nav == true ) {
            echo view('parts/top_nav');
            echo view('parts/side_nav');
        }

        if ( $header != true ){
            echo view($name,$data);
        } else {
            echo view($name);
        }

        if( $footer == true ) {
            echo view('parts/footer');
        }
    }    

}
