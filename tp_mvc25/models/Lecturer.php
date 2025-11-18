<?php

class Lecturer extends DB
{
    function getLecturer()
    {
        $query = "SELECT l.id, l.name, l.nidn, l.phone, l.join_date,
                         d.dept_name AS department_name,
                         p.position_name AS position_name
                  FROM lecturers l
                  LEFT JOIN departments d ON l.dept_id = d.dept_id
                  LEFT JOIN position p ON l.position_id = p.position_id
                  ORDER BY l.name ASC";
        return $this->execute($query);
    }

    function getLecturerById($id)
    {
        $id = intval($id);
        $query = "SELECT * FROM lecturers WHERE id = $id";
        return $this->execute($query);
    }

    function add($name, $nidn, $phone, $join_date, $dept_id, $position_id)
    {
        $name        = addslashes($name);
        $nidn        = addslashes($nidn);
        $phone       = addslashes($phone);
        $join_date   = addslashes($join_date);
        $dept_id     = intval($dept_id);
        $position_id = intval($position_id);

        $query = "INSERT INTO lecturers (name, nidn, phone, join_date, dept_id, position_id)
                  VALUES ('$name', '$nidn', '$phone', '$join_date', $dept_id, $position_id)";
        return $this->execute($query);
    }

    function update($id, $name, $nidn, $phone, $join_date, $dept_id, $position_id)
    {
        $id          = intval($id);
        $name        = addslashes($name);
        $nidn        = addslashes($nidn);
        $phone       = addslashes($phone);
        $join_date   = addslashes($join_date);
        $dept_id     = intval($dept_id);
        $position_id = intval($position_id);

        $query = "UPDATE lecturers
                  SET name='$name', nidn='$nidn', phone='$phone', join_date='$join_date',
                      dept_id=$dept_id, position_id=$position_id
                  WHERE id=$id";
        return $this->execute($query);
    }

    function delete($id)
    {
        $id = intval($id);
        $query = "DELETE FROM lecturers WHERE id = $id";
        return $this->execute($query);
    }

    function statusLecturer($id)
    {
        $id = intval($id);
        $query = "SELECT * FROM lecturers WHERE id = $id";
        return $this->execute($query);
    }
}
