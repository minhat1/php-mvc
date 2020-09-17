<?php

namespace MVC\Models;

use MVC\Core\Model;

class TaskModel extends Model
{
    protected $title;
    protected $description;
    protected $created_at;
    protected $updated_at;
    protected $id;
    function getid()
    {
        return $this->id;

    }
    function setid($id)
    {
        $this->id = $id;
    }
    function gettitle()
    {
        return $this->title;
    }
    function settitle($title)
    {
        $this->title = $title;
    }
    function getdescription()
    {
        return $this->description;
    }
    function setdescription($description)
    {
        $this->description = $description;
    }
    function getcreated_at()
    {
        return $this->created_at;
    }
    function setcreated_at($created_at)
    {
        $this->created_at = $created_at;
    }
    function getupdated_at()
    {
        return $this->updated_at;
    }
    function setupdated_at($updated_at)
    {
        $this->updated_at = $updated_at;
    }
    public function __get($key)
    {
        return $this->$key;
    }
    public function __set($key, $value) 
    {
        $this->$key = $value;
    }

}