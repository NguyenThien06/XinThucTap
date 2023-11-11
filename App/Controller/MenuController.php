<?php 

namespace App\Controller;

use App\Model\Menu;
use App\Model\Product;
use Core\Controller;
use Core\Helper;

class MenuController extends Controller
{
    protected $menuModel;
    protected $productModel;
    public function __construct()
    {
        $this->menuModel = new Menu();
        $this->productModel = new Product();
    }
    public function index($slug = '', $id = 0)
    {
       $menu = $this->menuModel->show($id) ;
       if(is_null($menu) == true){
         return Helper::redirect('/');
       }
       $page = isset($_GET['page']) && $_GET['page'] > 0 ? $_GET['page'] : 1;
       $limit = 12;
       $offset = ($page -1) * $limit;
       $numRow = $this->productModel->numRow($id);
       $sumPage = ceil($numRow / $limit);

       $menuId = $this->getChildId($id);
       
       $product = $this->productModel->getByMenu($menuId, $limit, $offset);
       

       return $this->loadView('main',[
          'title'=>$menu['name'],
          'template' => 'menu',
          'product' => $product,
          'menus'=> $menu,
          'page' => $page,
          'sumPage' => $sumPage
       ]);
    }
    protected function getChildId($id) 
    {
        $menu = $this->menuModel->getChild($id);
        $menuId = $id;
        if($menu->num_rows >0){
            while($row = $menu->fetch_assoc()){
               $menuId .=', ' . $row['id'];
            }
        }
        return $menuId;
    }
}
?>