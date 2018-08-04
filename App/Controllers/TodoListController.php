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
            case TodoList::COMPLETE:
                $string = "Complete";
                break;
            default:
                $string = '';
                break;
        }
        return $string;
    }

    /**
     * Create and store resource
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
            if (!in_array($_POST['statusId'], [TodoList::PLANNING, TodoList::DOING, TodoList::COMPLETE]) || empty($_POST['name']))
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

    /**
     * Edit resource
     *
     * @param int $id Resource id
     *
     * @return mixed
     */
    public function edit($id)
    {
        if (isset($_POST['name']) &&
            isset($_POST['start']) &&
            isset($_POST['end']) &&
            isset($_POST['statusId']))
        {
            if (!in_array($_POST['statusId'], [TodoList::PLANNING, TodoList::DOING, TodoList::COMPLETE]) || empty($_POST['name']))
            {
                $todoList = new TodoList();
                $v['row'] = $todoList->getById($id);
                $v['message'] = 'The Work Name field and Status field are required!';
                $this->set($v);
                $this->render('edit');
                exit();
            }

            $data = [
                'name'       => $_POST['name'],
                'start_date' => $_POST['start'],
                'end_date'   => $_POST['end'],
                'status'     => $_POST['statusId'],
            ];
            $todoList = new TodoList();
            $v['status'] = $todoList->updateById($data, $id);
            $v['message']= $v['status'] ? 'Update work is success!' : 'Update work is failed.';
        }

        $todoList = new TodoList();
        $v['row'] = $todoList->getById($id);

        $this->set($v);
        $this->render('edit');
    }

    /**
     * Delete resource
     *
     * @param int $id Resource id
     *
     * @return mixed
     */
    public function delete($id)
    {
        $todoList = new TodoList();
        $todoList->deleteById($id);

        header("Location:".APP_URL);
    }
}
