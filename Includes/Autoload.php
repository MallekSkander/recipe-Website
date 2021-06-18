<?php

// This function autoloads the classes, controllers and models
// removing the need to include (or require) them.
function autoload($param) {
    $classes = "../Classes/" . $param . ".php";
    if (file_exists($classes)) {
        include_once $classes;
    }

    $controllers = "../Controllers/" . $param . ".php";
    if (file_exists($controllers)) {
        include_once $controllers;
    }

    $models = "../Models/" . $param . ".php";
    if (file_exists($models)) {
        include_once $models;
    }
}

spl_autoload_register("autoload");

?>
