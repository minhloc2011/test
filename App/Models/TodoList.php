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

    /**
     * Insert a resource to db
     *
     * @param array $data TodoList data
     *
     * @return bool
     */
    public function insert($data)
    {
        $name       = $data['name'] ? $data['name'] : null;
        $start_date = $data['start_date'] ? $data['start_date'] : null;
        $end_date   = $data['end_date'] ? $data['end_date'] : null;
        $status     = $data['status'] ? $data['status'] : null;
        $created_at = date('Y-m-d H:i:s');

        $sql = "INSERT INTO todolist (work_name, start_date, end_date, status, created_at) VALUES (?, ?, ?, ?, ?)";
        if ($stmt = $this->model->prepare($sql))
        {
            $stmt->bind_param("sssis",$name, $start_date, $end_date, $status, $created_at);
            $stmt->execute();
            $stmt->close();
            return true;
        }
        return false;
    }
}
