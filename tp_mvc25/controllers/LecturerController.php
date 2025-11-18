<?php
include_once("config.php");
include_once("models/Lecturer.php");
include_once("models/Department.php");
include_once("models/Position.php");
include_once("view/LecturerView.php");
include_once("view/LecturerEditView.php");

class LecturerController
{
  private $lecturer;
  private $department;
  private $position;

  function __construct()
  {
    $this->lecturer = new Lecturer(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
    $this->department = new Department(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
    $this->position = new Position(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
  }

  public function index()
  {
    $this->lecturer->open();
    $this->department->open();
    $this->position->open();

    $this->lecturer->getLecturer();
    $this->department->getDepartment();
    $this->position->getPosition();

    $data = [
      'lecturer' => [],
      'department' => [],
      'position' => []
    ];

    while ($row = $this->lecturer->getResult()) {
      $data['lecturer'][] = $row;
    }
    while ($row = $this->department->getResult()) {
      $data['department'][] = $row;
    }
    while ($row = $this->position->getResult()) {
      $data['position'][] = $row;
    }

    $this->lecturer->close();
    $this->department->close();
    $this->position->close();

    $view = new LecturerView();
    $view->render($data);
  }

  public function add($name, $nidn, $phone, $join_date, $dept_id, $position_id)
  {
    $this->lecturer->open();
    $this->lecturer->add($name, $nidn, $phone, $join_date, $dept_id, $position_id);
    $this->lecturer->close();
  }

  public function delete($id)
  {
    $this->lecturer->open();
    $this->lecturer->delete($id);
    $this->lecturer->close();
  }

  public function update($id, $name, $nidn, $phone, $join_date, $dept_id, $position_id)
  {
      $this->lecturer->open();
      $this->lecturer->update($id, $name, $nidn, $phone, $join_date, $dept_id, $position_id);
      $this->lecturer->close();
  }



  public function showEditPage($id)
  {
    $this->lecturer->open();
    $this->department->open();
    $this->position->open();

    $this->lecturer->getLecturerById($id);
    $this->department->getDepartment();
    $this->position->getPosition();

    $data = [
      'lecturer' => [],
      'department' => [],
      'position' => []
    ];

    while ($row = $this->lecturer->getResult()) {
      $data['lecturer'][] = $row;
    }
    while ($row = $this->department->getResult()) {
      $data['department'][] = $row;
    }
    while ($row = $this->position->getResult()) {
      $data['position'][] = $row;
    }

    $this->lecturer->close();
    $this->department->close();
    $this->position->close();

    // FIX: kirim data dengan format benar
    $view = new LecturerEditView();
    $view->render($data['lecturer'][0], $data['department'], $data['position']);
  }
}
?>
