<?php 

namespace App\Controller\Admin;

use App\Core\Auth;
use App\Model\Admin\Menu;
use App\Model\Admin\Product;
use Core\Helper;
use Core\Session;

class ProductController extends Auth

{
    protected $model;
    protected $modelMenu ;
    public function __construct()
    {
        parent::__construct();
        $this->model = new Product();
        $this->modelMenu = new Menu();
    }
    public function create()
    {
        return $this->loadView('admin/main',[
            'title'=>' Trang Thêm Sản Phẩm',
            'template' => 'product/add',
            'menu' =>$this->modelMenu->getActive()
        ]);
    }
    public function store()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data['name'] = isset($_POST['name']) ? Helper::makeSafe($_POST['name']) : '';
            $data['content'] = isset($_POST['content']) ? Helper::makeSafe($_POST['content']) : '';
            $data['file'] = isset($_POST['file']) ? Helper::makeSafe($_POST['file']) : '';

            if($data['name'] == '' || $data['content'] == '' || $data['file'] ==''){
                Session::addFlash('error', 'Không để trống trường tên, chi tiết sản phẩm, file');
                return Helper::redirect('/admin/product/add');
            }
            $data['menu_id'] = isset($_POST['menu_id']) ? intval($_POST['menu_id']) : 0;
            $data['description'] = isset($_POST['description']) ? Helper::makeSafe($_POST['description']) : '';
            $data['price'] = isset($_POST['price']) ? intval($_POST['price']) : 0;
            $data['price_sale'] = isset($_POST['price_sale']) ? intval($_POST['price_sale']) : 0;
            $result = $this->checkPrice($data['price'], $data['price_sale']);
            if($result == false){
                Session::addFlash('error', 'Ban nhập giá gốc nhỏ hơn giá giảm');
                return Helper::redirect('/admin/product/list');
            }
            $data['active'] = isset($_POST['active']) ? intval($_POST['active']) : 0;
            $data['create_at'] = Helper::timeStamp();
            $data['update_at'] = Helper::timeStamp();

            $result =  $this->model->insert($data);
            if($result == true){
                Session::addFlash('success', 'Bạn thêm sản phẩm thành công');
                return Helper::redirect('/admin/product/add');
            }
            Session::addFlash('error', 'Bạn thêm sản phẩm thất bạn');
            return Helper::redirect('/admin/product/add');
        }
        Session::addFlash('error', 'Bạn chọn sai phương thức');
        return Helper::redirect('/admin/product/add');
    }
    protected function checkPrice($price =0 , $price_sale = 0)
    {
        if($price != 0 && $price_sale != 0){
            if($price < $price_sale ){
                return false;
            }
        }
        if($price == 0 && $price_sale != 0){
            return false;
        }
        return true;
    }
    public function index()
    {
        $page = isset($_GET['page']) && $_GET['page'] > 0 ? (int)$_GET['page'] :1;
        $limit = 20;
        $offset = ($page - 1) * $limit;
        $numRow = $this->model->numRow();
        $sumPage = ceil($numRow / $limit);

        return $this->loadView('admin/main',[
            'title'=>'Trang Danh Sach',
            'template' => 'product/list',
            'data' => $this->model->get($limit, $offset),
            'sumPage'=> $sumPage,
            'page' => $page
        ]);
    }
    public function edit($id = 0)
    {
        $data = $this->model->show($id);
       
        if(is_null($data) == true){
            Session::addFlash('error', 'Id sản phẩm không tồn tại');
            return Helper::redirect('/admin/product/list');
        }
        return $this->loadView('admin/main', [
            'title'=>'Trang Chỉnh sửa '. $data['name'],
            'template' =>'product/edit',
            'menu' =>$this->modelMenu->getActive(),
            'data' => $data
        ]);
    }
    public function update($id = 0)
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data['name'] = isset($_POST['name']) ? Helper::makeSafe($_POST['name']) : '';
            $data['content'] = isset($_POST['content']) ? Helper::makeSafe($_POST['content']) : '';
            $data['file'] = isset($_POST['file']) ? Helper::makeSafe($_POST['file']) : '';

            

            if($data['name'] == '' || $data['content'] == '' || $data['file']== ''){
                Session::addFlash('error','Bạn Nhập không để trống trường tên, nội dung chi tiết, file');
                return Helper::redirect('/admin/product/list');
            }
            $data['description'] = isset($_POST['description']) ? Helper::makeSafe($_POST['description']) : '';
            $data['price'] = isset($_POST['price']) ? (int) $_POST['price'] : 0;
            $data['price_sale'] = isset($_POST['price_sale']) ? (int) $_POST['price_sale'] : 0;
            $data['active'] = isset($_POST['active']) ? (int )$_POST['active'] : 0;
            $isCheck = $this->checkPrice($data['price'], $data['price_sale']);
            if($isCheck == false){
                Session::addFlash('error','Gía Gốc không thể nhỏ hơn giá giảm');
                return Helper::redirect('/admin/product/list');
            }
            $data['update_at'] = Helper::timeStamp();
            
            $result = $this->model->update($data, $id);
            if($result == true){
                Session::addFlash('success', 'Bạn Chỉnh sửa Sản Phẩm thành công');
                return Helper::redirect('/admin/product/list');
            }
            Session::addFlash('error', 'Bạn Cập Nhật sản phâm thất bại');
            return Helper::redirect('/admin/product/list');
        }
        Session::addFlash('error','Bạn nhập sai phương thức' );
        return Helper::redirect('/admin/product/list');
    }
    public function destroy()
    {
         if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = intval( $_POST['id']);
            $product = $this->model->show($id);
            if(is_null($product) == true){
                return json([
                    'error' => true,
                    'message' => 'Không có sản phẩm nào có cùng id'
                ]);
            }
            $result = $this->model->delete($product, $id);
            if($result == true){
                return json([
                    'error' => false,
                    'message' => 'Xoa thanh cong '
                ]);
            }
            return json([
                'error' =>true,
                'message' => 'Xoa That bai'
            ]);
         }
         return json([
            'error' =>true,
            'message' => 'Phuong thuc xoa that bai'
        ]);
    }
}
?>