<?php

namespace Apps\HelloWordl\Controllers;
class HelloWordController extends Controller
{
    public function index()
    {
        return "Hello Wordl!";
    }

    public function indexName($name)
    {
        return "Hello $name!";
    }
}
