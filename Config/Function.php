<?php
if(!function_exists('dd')){
    function dd($array = []){
        echo '<pre>';
        var_dump($array);
        echo '</pre>';
        die();
    }
}

if(!function_exists('json')){
    function json($array = []){
        header('Content-Type: application/json');
        echo json_encode($array);
    }
}

if(function_exists('getFolder') == false){
    function getFolder($path = 'uploads')
    {
        $arrayDate = [date('Y'), date('m'), date('d')];
        foreach($arrayDate as $key => $value){
            $path = $path . '/' . $value;
            if(is_dir($path) == false){
               mkdir($path, 0777);
            }
        }
        return $path;

    }
}
if(function_exists('page')== false){
    function page($sumPage, $page, $url ='')
    {
        $html='<ul class="pagination" style="justify-content: end">   ';
        
        $html .='<li class="page-item"><a class="page-link" href="'.\App\Helper\Helper::getFillter('page', 1).'">Đầu</a></li>';  
      
        // tạo nút trước một trang 
        if($page > 1) {
            $html .='<li class="page-item"><a class="page-link" href="'.\App\Helper\Helper::getFillter('page', ($page-1)).'">Trước</a></li>';
        }
        // $start = 
        $start = ($page - 2) > 0 ? ($page - 2) : 1;

        $end = ($page + 2) > $sumPage ? $sumPage : ($page +2) ;
        for($i = $start ; $i <= $end ; $i++){
            
                $html .='<li class="page-item"><a class="page-link" href="'.\App\Helper\Helper::getFillter('page', $i).'">'. $i .'</a></li>';
            
           
        }
        // tạo nút sau một trang
        if($page < $sumPage ) {
            $html .='<li class="page-item"><a class="page-link" href="'.\App\Helper\Helper::getFillter('page', ($page +1)).'">Sau</a></li>';
        }
        
            $html .='<li class="page-item"><a class="page-link" href="'.\App\Helper\Helper::getFillter('page', $sumPage).'">Cuối</a></li>';
       
        return $html;
    }
}



?>