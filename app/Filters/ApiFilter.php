<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

use App\Models\ResponseModel;

class ApiFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $ResponseModel = new ResponseModel();
        $request = service('request');
        if( $request->getHeader('X-API-Key', '') != 'X-Api-Key: c8a54497b9ab1ed34e7b3a9cc8ea648c966fe3af') {
            // || $request->getHeader('X-API-Key') != 'X-API-Key: '.getenv("api.key")  
            echo $ResponseModel->send('error',401,'Unauthorized');
            // echo trim($request->getHeader('X-API-Key', ''));
            // echo $request->request_headers();
            die();
        }

    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}