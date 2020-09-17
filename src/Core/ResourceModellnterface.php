<?php

namespace MVC\Core;

interface ResourceModellnterface
{
    public function _init($table,$id,$model);
    public function save($model);
    public function delete($model);
}
