<?php 

namespace App\Model;

use Core\Model;

class Product extends Model
{
    protected $table ='product';
    const LIMIT =12;
    public function get($page = null)
    {
        $sql ="SELECT id, name, price, price_sale, file from $this->table where active = 1 order by id desc limit " . self::LIMIT;
        if(is_null($page) == false){
            $offset = $page * self::LIMIT;
            $sql .= " offset " .$offset;
            return $this->fetchArray($sql);
        }
        return $this->query($sql);
    }
    public function show($id = 0, $join = 0)
    {
        $sql ="SELECT * from $this->table where active =1 && id = $id ";
        if($join == 1){
            $sql = "SELECT $this->table.*, menu.name as menuName from
                    $this->table join menu on $this->table.menu_id = menu.id
                    where $this->table.active =1 && $this->table.id = $id";
                    
        }
         
        return $this->fetch($sql);
    }
    public function getByMenu($menuId, $limit, $offset)
    {
        $sql ="SELECT * from $this->table where active =1 && menu_id in($menuId) order by id desc limit $limit offset $offset";
        
        return $this->query($sql);
    }
    public function numRow($id)
    {
        $sql = "SELECT id from $this->table where menu_id = $id";
        $result = $this->query($sql);
        return $result->num_rows;
    }

    public function getSlider($id)
    {
        $sql = "SELECT * from product_slider where product_id = $id";
        return $this->query($sql);
    }
    public function getMore($id, $menuId)
    {
        $sql ="SELECT * from $this->table where $this->table.id != $id && menu_id = $menuId && active =1 order by id desc limit 8";
        
        return $this->query($sql);
    }

    public function getByCart($productId )
    {
        $sql =" SELECT id, name, price, price_sale, file from $this->table where active =1 && id IN($productId) order by id desc";
        return $this->query($sql);
    }

}


?>