<?php
include_once("config.php");
include_once("models/Department.php");
include_once("view/DepartmentView.php");
include_once("view/DepartmentEditView.php");

class DepartmentController
{
  // Properti kontroller
  private $department;

  // Konstruktor Controller Department
  function __construct()
  {
    $this->department = new Department(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
  }

  // Method yang mengarahkan ke halaman umum controller department
  public function index()
  {
    // Menyambungkan/membuka jalur ke database
    $this->department->open();

    // Meneruskan request umum dari views (mengambil data department)
    $this->department->getDepartment();

    // Inisiasi variabel untuk menyimpan data department
    $data = array();

    // Push data yang berbentuk object 1 per 1 ke variabel yang sudah dibuat tadi agar dikemas dalam bentuk array
    while ($row = $this->department->getResult()) {
      array_push($data, $row);
    }

    // Menutup jalur ke database
    $this->department->close();

    // Meneruskannya ke view
    $view = new DepartmentView();
    $view->render($data);

    
  }

  public function add($dept_name, $room_code) 
  {
    $this->department->open();
    $this->department->add($dept_name, $room_code);
    $this->department->close();
  }

  public function delete($id)
  {
    $this->department->open();
    $this->department->delete($id);
    $this->department->close();
  }

  public function update($id, $dept_name, $room_code)
  {
    $this->department->open();
    $this->department->update($id, $dept_name, $room_code);
    $this->department->close();

    // FIX: redirect setelah berhasil update
    header("Location: departments.php");
    exit;
  }

  public function showEditPage($id)
  {
    $this->department->open();
    
    $this->department->getDepartmenById($id);
    $row = $this->department->getResult();

    $data = [
        "id"        => $row[0],
        "dept_name" => $row[1],
        "room_code" => $row[2]
    ];

    $this->department->close();

    $view = new DepartmentEditView();
    $view->render($data);
  }
}
?>
