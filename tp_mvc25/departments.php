<?php
include_once("view/Template.php");
include_once("models/DB.php");
include_once("controllers/DepartmentController.php");

$department = new DepartmentController();

// EDIT PAGE
// EDIT PAGE
if (!empty($_GET['id_edit'])) {

    $id = $_GET['id_edit'];

    // Jika tombol Update ditekan
    if (isset($_POST['submit'])) {
        $id        = $_POST['id'];
        $dept_name = $_POST['dept_name'];
        $room_code = $_POST['room_code'];

        $department->update($id, $dept_name, $room_code);

        header("Location: departments.php");
        exit;
    }

    // Jika belum submit → tampilkan halaman edit
    $department->showEditPage($id);
    exit;
}


// ADD DATA
if (isset($_POST['add'])) {

    $name        = $_POST['name'];
    $room        = $_POST['room'];

    $department->add($name, $room);

    header("location:departments.php");
    exit();
}

// DELETE
if (!empty($_GET['id_hapus'])) {

    $id = $_GET['id_hapus'];
    $department->delete($id);

    header("location:departments.php");
    exit();
}

// DEFAULT: SHOW LIST
$department->index();
exit();
?>
