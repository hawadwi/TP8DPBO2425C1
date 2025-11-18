<?php
class PositionView
{
  public function render($data)
  {
    $no = 1;
    $dataPosition = null;
    foreach ($data as $val) {
        list($id, $nama) = $val;
        $dataPosition .= "<tr class='text-center align-middle table-info'>
                    <td>" . $no++ . "</td>
                    <td>" . $nama . "</td>
                    <td>
                    <a href='positions.php?id_edit=" . $id .  "' class='btn btn-warning'>Edit</a>
                    <a href='positions.php?id_hapus=" . $id . "' class='btn btn-danger'>Hapus</a>
                    </td>
                    </tr>";      
    }

    $tpl = new Template("position.html");
    $tpl->replace("JUDUL", "Position");
    $tpl->replace("DATA_TABEL", $dataPosition);
    $tpl->write();
  }
}
