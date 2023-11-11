<?php 

namespace App\Controller\Admin;

use App\Core\Auth;
use App\Model\Admin\Product;
use App\Model\Admin\ProductSlider;

class ProductSliderController extends Auth
{
    protected $productSliderModel;
    protected $productModel;
    public function __construct()
    {
        $this->productSliderModel = new ProductSlider();
        $this->productModel = new Product();
    }
    public function create()
    {
        return $this->loadView('admin/main',[
            'title'=> 'Trang ProductSlider',
            'template' => 'productSlider/add',
            'productSlider' => $this->productModel->getAll()
        ]);
    }
}

?>