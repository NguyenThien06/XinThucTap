<?php 

namespace App\Model\Admin;

use Core\Model;

class Product extends Model
{
    protected $table = 'product';
    public function insert($data= [])
    {
        return $this->insertArray($data, $this->table);
    }
    public function get($limit = 0, $offset = 0)
    {
        $sql = "SELECT $this->table.* , menu.name as MenuName 
                 FROM $this->table join menu on $this->table.menu_id = menu.id
                order by $this->table.id desc limit $limit offset $offset ";
        return $this->query($sql);
    }
    public function getAll()
    {
        $sql ="SELECT id,name from $this->table";
        return $this->query($sql);
    }
    public function numRow()
    {
        $sql ="SELECT * from $this->table ";;
        $result = $this->query($sql);
        return $result->num_rows;
    }
    public function show($id  = 0 )
    {
        $sql = " SELECT * from $this->table where id = $id";
        return $this->fetch($sql);
    }
    public function update($data = [], $id=0)
    {
        return $this->updateArray($data, $this->table, $id);
    }
    public function delete($product, $id)
    {
        $link = _PUBLIC_PATH_ . $product['file'];
        if(file_exists($link)){
            unlink($link);
        }
        $sql ="DELETE FROM $this->table where id = $id";
        return $this->query($sql);
    }
}
?>