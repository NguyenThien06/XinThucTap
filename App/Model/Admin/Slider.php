<?php 

namespace App\Model\Admin;

use Core\Model;

class Slider extends Model
{
    protected $table ='slider';
    public function insert($data = [] )
    {
        return $this->insertArray($data, $this->table);
    }
    public function get()
    {
        $sql = "SELECT * from $this->table";
        return $this->query($sql);
    }

    public function show($id =0)
    {
        $sql = "SELECT * from $this->table where id = $id";
        return $this->fetch($sql);
    }
    public function update($data = [], $id=0)
    {
        return $this->updateArray($data, $this->table, $id);
    }

    public function delete($data = [], $id = 0)
    {
       $link = _PUBLIC_PATH_ . $data['file'];
       if(file_exists($link) == true){
         unlink($link);
       }
       $sql = "DELETE FROM $this->table where id = $id";
       return $this->query($sql);
    }    
}
?>