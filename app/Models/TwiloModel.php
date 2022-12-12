<?php namespace App\Models;

use CodeIgniter\Model;
use Twilio\Rest\Client;

class TwiloModel extends Model{

    public function sendOTP($mobile) {

        if( empty($mobile) ) {
            return false;
        }

        $mobile = $this->formatMobile($mobile);
        
        $sid = getenv("TWILIO_ACCOUNT_SID");
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio = new Client($sid, $token);

        $verification = $twilio->verify->v2->services(getenv("TWILO_SERVICE_SID"))
                                      ->verifications
                                      ->create($mobile, "sms");

        if ( $verification->status == "pending" ) {
            return true;
        }
        return false;

    }

    public function verifyOTP($mobile, $code) {
        
        if( empty($mobile) ) {
            return false;
        }

        $mobile = $this->formatMobile($mobile);

        $sid = getenv("TWILIO_ACCOUNT_SID");
        $token = getenv("TWILIO_AUTH_TOKEN");
        $twilio = new Client($sid, $token);

        $verification_check = $twilio->verify->v2->services(getenv("TWILO_SERVICE_SID"))
                                                ->verificationChecks
                                                ->create($code, ["to" => $mobile ] );

        if ($verification_check->status == "approved"){
            return true;
        }
        return false;
    }

    private function formatMobile($mobile){
        if(strlen($mobile) == 11){
            $mobile = substr($mobile, 1);
        }
        return '+234'.$mobile;
        
    }

}