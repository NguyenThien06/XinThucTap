<?php 
namespace Core;

class Route
{
    protected $controller = '\App\Controller\MainController';
    protected $method = 'index';
    protected $param = [];
    protected $query;
    public function __construct()
    {
        $this->handleQuery();
         $this->handleMethod();
    }
     
    public function handleQuery()
    {
        if(isset($_GET['query']) && !is_null($_GET['query'])){
            return $this->query = trim($_GET['query'],'/');
        }
        return ;
    }
    public function handleMethod()
    {
        $controllerFull = $this->handleController();
        if(!is_null($controllerFull)){
            $arrayController = explode('@',$controllerFull);
            $this->controller = $arrayController[0];
            $this->method = $arrayController[1];
        }
    }
    public function handleController()
    {
        if(is_null($this->query)) return NULL;

        global $route;
        $controller = '';
        #Xử lý query không tham số
        if(isset($route[$this->query]) && $route[$this->query] != ''){
            return $route[$this->query];
        }

        # đếm phân tử của câu truy vấn
        $queryCount = count(explode('/' ,$this->query)); # đếm số lượng mảng query
        foreach($route as $key => $value ){

            $arrayRouteCount = count(explode('/' ,$key)); #đếm số lượng mảng route

            if($queryCount == $arrayRouteCount){ # so sánh 

                $regex = preg_replace('/{(.*?)}/i','([a-zA-Z0-9\-]+)', $key);
                $pregexNew = "/" .  str_replace('/',"\/", $regex) . "/"; 
                
                if(preg_match($pregexNew, $this->query, $matches)){
                    preg_match_all( "/\{(.*?)}/i",$key, $pregexParam);
                    unset($matches[0]);
                    
                    $this->param = array_combine($pregexParam[1], array_values($matches));
                    
                    $controller = $value;
                    break;
                }
            }
             
        }
        return $controller;

    }
}

?>