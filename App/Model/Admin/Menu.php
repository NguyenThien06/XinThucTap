<?php 

namespace App\Model\Admin;

use Core\Model;

class Menu extends Model
{
    protected $table ="menu";
    public function getParent($parentId = 0)
    {
        $sql ="SELECT * from $this->table where parent_id = $parentId ";
        return $this->query($sql);
    }
    public function get()
    {
        $sql = "SELECT * from $this->table ";
        return $this->fetchArray($sql);
    }
    public function insert($data = [])
    {
      return $this->insertArray($data,$this->table);
    }
    public function show($id = 0)
    {
      $sql = "SELECT * from $this->table where id = $id";
      return $this->fetch($sql);
    }
    public function update($data = [], $id = 0)
    {
        return $this->updateArray($data, $this->table, $id);
    }
    public function delete($id =0)
    {
        $sql = "DELETE FROM $this->table where id = $id";
        return $this->query($sql);
    }

    public function getActive()
    {
        $sql = "SELECT * from $this->table where active = 1";
        return $this->query($sql);
    }
}
?>