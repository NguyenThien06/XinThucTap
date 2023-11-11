<?php 
namespace Core;

class Controller
{
    public function loadView($main = '', $data = [])
    {
        if(file_exists(_VIEW_ . '/'. $main . '.php' )){
           extract($data); # biến key trong mảng thành biến 
            require _VIEW_ . '/'. $main . '.php';
            return ;
        }
        die($main . 'not found');
    }
}

?>