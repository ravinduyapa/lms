<?php
require_once 'models/Teacher.php';

class AdminController {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function dashboard() {
        include 'views/admin/dashboard.php';
    }

    public function addTeacher() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];

            $teacherModel = new Teacher($this->db);
            $teacherModel->addTeacher($name, $email);

            header('Location: /admin/view_teachers');
            exit();
        } else {
            include 'views/admin/add_teacher.php';
        }
    }

    public function viewTeachers() {
        $teacherModel = new Teacher($this->db);
        $teachers = $teacherModel->getAllTeachers();
        include 'views/admin/view_teachers.php';
    }
}
?>
