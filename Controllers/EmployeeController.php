<?php
require_once '../DAO/EmployeeDAO.php';
require_once 'Controllers.php';
// EmployeeController
class EmployeeController extends Controllers {  // Ensure the base controller class name is correct
    // Database connection and table name
    private $conn;
    private $employeeDao;

    // Constructor
    public function __construct($db) {
        $this->conn = $db;
        $this->employeeDao = new EmployeeDao($db);
    }

    // Get all employees
    public function index() {try{
        $employees = $this->employeeDao->findAll();
        $controller = new Controllers();
        $controller->loadView('empDashboard', ['employees' => $employees]);
    }catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
 }

    // Get employee by id
    public function findById($id) {
        return $this->employeeDao->findById($id);
    }
}
