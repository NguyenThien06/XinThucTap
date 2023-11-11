<?php 

namespace App\Model;

use Core\Model;

class Slider extends Model
{
    protected $table = 'slider';
    public function get()
    {
      $sql ="SELECT * from $this->table where active =1 order by id desc";
      return $this->query($sql);
    }
}



?>