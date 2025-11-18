<?php
class LecturerView
{
  public function render($data)
  {
    $no = 1;
    $dataLecturer = null;
    $dataDepartment = null;
    $dataPosition = null;
    
  
   foreach ($data['lecturer'] as $val) {
    $id             = $val['id'];
    $nama           = $val['name'];
    $nip            = $val['nidn'];
    $phone          = $val['phone'];
    $join_date      = $val['join_date'];
    $department     = $val['department_name'];
    $position       = $val['position_name'];

    $dataLecturer .= "<tr class='text-center align-middle'>
                <td>" . $no++ . "</td>
                <td>" . $nama . "</td>
                <td>" . $nip . "</td>
                <td>" . $phone . "</td>
                <td>" . $join_date . "</td>
                <td>" . $department . "</td>
                <td>" . $position . "</td>
                <td>
                  <a href='index.php?id_edit=" . $id .  "' class='btn btn-warning mb-2 mb-md-0 mb-lg-0 mb-xl-0'>Edit</a>
                  <a href='index.php?id_hapus=" . $id . "' class='btn btn-danger'>Hapus</a>
                </td>
              </tr>";
    }

  foreach ($data['department'] as $val) {
    $id = $val['dept_id'];
    $nama = $val['dept_name'];
    $dataDepartment .= "<option value='$id'>$nama</option>";
  }

  foreach ($data['position'] as $val) {
    $id = $val['position_id'];
    $nama = $val['position_name'];
    $dataPosition .= "<option value='$id'>$nama</option>";
  }


    $tpl = new Template("lecturer.html");
    $tpl->replace("JUDUL", "Lecturer");
    $tpl->replace("OPTION_DEPARTMENT", $dataDepartment);
    $tpl->replace("OPTION_POSITION", $dataPosition);
    $tpl->replace("DATA_TABEL", $dataLecturer);
    $tpl->write();
  }
}
