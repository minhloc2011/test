<?php

namespace App\Controllers;

use App\Models\TodoList;

class TodoListController extends Controller
{
    /**
     * Get list all resources
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

    /**
     * Create a work or store in db
     *
     * @return mixed
     */
    public function create()
    {
        if (isset($_POST['name']) &&
            isset($_POST['start']) &&
            isset($_POST['end']) &&
            isset($_POST['statusId']))
        {
            if (!in_array($_POST['statusId'], [TodoList::PLANNING, TodoList::DOING, TodoList::COMPLETE]) && empty($_POST['name']))
            {
                $v['message'] = 'The Work Name field and Status field are required!';
                $this->set($v);
                $this->render('create');
                exit();
            }

            $data = [
                'name'       => $_POST['name'],
                'start_date' => $_POST['start'],
                'end_date'   => $_POST['end'],
                'status'     => $_POST['statusId'],
            ];
            $todoList = new TodoList();
            $v['status'] = $todoList->insert($data);


            $this->set($v);
        }
        $this->render('create');
    }
}