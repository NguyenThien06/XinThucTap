<?php 

namespace App\Controller\Admin;

use Core\Controller;
use Core\Helper;
use Core\Session;
use App\Model\User;

class LoginController extends Controller
{
    protected $model;
    public function __construct()
    {
        if(isset($_COOKIE['username'])){
            return Helper::redirect('/admin/main');
        }
        $this->model = new User();
    }
    public function index()
    {
        return $this->loadView('admin/user/login',[
            'title' =>'Đăng nhập hệ thống'
        ]);
    }
    public function store()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $email = isset($_POST['email']) ? Helper::makeSafe($_POST['email']) : '';
            $password = isset($_POST['password']) ? Helper::makeSafe($_POST['password']) : '';
           
            if($email == '' || $password ==''){
                Session::addFlash('error', 'Vui lòng nhập đầy đủ thông tin');
                return Helper::redirect('/admin/login');
            }
            
            $user = $this->model->get($email);
            if(is_null($user)){
                Session::addFlash('error', 'Email bạn nhâp không chính xác');
                return Helper::redirect('/admin/login');
            }
            if(password_verify($password, $user['password'])){
                Session::addFlash('success', 'Đăng nhập thành công ');
                setcookie('username', $email, time() + 86400 *30,'/');;
                setcookie('password', $user['password'], time() + 86400 * 30, '/');
                return Helper::redirect('/admin/main');
            }
            Session::addFlash('error', 'Mật khẩu bạn nhập không chính xác ');
            return Helper::redirect('/admin/login');
        }
    }
}
?>