<?php 

namespace Core;

class Session
{
    public static function addFlash($key = '', $message = '')
    {
         return $_SESSION[$key] = $message;
    }
    public static function remove($key = '')
    {
        unset($_SESSION[$key]);
    }
}
?>