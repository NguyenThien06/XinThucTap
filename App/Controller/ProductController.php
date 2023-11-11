<?php 

namespace App\Controller;

use App\Model\Product;
use Core\Controller;
use Core\Helper;

class ProductController extends Controller
{
    protected $productModel;
    public function __construct()
    {
        $this->productModel = new Product();
    }
    public function index($slug='', $id= 0)
    {
        $product = $this->productModel->show($id, 1);
        if(is_null($product) == true){
            return Helper::redirect('/');
        }
        // phut 50
         return $this->loadView('main',[
            'title'=>$product['menuName'],
            'template' => 'product/content',
            'product' => $product,
            'slider' => $this->productModel->getSlider($id),
            'product_more' => $this->productModel->getMore($id, $product['menu_id'])
         ]);
    }
}


?>