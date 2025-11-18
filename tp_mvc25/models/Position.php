<?php

class Position extends DB
{
    function getPosition()
    {
        $query = "SELECT * FROM position";
        return $this->execute($query);
    }

    function getPositionById($id){
        $id = intval($id);
        $query = "SELECT * FROM position WHERE position_id = $id";
        return $this->execute($query);
    }

    function add($position_name)
    {
        $position_name = addslashes($position_name);
        $query = "INSERT INTO position (position_name) VALUES ('$position_name')";
        return $this->execute($query);
    }

    function delete($id)
    {
        // Lengkapi Query
        $query = "DELETE FROM position WHERE position_id = $id";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($id, $position_name){
        $id          = intval($id);
        $position_name        = addslashes($position_name);

        $query = "UPDATE position
                  SET position_name='$position_name'
                  WHERE position_id=$id";
        return $this->execute($query);
    }

    function statusPosition($id)
    {
        // Lengkapi Query - Contoh untuk mendapatkan detail position
        $query = "SELECT * FROM position WHERE position_id = $id";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
