<?php 

namespace Core;

class Model extends DB
{
    protected $data;
    public function __construct()
    {
        parent::__construct();
    }
    public function query($sql ='')
    {
       $result = $this->conn->query($sql);
       if($result) return $result;
       die('Not Table');
    }

    public function fetch($sql = '')
    {
        $result = $this->query($sql);
        if($result->num_rows > 0){
           return $this->data = $result->fetch_assoc();
        }
        
    }
    public function fetchArray($sql = '')
    {
        $result = $this->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $this->data[] = $row;
            }
        }
        return $this->data;
    }

     public function insertArray($data =[], $table = '')
    {
        if($table == '') die('Not Found Table');
        #insert into $table(name, description,order_by, active) values('Nguyen Van Thien', 'Con tam tam');
        $field = '';
        $val = '';
        foreach($data as $key => $value){
           $field .=  "`".$key . "`, ";
           $val .="'" . $value . "', ";
        }
        $field = substr(trim($field), 0, -1);
        $val = substr(trim($val) ,0 , -1);
        $sql = "INSERT INTO $table(". $field.") values(". $val." )";
        return $this->query($sql);
    }
    
    public function updateArray($data = [], $table = '',$id = 0)
    {
        if($table == '') die('Not Found Table');
        #$sql = "UPDATE $table set name ='Nguyen van Thien', description='hoc binh thuong qua ', where id = $id";
        $updateQuery = '';
        foreach($data as $key => $value){
            $updateQuery .= "$key ='".$value ."', ";
        }
        $updateQuery = substr(trim($updateQuery), 0, -1);
        $sql = "UPDATE $table set $updateQuery where id = $id";
        return $this->query($sql);
    }

    public function getLastId($data =[], $table ="")
    {
          $result = $this->insertArray($data, $table);
          
          return $this->conn->insert_id;
    }
    
}

?>