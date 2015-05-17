<?php
/**
 * Created by PhpStorm.
 * User: spf
 * Date: 15-5-17
 * Time: 下午12:34
 * 用户信息页面
 */

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;

class InfoController extends Controller
{

    //基础信息
    public function getBase() {


        return '这是基础信息页面';
    }

    //头像
    public function getAvatar() {
        return 22;
    }

    //真实身份
    public function getIdentify() {

    }

    //联系方式
    public function getContract() {

    }

    //游戏人生
    public function getGame() {

    }

    //游戏生涯
    public function getCareer() {

    }


    //游戏简历
    public function Resume() {

    }
}
