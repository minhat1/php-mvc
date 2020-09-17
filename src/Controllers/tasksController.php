<?php
namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Models\Task;
use MVC\Models\TaskModel;
use MVC\Models\TaskRepository;
use MVC\Models\TaskRourceModel;

class tasksController extends Controller
{
    function index()
    {
        $tas = new TaskRepository();

        $d['tasks'] = $tas->getAll();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"]))
        {
            $model = new TaskModel();
            $task= new TaskRepository();
            $model->settitle($_POST["title"]);
            $model->setdescription($_POST["description"]);
            $model->setcreated_at(date('Y-m-d H:i:s'));
            $model->setupdated_at(date('Y-m-d H:i:s'));
            if($task->add($model))

          
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        #require(ROOT . 'Models/Task.php');
       $task = new TaskModel();
       $taskk = new TaskRepository();
       $task = $taskk->show($id);

        $d["task"] = $taskk->show($id);

        if (isset($_POST["title"]))
        {
            $task->settitle($_POST["title"]);
            $task->setdescription($_POST["description"]);
            if ($taskk->add($task))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        #require(ROOT . 'Models/Task.php');

        $task = new TaskRepository();
        if ($task->dele($id))
        {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
?>