<?php

namespace App\Helper;

use App\Model\Product;
use Core\Model;
use Core\Helper as Corehelper;

class Helper
{
    public static function menuShow($data, $parent_id = 0, $symb = '')
    {
        //dd($data);
        $html = '';
        foreach ($data as $key => $value) {
            if ($value['parent_id'] == $parent_id) {
                $html .= '<tr>
                            <td>' . $value['id'] . '</td>  
                            <td>' . $symb . $value['name'] . '</td>
                            <td>' . $value['order_by'] . '</td>
                            <td>' . self::active($value['active']) . '</td>
                            <td>' . $value['update_at'] . '</td>
                            <td><a href="/admin/menu/edit/' . $value['id'] . '"><i class="far fa-edit"></i></a></td>
                            <td><a href="#" onclick="deleteRow(' . $value['id'] . ', \'/admin/menu/delete\')"><i class="fas fa-trash"></i></a></td>
                         </tr>';


                unset($data[$key]);
                $html .= self::menuShow($data, $value['id'], '|---');
            }

            // dd($data);
        }
        return $html;
    }
    public static function active($data = 0)
    {
        return $data == 0 ?
            '<button type="button" class="btn btn-block btn-danger btn-sm">Không kích hoạt</button>'
            : '<button type="button" class="btn btn-block btn-success btn-sm">Kích hoạt</button>';
    }
    public static function menuAll()
    {
        $model = new Model();
        $sql = "SELECT * from menu where active = 1";
        return $model->fetchArray($sql);
    }
    public static function menuPublic($data , $id = 0)
    {
        $html ='';
       foreach($data as $key => $value){
        
        if($value['parent_id'] == $id){
          
         $html .='<li><a href="/danh-muc/'. Corehelper::slug($value['name']).'-id-'.$value['id'].'.html" title='.$value['name'].'>'.$value['name'].'</a>';

         if(self::isChild($data, $value['id'])){
            $html .='<ul class="sub-menu">';
            $html .= self::menuPublic($data, $value['id']);
            $html .='</ul>';
         }
         $html .='</li>';
        }
        ;
       }
       return $html;
    }
    public static function isChild($data, $id =0)
    {
       foreach($data as $key => $value){
        if($value['parent_id'] == $id){
            return true;
        }
       }
       return false;
    }
    public static function getFillter($key = '', $value = '', $link = '')
    {
        if($link == ''){
            $link = explode('?', $_SERVER['REQUEST_URI']);
            $link = $link[0] . '?' ;
        }

        if($key !='' && $value !=''){
            unset($_GET['query']);
            # Nếu chưa có get Thì gán mặc định 
            if(empty($_GET) == true ){
                $link .=   $key . '=' . $value;
                return $link;
            }
            
            # cập nhật key và value vào $_GET
            $_GET[$key] = $value;
            foreach($_GET as $k => $val){
                $link .=   $k .'=' . $val . '&';
            }
        }

        return substr($link, 0, -1);
    }
    public static function productCart()
    {
        $model = new Product();
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart']  : NULL;
        if(is_null($cart)){
            return false;
        }
        $productId = array_keys($cart);
        $productIdString = implode(',',$productId);
        return $model->getByCart($productIdString);
    }
    public static function randomString($lenght = 6)
    {
        $char = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        $randString = '';
        for($i =0 ;$i < $lenght ;$i++ ){
           $j = rand(0 ,strlen($char) -1);
           $randString = $randString . $char[$j];
        }
        return $randString;

    }
}
