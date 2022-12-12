<?php
namespace App\Validation;
use App\Models\AdminModel;
// use App\Models\UserModel;

class UserRules
{
    // public function validateuser(string $str, string $feilds, array $data ){
    //     $model = new UserModel();
    //     $user = $model->where('email', $data['email'])
    //                   ->first();
        
    //     if(!$user)
    //         return false;

    //     return password_verify($data['password'], $user['password']);
    // }

    public function validateadmin(string $str, string $feilds, array $data ){
        $model = new AdminModel();
        $user = $model->where('email', $data['email'])
                      ->first();
        
        if(!$user)
            return false;

        return password_verify($data['password'], $user['password']);
    }

    public function validateuserwithmobile() {
        
    }
}