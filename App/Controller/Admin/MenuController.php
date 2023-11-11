<?php

namespace App\Controller\Admin;

use App\Core\Auth;
use Core\Helper;
use Core\Session;
use App\Model\Admin\Menu;

class MenuController extends Auth
{
    protected $model;
    public function __construct()
    {
        parent::__construct();
        $this->model = new Menu();
    }
    public function create()
    {
        $menu = $this->model->getParent();
        return $this->loadView('admin/main',[
            'title'=> 'Thêm Danh Mục',
            'template'=>'menu/add',
            'menu'=> $menu
        ]);
    }
    public function store()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data['name'] = isset($_POST['name']) ? Helper::makeSafe($_POST['name']) : '';
            if($data['name'] == ''){
                Session::addFlash('error','Vui Lòng không để trông tên danh mục');
                return Helper::redirect('/admin/menu/add');
            }
            $data['parent_id'] = isset($_POST['parent_id']) ? (int)$_POST['parent_id'] : 0;
            $data['description'] = isset($_POST['description']) ? Helper::makeSafe($_POST['description']) : '';
            $data['order_by'] =isset($_POST['order_by']) ? (int)$_POST['order_by'] : 0;
            $data['active'] = isset($_POST['active']) ? (int)$_POST['active'] : 0;
            $data['create_at'] = Helper::timeStamp();
            $data['update_at'] = Helper::timeStamp();


            $result = $this->model->insert($data);
            if($result){
                Session::addFlash('success','Bạn đã thêm thành công danh mục sản phẩm');
                return Helper::redirect('/admin/menu/add');
            }
            Session::addFlash('error','Thêm Danh mục thất bại');
            return Helper::redirect('/admin/menu/add');

        }
        Session::addFlash('error','Phương thức bạn nhập không đúng');
        return Helper::redirect('/admin/menu/add');
    }

    public function index()
    {
        $menu = $this->model->get();
        
        return $this->loadView('admin/main',[
            'title'=> 'Danh Sách Danh Mục ',
            'template' => 'menu/list',
            'menu'=>$menu
        ]);
    }
    public function edit($id = 0)
    {
          $data = $this->model->show($id);
          if(is_null($data)){
            Session::addFlash('error','Id '.$id.' bạn chọn không tồn tại ');
            return Helper::redirect('/admin/menu/list');
          }
          $menu = $this->model->getParent();
          return $this->loadView('admin/main',[
              'title'=> 'Chỉnh sửa danh mục ' .$data['name'],
              'template' =>'menu/edit',
              'data'=> $data,
              'menu' => $menu
          ]);
    }

    public function update($id = 0)
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $user = $this->model->show($id);
            if(is_null($user)){
                Session::addFlash('error','Id '.$id.'bạn nhập không tồn tại');
                return Helper::redirect('/admin/menu/edit');
            }
            $data['name'] = isset($_POST['name']) ? Helper::makeSafe($_POST['name']) : '';
            if($data['name'] == ''){
                Session::addFlash('error','Vui lòng tên cập nhật không để trống');
                return Helper::redirect('/admin/menu/edit');
            }
            $data['parent_id'] = isset($_POST['parent_id']) ? (int)$_POST['parent_id'] : 0;
            $data['description'] = isset($_POST['description']) ? Helper::makeSafe($_POST['description']) : '';
            $data['order_by'] = isset($_POST['order_by']) ? (int)$_POST['order_by'] : 0;
            $data['active']  = isset($_POST['active']) ? (int)$_POST['active'] : 0;
            $data['update_at'] = Helper::timeStamp();

            $result = $this->model->update($data, $id);
            Session::addFlash('success', 'Bạn đã cập nhật thành công ');
            return Helper::redirect('/admin/menu/list');

        }
        Session::addFlash('error','phương thức không đúng tồn tại');
        return Helper::redirect('/admin/menu/edit');
    }

    public function destroy()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $id = intval($_POST['id']);
            $user = $this->model->show($id);
            if(is_null($user)){
                return json([
                    'error'=>true,
                    'message'=>'Bạn xóa id không tồn tại'
                ]);
            }
            $result = $this->model->delete($id);
            if($result){
                return json([
                    'error'=> false,
                    'message'=>'Bạn Xóa thành công '
                ]);
            }
            return json([
                'error'=>true,
                'message'=>'Bạn Xóa Lỗi'
            ]);

        }
       Session::addFlash('error','Phương thức bạn nhập không đúng');
       return Helper::redirect('/admin/menu/list');

    }

}



?>