<?php

namespace Apps\ToDoList\Controllers;

class ToDoListController extends Controller {

    public function index() {
        return view('ToDoList::index');
    }
}
