<?php
include_once("view/Template.php");
include_once("models/DB.php");
include_once("controllers/PositionController.php");

$position = new PositionController();

// EDIT PAGE
if (!empty($_GET['id_edit'])) {

    $id = $_GET['id_edit'];

    // Jika tombol Update ditekan
    if (isset($_POST['update'])) {

        $position_name = $_POST['position_name'];
        $position->update($id, $position_name);

        header("location:positions.php");
        exit();
    }

    // Tampilkan halaman edit
    $position->showEditPage($id);
    exit();
}

// ADD DATA
if (isset($_POST['add'])) {
    $position_name = $_POST['position_name'];
    $position->add($position_name);

    header("location:positions.php");
    exit();
}




// DELETE
if (!empty($_GET['id_hapus'])) {

    $id = $_GET['id_hapus'];
    $position->delete($id);

    header("location:positions.php");
    exit();
}

// DEFAULT: SHOW LIST
$position->index();
exit();
?>
