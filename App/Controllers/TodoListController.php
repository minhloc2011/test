<?php

namespace App\Controllers;

use App\Models\TodoList;

class TodoListController extends Controller
{
    /**
     * Get list all todo list resource
     *
     * @return mixed
     */
    public function index()
    {
        $todoList = new TodoList();
        $data = $todoList->getAll();

        foreach ($data as $key => $value) {
            $data[$key]['status'] = $this->getStatus($value['status']);
        }

        $v['todoList'] = $data;

        $this->set($v);
        $this->render('index');
    }

    /**
     * Get name of Status
     *
     * @param int $status Status number
     *
     * @return string
     */
    private function getStatus($status)
    {
        switch ($status){
            case TodoList::PLANNING:
                $string = "Planning";
                break;
            case TodoList::DOING:
                $string = "Doing";
                break;
            case TodoList::COMPLETED:
                $string = "Complete";
                break;
            default:
                $string = '';
                break;
        }
        return $string;
    }
}