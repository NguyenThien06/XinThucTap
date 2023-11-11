<?php
namespace App\Model;



use Core\Model;

class User extends Model
{
    public function get($email = '')
    {
      $sql = "SELECT * FROM user where email = '". $email ."'";
      $result = $this->fetch($sql);
      if(is_null($result)) return NULL;
      return $result;
    }
}
?>