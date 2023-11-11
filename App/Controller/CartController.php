<?php 

namespace App\Controller;

use App\Model\Cart;
use App\Model\Customer;
use App\Model\Product;
use Core\Controller;
use Core\Helper;
use Core\Session;
use App\Helper\Helper as AppHelper;

class CartController extends Controller
{
    protected $productModel;
    protected $cartModel;
    protected $customerModel;
    public function __construct()
    {
        $this->productModel = new Product();
        $this->cartModel = new Cart();
        $this->customerModel = new Customer();
    }
    public function add()
    {
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $productId = isset($_POST['product_id']) ? $_POST['product_id'] : 0;
            $qty = isset($_POST['num_product']) ? $_POST['num_product'] : 0;
            if($productId  <= 0){
                return Helper::redirect($_SERVER['HTTP_REFERER']);
            }
            #cap nhat gioi hang
            $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : NULL;
            if(is_null($cart) == true){
                $_SESSION['cart'][$productId] = $qty;
                return Helper::redirect('/cart');
            }
            #nếu sản phẩm có rồi câp nhật thêm vào số lượng
            if(isset($_SESSION['cart'][$productId]) ==true ){
                $_SESSION['cart'][$productId] = (int)$_SESSION['cart'][$productId] + $qty;
                return Helper::redirect('/cart');
            }
            #nếu sản phẩm mới thì cập nhật thêm vào giỏ hàng

            $_SESSION['cart'][$productId] = $qty;
            return Helper::redirect('/cart');

        }
        return Helper::redirect($_SERVER['HTTP_REFERER']);
    }
    public function index()
    {
       $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : NULL;
       if(is_null($cart) == true){
        return Helper::redirect($_SERVER['HTTP_REFERER']);

       }
       $productId = array_keys($cart);
       $productIdString = implode(',' , $productId);
       
       return $this->loadView('main',[
        'title'=>'Trang Gio Hang',
        'template' => 'cart/list',
        'product' => $this->productModel->getByCart($productIdString)
       ]);
    }

    public function update()
    {
       
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : NULL;
            if(is_null($cart) ==true){
                return Helper::redirect('/');
            }

            $cartProduct =isset($_POST['num_product']) ? $_POST['num_product'] : [];
            
            foreach($cartProduct as $key => $value){
                $_SESSION['cart'][$key] = $value;
                 
            }
            return Helper::redirect('/cart');
        }
        return Helper::redirect('/');
    }
    public function delete($id =0)
    {
        unset($_SESSION['cart'][$id]);
        return Helper::redirect($_SERVER['HTTP_REFERER']);
    }
    // 1h 16

    public function store()
    {
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : NULL;
            if(is_null($cart) == true){
                Session::addFlash('error', 'Gio hang chong');
                return Helper::redirect('/cart');;
            }
            $data['name'] = isset($_POST['name']) ? \Core\Helper::makeSafe($_POST['name']) : '';
            $data['phone']  = isset($_POST['phone']) ? \Core\Helper::makeSafe($_POST['phone']) : '';

            if($data['name'] == '' || $data['phone'] == ''){
                Session::addFlash('error','Không để trống tên số điện thoại');
                return Helper::redirect('/cart');
            }
            $data['address'] = isset($_POST['address']) ? \Core\Helper::makeSafe($_POST['address']) : '';
            $data['email'] = isset($_POST['email']) ? \Core\Helper::makeSafe($_POST['email']) : '' ;
            $data['is_view'] = 0;
            $data['code'] = AppHelper::randomString();
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');

            $customer_id = $this->customerModel->insert($data);
             
            if((int) $customer_id > 0 ){
                $result = $this->addCart($cart, $customer_id);
                if($result == true){
                    Session::addFlash('success', 'Đặt hàng thành công');
                    unset($_SESSION['cart']);
                    return Helper::redirect('/');
                }
            }
            Session::addFlash('error', 'Đặt hàng lỗi ');
            
            return Helper::redirect('/');

        }

    }
    protected function getProductCart($cart = [])
    {
        $productId = array_keys($cart);
        $productIdString = implode(',', $productId);
        return  $this->productModel->getByCart($productIdString);
    }
    public function addCart($cart, $customer_id= 1)
    {
        $product = $this->getProductCart($cart);

        return  $this->cartModel->insertCart($product, $customer_id, $cart);
        
    }
}
?>