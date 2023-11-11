<?php 

namespace App\Model;

use Core\Model;

class Main extends Model
{
    
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
       $sql = "SELECT * from andang" ;
       $result = $this->fetch($sql);
       return $result;

    }
}

?>