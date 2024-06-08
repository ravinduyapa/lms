<?php
session_start();

require '../config/database.php';
require '../controllers/AuthController.php';
require '../controllers/AdminController.php';

// Initialize database connection
try {
    $db = new PDO('mysql:host=localhost;dbname=learning_management;port=3306', 'root', '');

} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}

$url = $_SERVER['REQUEST_URI'];

if ($url === '/login') {
    $controller = new AuthController($db);
    $controller->login();
} elseif ($url === '/logout') {
    $controller = new AuthController($db);
    $controller->logout();
} elseif ($url === '/admin/dashboard') {
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
        header('Location: /login');
        exit();
    }
    $controller = new AdminController($db);
    $controller->dashboard();
} elseif ($url === '/admin/add_teacher') {
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
        header('Location: /login');
        exit();
    }
    $controller = new AdminController($db);
    $controller->addTeacher();
} elseif ($url === '/admin/view_teachers') {
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
        header('Location: /login');
        exit();
    }
    $controller = new AdminController($db);
    $controller->viewTeachers();
} else {
    header('Location: /login');
    exit();
}
?>
