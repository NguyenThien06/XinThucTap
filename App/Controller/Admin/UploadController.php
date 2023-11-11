<?php 

namespace App\Controller\Admin;

use App\Core\Auth;

class UploadController extends Auth
{
    public function __construct()
    {
        parent::__construct();

    }
    public function store()
    {
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $path = getFolder();

             
            $baseName = $_FILES['fileName']['name'];
            if($baseName == ''){
                return json([
                    'error' => true,
                    'message' => 'Không để file chống'
                ]);
            }
            $size = $_FILES['fileName']['size'];
            if($size > 512000 ){
                return json([
                    'error' => true,
                    'message' => 'Dung lượng bạn nhập lớn 500kb'
                ]);
            }
            $arrayFile = ['png', 'jpeg', 'jpg', 'svg', 'git'];
            $pathInfo = strtolower(pathinfo($baseName, PATHINFO_EXTENSION));
            if(in_array($pathInfo, $arrayFile) == false){
                return json([
                    'error' => true,
                    'message' => 'Chọn không đúng định dạng file ảnh '
                ]);
            }
            $pathFull = $path .'/' .$baseName;

            $result = move_uploaded_file($_FILES['fileName']['tmp_name'], $pathFull);
 
            
            if($result == true){
                return json([
                    'error'=> false,
                    'url' => $pathFull
                ]);
            }

        }
    }
}
?>