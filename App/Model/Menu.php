<?php 

namespace App\Model;

use Core\Model;

class Menu extends Model
{
  protected $table = 'menu';
  public function get()
  {
        $sql ="SELECT * from $this->table where active =1 && parent_id = 0 order by id desc";
        return $this->query($sql);
  }
  public function show($id = 0)
  {
    $sql = "SELECT * from $this->table where active = 1 && id =$id ";
    return $this->fetch($sql);
  }
  public function getChild($id)
  {
    $sql = "SELECT * from $this->table where active = 1 && parent_id = $id";
    return $this->query($sql);
  }
}
