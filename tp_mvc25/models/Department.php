<?php

class Department extends DB
{
    function getDepartment()
    {
        $query = "SELECT * FROM departments";
        return $this->execute($query);
    }

    function getDepartmenById($id)
    {
        $id = intval($id);
        $query = "SELECT * FROM departments WHERE dept_id = $id";
        return $this->execute($query);
    }

    public function add($dept_name, $room_code)
    {
        $query = "INSERT INTO departments (dept_name, room_code) 
                VALUES ('$dept_name', '$room_code')";
        return $this->execute($query);
    }


    function delete($id)
    {
        // Lengkapi Query
        $query = "DELETE FROM departments WHERE dept_id = $id";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($id, $dept_name, $room_code)
    {
        $id          = intval($id);
        $dept_name        = addslashes($dept_name);
        $room_code        = addslashes($room_code);

        $query = "UPDATE departments
                  SET dept_name='$dept_name', room_code='$room_code'
                  WHERE dept_id=$id";
        return $this->execute($query);
    }

    function statusDepartment($id)
    {
        // Lengkapi Query - Contoh untuk update status/informasi department
        $query = "SELECT * FROM departments WHERE dept_id = $id";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
