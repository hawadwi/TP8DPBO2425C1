<?php
class DepartmentView
{
  public function render($data)
  {
    $no = 1;
    $dataDepartment = null;
    foreach ($data as $val) {
        list($id, $dept_name, $room_code) = $val;
        $dataDepartment .= "<tr class='text-center align-middle table-info'>
                    <td>" . $no++ . "</td>
                    <td>" . $dept_name . "</td>
                    <td>" . $room_code . "</td>
                    <td>
                    <a href='departments.php?id_edit=" . $id .  "' class='btn btn-warning'>Edit</a>
                    <a href='departments.php?id_hapus=" . $id . "' class='btn btn-danger'>Hapus</a>
                    </td>
                    </tr>";      
    }

    $tpl = new Template("department.html");
    $tpl->replace("JUDUL", "Department");
    $tpl->replace("DATA_TABEL", $dataDepartment);
    $tpl->write();
  }
}
