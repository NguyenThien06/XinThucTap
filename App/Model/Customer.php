<?php 

namespace App\Model;

use Core\Model;

class Customer extends Model
{
    protected $table ="customer";
    public function insert($data)
    {
       return $this->getLastId($data, $this->table);
    }
}

?>