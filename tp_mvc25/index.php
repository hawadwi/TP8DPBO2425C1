<?php
include_once("view/Template.php");
include_once("models/DB.php");
include_once("controllers/LecturerController.php");

$lecturer = new LecturerController();

// EDIT PAGE
if (!empty($_GET['id_edit'])) {

    $id = $_GET['id_edit'];

    if (isset($_POST['update'])) {


        $lecturer->update(
         $id   = $_POST['id'],
         $name = $_POST['name'],
         $nidn = $_POST['nidn'],
         $phone = $_POST['phone'],
         $join_date = $_POST['join_date'],
         $dept_id = $_POST['dept_id'],
         $position_id = $_POST['position_id']
        );

        header("location:index.php");
        exit();
    }

    // Tampilkan halaman edit
    $lecturer->showEditPage($id);
    exit();
}


// ADD DATA
if (isset($_POST['add'])) {

    $name        = $_POST['tname'];
    $nidn        = $_POST['tnidn'];
    $phone       = $_POST['tphone'];
    $join_date   = $_POST['tjoin_date'];
    $dept_id     = $_POST['cmbdept_id'] ?? null;
    $position_id = $_POST['cmbposition_id'] ?? null;

    $lecturer->add($name, $nidn, $phone, $join_date, $dept_id, $position_id);

    header("location:index.php");
    exit();
}

// DELETE
if (!empty($_GET['id_hapus'])) {

    $id = $_GET['id_hapus'];
    $lecturer->delete($id);

    header("location:index.php");
    exit();
}

// DEFAULT: SHOW LIST
$lecturer->index();
exit();
?>
