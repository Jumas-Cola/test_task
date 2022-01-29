<?php

namespace JumasCola\TestTask\Controllers;

class IndexController {
    public function index()
    {
        include(dirname(__FILE__, 2).'/../views/main.php');
    }
}
