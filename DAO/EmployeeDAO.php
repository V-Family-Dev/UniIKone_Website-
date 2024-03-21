<?php
require "../DB/dbconfig.php";
require "../Model/employee.php";


// Create Employee class
class EmployeeDao{
    // Database connection and table name
    private $conn;
    private $table_name = "employees";

    // constructor 
    public function __construct($db) {
        $this->conn = $db;
    }

    // Get all employees
    

}