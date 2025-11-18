<?php
include_once("config.php");
include_once("models/Position.php");
include_once("view/PositionView.php");
include_once("view/PositionEditView.php");

class PositionController
{
  // Properti kontroller
  private $position;

  // Konstruktor Controller Position
  function __construct()
  {
    $this->position = new Position(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
  }

  // Method yang mengarahkan ke halaman umum controller position
  public function index()
  {
    // Menyambungkan/membuka jalur ke database
    $this->position->open();

    // Meneruskan request umum dari views (mengambil data position)
    $this->position->getPosition();

    // Inisiasi variabel untuk menyimpan data position
    $data = array();

    // Push data yang berbentuk object 1 per 1 ke variabel yang sudah dibuat tadi agar dikemas dalam bentuk array
    while ($row = $this->position->getResult()) {
      array_push($data, $row);
    }

    // Menutup jalur ke database
    $this->position->close();

    // Meneruskannya ke view
    $view = new PositionView();
    $view->render($data);
  }

  public function add($position_name) 
  {
      $this->position->open();
      $this->position->add($position_name);
      $this->position->close();
  }

  public function update($id, $position_name)
  {
    $this->position->open();
    $this->position->update($id, $position_name);
    $this->position->close();

    // FIX: redirect setelah berhasil update
    header("Location: positions.php");
    exit;
  }

  public function delete($id)
  {
    $this->position->open();
    $this->position->delete($id);
    $this->position->close();
  }

  public function showEditPage($id)
  {
    $this->position->open();
    
    $this->position->getPositionById($id);
    $row = $this->position->getResult();

    $data = [
        "id"        => $row[0],
        "position_name" => $row[1],
    ];

    $this->position->close();

    $view = new PositionEditView();
    $view->render($data);
  }
}
?>



  

