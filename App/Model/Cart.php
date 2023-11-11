<?php 

namespace App\Model;

use Core\Model;

class Cart extends Model
{
    protected $table ="cart";

    public function insertCart($products, $customer_id, $cart)
    {
       $sql ="INSERT into $this->table(customer_id, product_id, price, qty, product_name, product_thumb)
              values";
       while($product = $products->fetch_assoc()){
        $price = $product['price_sale'] != 0 ? $product['price_sale'] : $product['price'];
          $sql .="( $customer_id, " .$product['id'] . ", $price," . $cart[$product['id']].", '". $product['name']."', '".$product['file']."'),";
       }
       $sql = substr($sql, 0 , -1);
       return $this->query($sql);
    }
}

?>