<?php
namespace MVC\Models;
use MVC\Models\TaskRourceModel;

class TaskRepository
{
    public function getAll()
    {   
        $model = new TaskModel;
        $aht = new TaskRourceModel("tasks","id",$model);
       return $aht->showAll($model);
        
    }
    public function dele($id)
    {   
        $model = new TaskModel();
        $vc = new TaskRourceModel("tasks","id",$model);
        return $vc->delete($id);
    }
    public function show($id)
    {
        $model =new TaskModel();
        $aht = new TaskRourceModel("tasks","id",$model);
        return $aht->get($id);

        
    }
    public function add($model)
    {

       
        $aa = new TaskRourceModel("tasks","id",$model);
        return $aa->aad($model);

    }
}