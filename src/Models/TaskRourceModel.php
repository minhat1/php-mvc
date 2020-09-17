<?php

namespace MVC\Models;

use MVC\Config\Database;
use MVC\Core\ResourceModel;
use PDO;


class TaskRourceModel extends ResourceModel
{
    public function __construct($table,$id,$model)
    {
        $this->_init($table,$id,$model);


    }
    public function showAll($model)
    {
       $task = get_class($model);
       $sql = "SELECT * FROM ". $this->table;
       $request = Database::getBdd()->prepare($sql);
       $request->execute();
       $temp = array();
       $temp_b =array();
       $temp = $request->fetchALL();
       for($i = 0; $i < count($temp); $i++)
       {
        $taskk = new $task();
        foreach($temp[$i] as $key => $values)
        {
            $taskk->$key = $values;
        }
        array_push($temp_b, $taskk);
       }
       return $temp_b;
    }
   
    public function get($id)
    {
        $name = get_class($this->model);
        $sql = "SELECT * FROM " . $this->table ." WHERE " . $this->id . "=" . $id;
        $request = Database::getBdd()->prepare($sql);
        $request->execute();
        $array = array();
        $array = $request->fetch(PDO::FETCH_ASSOC);
        $new = new $name;
        foreach($array as $key => $values)
        $new->$key = $values;
        return $new;
    }
    public function aad($model)
    {
        return $this->save($model);
    }

  
    

}
