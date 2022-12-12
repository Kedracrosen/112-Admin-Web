<?php namespace App\Models;

use CodeIgniter\HTTP\Response;

use CodeIgniter\Model;

class ResponseModel extends Model{

    public function send($status, $code, $message, array $data = []) {

        $response = service('response');
        $data = [
            'status' => $status,
            'message' => $message,
            'data' => $data
        ];

        $response->setStatusCode($code);
        $response->setBody(json_encode($data));
        $response->setHeader('Content-type', 'application/json');
        $response->noCache();

        $response->send();
    }
}