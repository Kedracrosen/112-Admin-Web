<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Response;

use \App\Libraries\Oauth;
use \OAuth2\Request;
use CodeIgniter\API\ResponseTrait;

class Api extends BaseController
{

    use ResponseTrait;
	// public function index()
	// {
	// 	echo 'this api base';
	// }
    public function register() {

        $request = service('request');
        if ( $request->getMethod() == 'post' ) {
            echo $request->getHeader('Content-Type');
        } else {
            echo 'invalid request';
        }

        // echo 'this is register';
        // $request->getHeader('host');
        

    }

    public function login() {
        $oauth = new Oauth();
        $request = new Request();
        $respond = $oauth->server->handleTokenRequest($request->createFromGlobals());
        $code = $respond->getStatusCode();
        $body = $respond->getResponseBody();
        return $this->respond(json_decode($body), $code);
    }

    public function reset_password() {

    }

    public function get_user_data() {
        
    }

    public function update_user() {

    }

    private function _send_response($output) {

        $response = service('response');

        $response->setStatusCode(Response::HTTP_OK);
        $response->setBody($output);
        $response->setHeader('Content-type', 'application/json');
        $response->noCache();

        // Sends the output to the browser
        // This is typically handled by the framework
        $response->send();

    }
}
