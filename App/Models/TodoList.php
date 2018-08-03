<?php

namespace App\Models;

class TodoList extends Model
{
    const PLANNING = 1;
    const DOING = 2;
    const COMPLETE = 3;

    /**
     * Fetch all data from db
     *
     * @return array|null
     */
    public function getAll()
    {
        $sqlQuery = "SELECT * from todolist ORDER BY id";
        $data = $this->model->query($sqlQuery);

        return mysqli_fetch_all($data, MYSQLI_ASSOC);
    }
}
