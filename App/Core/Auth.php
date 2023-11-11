<?php 

namespace App\Core;

use App\Model\User;
use Core\Controller;
use Core\Helper;

class Auth extends Controller
{
    public $user;
    public function __construct()
    {
        if(isset($_COOKIE['username'])){
            $model = new User(); # kiểm tra cái pasword trên cookie một lần nữa
            
            $this->user = $model->get($_COOKIE['username']);
            if(is_null($this->user)){
                return Helper::redirect('/admin/login');
            }
            if($this->user['password'] != $_COOKIE['password']){
                return Helper::redirect('/admin/login');
            }
        }

        if(!isset($_COOKIE['username'])){
             return Helper::redirect('/admin/login');
        }
    }
}


?>