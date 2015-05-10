<?php namespace App\Services\API;

use Illuminate\Support\Facades\Validator;

class UsersAPI {

    public function isPhoneExists($phoneNo) {
        return false;
    }

    public function isEmailExists($email) {
        return false;
    }

    public function validate($userData) {
        $result = Validator::make($userData, [
            'name' => 'required',
            'password' => 'required|min:8',
        ]);

        if ($result->fails()) {
            return $result->messages();
        }
    }
}