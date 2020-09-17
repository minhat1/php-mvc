<?php

    namespace MVC\Core;
    use ReflectionClass;

    class Model
    {
        public function getProperties()
        {

        $reflect = new ReflectionClass($this);
        $props   = $reflect->getProperties();
        $a = array();
        foreach($props as $value)
        {
        array_push($a,$value->getName());
        }
        return $a;

        }


    }
?>