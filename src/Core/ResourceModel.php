<?php

namespace MVC\Core;

use MVC\Core\ResourceModellnterface;
use MVC\Config\Database;

 class ResourceModel implements ResourceModellnterface
{
    protected $id;
    protected $table;
    protected $model;
    public function _init($table, $id, $model)
    {
        $this->id = $id;
        $this->table = $table;
        $this->model = $model;
    }
    public function save($model)
    {
        $pro = $model->getProperties();
        $sql_a = "";
        $sql_b = "";
        $temp = array();
        if($model->{$this->id}==null)
        {
            for($i = 0; $i < count($pro); $i++)
            {   
                if($pro[$i] != $this->id)
                {
                    $sql_a .= $pro[$i]. ",";
                    $sql_b .= ":" . $pro[$i]. ",";
                    $temp[$pro[$i]] = $model->{$pro[$i]};
                }
            }
            $sql_a = substr($sql_a, 0, strlen($sql_a) - 1);
            $sql_b = substr($sql_b, 0, strlen($sql_b) - 1);
            $sql = "INSERT INTO " . $this->table . "(" . $sql_a .") VALUES (" .$sql_b . ")";
            $req = Database::getBdd()->prepare($sql);
            return $req->execute($temp);
        }
        else {
            for($i = 0; $i < count($pro); $i++)
            {
                if($pro[$i] != $this->id)
                {
                    $sql_a .= $pro[$i]. "= :" .$pro[$i]."," ;   
                    $temp[$pro[$i]] = $model->{$pro[$i]};
                }
            }
            $sql_b = $this->id. "= :".$this->id;
            $temp[$this->id] =  $model->{$this->id};
            $sql_a = substr($sql_a, 0, strlen($sql_a) - 1);
            $sql = "UPDATE " . $this->table ." SET " . $sql_a ." WHERE " .$sql_b;
            echo $sql;
            $request = Database::getBdd()->prepare($sql);
            return $request->execute($temp);
    }
}

    public function delete($id)
    { 
        $sql = 'DELETE FROM '. $this->table .' WHERE '. $this->id .'=' .$id;
        $request = Database::getBdd()->prepare($sql);
        return $request->execute();
    }

}   


