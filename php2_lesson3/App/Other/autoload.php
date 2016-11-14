<?php

function __autoload($classname){
    require __DIR__ . '/../../' . str_replace('\\', '/', $classname) . '.php';
}
