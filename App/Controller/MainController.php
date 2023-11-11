<?php

namespace App\Controller;

use App\Model\Menu;
use App\Model\Product;
use App\Model\Slider;
use Core\Controller;


class MainController extends Controller
{
   protected $sliderModel;
   protected $menuModel;
   protected $productModel;
   public function __construct()
  {
    $this->sliderModel = new Slider() ;
    $this->menuModel = new Menu();
    $this->productModel = new Product();
  }
  public function index()
  {
    $data = [
      'title' => 'Trang Demo MVC Khoa Pham',
      'template' => 'home',
      'slider' => $this->sliderModel->get(),
      'menu' => $this->menuModel->get(),
      'product' => $this->productModel->get()
    ];
    
    return $this->loadView('main', $data);
  }
  public function loadProduct()
  {
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $page = isset($_POST['page']) ? $_POST['page'] : 0;

      $result = $this->productModel->get($page);
      if(is_null($result) == false){
        return json([
             'error'=>false,
             'data'=> $result
        ]);
      }
      return json([
        'error'=>true,
         'message'=>'Loi khong tai duoc'
      ]);
    }
    return json([
      'error'=>true,
      'message'=>'Loi khong dung phuong thuc'
    ]);
  }

  public function showProduct()
  {
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

      $result = $this->productModel->show($id);
      if(is_null($result) == false){
        return json([
          'error'=> false,
           'data'=>$result
        ]);
      }
      return json([
        'error'=>true,
        'message'=>'Loi khong ton tai id '. $id
      ]);
    }
    return json([
      'error'=>true,
      'message'=>'phuong thuc khong ton tai'
    ]);
  }
  
  
  
}
