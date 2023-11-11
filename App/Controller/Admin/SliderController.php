<?php 

namespace App\Controller\Admin;

use App\Core\Auth;
use App\Model\Admin\Slider;
use Core\Helper;
use Core\Session;

class SliderController extends Auth
{
    protected $model;
    public function __construct()
    {
        parent::__construct();
        $this->model = new Slider();
    }
    public function create()
    {
        return $this->loadView('admin/main',[
            'title' => 'Trang Thêm Slider',
            'template' => 'slider/add'
        ]);
    }
    public function store()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data['name'] = isset($_POST['name']) ? Helper::makeSafe($_POST['name']) : '';
            $data['file'] = isset($_POST['file']) ? Helper::makeSafe($_POST['file']) : '';
        
            if($data['name'] == '' || $data['file'] == ''){
                Session::addFlash('error','Không để trống name và File');
                return Helper::redirect('/admin/slider/add');
            }
            $data['sort_by']     = isset($_POST['sort_by']) ? intval($_POST['sort_by']) : 0;
            $data['url']         = isset($_POST['url']) ? Helper::makeSafe($_POST['url']) : '';
            $data['active']      =  isset($_POST['active']) ? intval($_POST['active']) : 0;
            $data['create_at']   = Helper::timeStamp();
            $data['update_at']   = Helper::timeStamp();
            
            $result = $this->model->insert($data);
            if($result == true){
                Session::addFlash('success', 'Bạn thêm slider thành công ');
                return Helper::redirect('/admin/slider/add');
            }
            Session::addFlash('error', 'Bạn thêm slider lỗi');
            return Helper::redirect('/admin/slider/add');
        }
        Session::addFlash('error', 'Bạn nhập sai phương thức');
        return Helper::redirect('/admin/slider/add');
    }

    public function index()
    {
        return $this->loadView('admin/main',[
           'title'=>'Trang Danh Sách Slider',
           'template' => 'slider/list',
           'slider' => $this->model->get()
        ]);
    }
    public function edit($id =0)
    {
        $data = $this->model->show($id);
        
        if(is_null($data) == true){
            Session::addFlash('error', 'Bạn Chọn Id '.$id.' Không tồn tại');
            return Helper::redirect('/admin/slider/list');
        }
        return $this->loadView('admin/main',[
            'title'=> 'Trang chỉnh sửa trang',
            'template' => 'slider/edit',
            'data' => $data
        ]);
    }
    public function update($id =0)
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $slider = $this->model->show($id);
            if(is_null($slider) == true){
                Session::addFlash('error', 'Bạn chọn Id không tồn tại');
                return Helper::redirect('/admin/slider/list');
            }

            $data['name'] = isset($_POST['name']) ? Helper::makeSafe($_POST['name']) : '';
            $data['file'] = isset($_POST['file']) ? Helper::makeSafe($_POST['file']) : '';
            if($data['name'] == '' || $data['file'] == ''){
                Session::addFlash('error', 'Bạn không để chống name, file ');
                return Helper::redirect('/admin/slider/list');
            }
            $data['sort_by'] = isset($_POST['sort_by']) ? intval($_POST['sort_by']) : 0;
            $data['url'] = isset($_POST['url']) ? Helper::makeSafe($_POST['url']) : '';
            $data['active'] = isset($_POST['active']) ? intval($_POST['active']) : 0;
            $data['update_at'] = Helper::timeStamp();

            $result = $this->model->update($data, $id);
            if($result == true){
                Session::addFlash('success', 'Cập nhật sản phẩm thành công');
                return Helper::redirect('/admin/slider/list');
            }
            Session::addFlash('error', 'Bạn thêm Slider thất bại');
            return Helper::redirect('/admin/slider/list');
        }
        Session::addFlash('error', 'Bạn chọn sai phương thức');
        return Helper::redirect('/admin/slider/list');
    }

    public function destroy()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = intval($_POST['id']);
            $result = $this->model->show($id);
            if(is_null($result) == true){
                return json([
                    'error' => true,
                    'message' => 'Xoa Id khong ton tai'
                ]);
            }

            $data = $this->model->delete($result, $id);
            if($data == true){
                return json([
                    'error' => false,
                    'message' => 'Xóa Thành công '
                ]);
            }
            return json([
                'error'=> true,
                'message' => 'Xóa lỗi'
            ]);
          
        }
        return json([
            'error'=>true,
            'message'=> 'phương thức xóa lỗi'
        ]);
        

    }
}
?>