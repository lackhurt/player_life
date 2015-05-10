<?php namespace App\Services\Modules\Users\Documents;

use Illuminate\Support\Facades\Validator;
use App\Services\Utility\Traits\ObjectToArray;

class UserDocument {
    use ObjectToArray;

    private $name;
    private $phone;
    private $password;
    private $email;
    private $qq;
    private $weixin;
    private $gender;
    private $games;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getQq()
    {
        return $this->qq;
    }

    /**
     * @param mixed $qq
     */
    public function setQq($qq)
    {
        $this->qq = $qq;
    }

    /**
     * @return mixed
     */
    public function getWeixin()
    {
        return $this->weixin;
    }

    /**
     * @param mixed $weixin
     */
    public function setWeixin($weixin)
    {
        $this->weixin = $weixin;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return array
     */
    public function getGames()
    {
        return $this->games;
    }

    /**
     * @param array $games
     */
    public function setGames($games)
    {
        $this->games = $games;
    }

    /**
     * object 转 array
     */
    function object_to_array($obj){
        $_arr = is_object($obj)? get_object_vars($obj) : $obj;
        foreach ($_arr as $key => $val) {
            $val = (is_array($val)) || is_object($val) ? object_to_array($val) : $val;
            $arr[$key] = $val;
        }

        return $arr;
    }

    public function valid() {
        return Validator::make($this->toArray, [
                'name' => 'required',
                'password' => 'required|min:8',
                'email' => 'required|email|unique:users'
            ]
        );
    }

}