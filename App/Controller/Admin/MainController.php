<?php 

namespace App\Controller\Admin;

use App\Core\Auth;
use Core\Controller;

class MainController extends Auth
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
       return $this->loadView('admin/main',[
         'title'=>'Trang Admin MVC',
         'template' =>'home'
       ]);
    }
}


?>