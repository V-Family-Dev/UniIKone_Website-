<?php
require "../DB/dbconfig.php";
require "../Model/Employee.php";


// Create Employee class
class EmployeeDao
{
    // Database connection and table name
    private $conn;

    // constructor 
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Get all employees
    public function findAll()
    {
        try {
            $query = "SELECT * FROM employees";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            $employeeArray = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $employee = new Employee($this->conn);
                $employee->setIdEmployees($row['idEmployees']);
                $employee->setFirstName($row['firstName']);
                $employee->setLastName($row['lastName']);
                $employee->setNic($row['nic']);
                $employee->setEmpNumber($row['empNumber']);
                $employee->setRef($row['ref']);
                $employee->setPhone($row['phone']);
                $employee->setHouseNumber($row['houseNumber']);
                $employee->setStreet($row['street']);
                $employee->setCity($row['city']);
                $employee->setProvince($row['province']);
                $employee->setPostalCode($row['PostalCode']);
                $employee->setAccountNum($row['accountNum']);
                $employee->setBankName($row['BankName']);
                $employee->setBankCode($row['bankCode']);
                $employee->setBranchName($row['branchName']);
                $employee->setBranchCode($row['branchCode']);
                $employee->setEmpStatus($row['empStatus']);
                $employee->setJoinedDate($row['joinedDate']);
                $employee->setAddress($row['address']);
                $employee->setPhoneAlt($row['phoneAlt']);
                $employee->setNameinbank($row['nameinbank']);

                $employeeArray[] = $employee;
            }
            return $employeeArray;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Get employee by id
    public function findById($id)
    {
        try {
            $query = "SELECT * FROM employees WHERE idEmployees = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $id);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $employee = new Employee($this->conn);
            $employee->setIdEmployees($row['idEmployees']);
            $employee->setFirstName($row['firstName']);
            $employee->setLastName($row['lastName']);
            $employee->setNic($row['nic']);
            $employee->setEmpNumber($row['empNumber']);
            $employee->setRef($row['ref']);
            $employee->setPhone($row['phone']);
            $employee->setHouseNumber($row['houseNumber']);
            $employee->setStreet($row['street']);
            $employee->setCity($row['city']);
            $employee->setProvince($row['province']);
            $employee->setPostalCode($row['PostalCode']);
            $employee->setAccountNum($row['accountNum']);
            $employee->setBankName($row['BankName']);
            $employee->setBankCode($row['bankCode']);
            $employee->setBranchName($row['branchName']);
            $employee->setBranchCode($row['branchCode']);
            $employee->setEmpStatus($row['empStatus']);
            $employee->setJoinedDate($row['joinedDate']);
            $employee->setAddress($row['address']);
            $employee->setPhoneAlt($row['phoneAlt']);
            $employee->setNameinbank($row['nameinbank']);

            return $employee;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Create employee
    public function create($employee)
    {
        try {
            $query = "INSERT INTO employees (firstName, lastName, nic, empNumber, ref, phone, houseNumber, street, city, province, PostalCode, accountNum, BankName, bankCode, branchName, branchCode, empStatus, joinedDate, address, phoneAlt, nameinbank) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $employee->getFirstName());
            $stmt->bindParam(2, $employee->getLastName());
            $stmt->bindParam(3, $employee->getNic());
            $stmt->bindParam(4, $employee->getEmpNumber());
            $stmt->bindParam(5, $employee->getRef());
            $stmt->bindParam(6, $employee->getPhone());
            $stmt->bindParam(7, $employee->getHouseNumber());
            $stmt->bindParam(8, $employee->getStreet());
            $stmt->bindParam(9, $employee->getCity());
            $stmt->bindParam(10, $employee->getProvince());
            $stmt->bindParam(11, $employee->getPostalCode());
            $stmt->bindParam(12, $employee->getAccountNum());
            $stmt->bindParam(13, $employee->getBankName());
            $stmt->bindParam(14, $employee->getBankCode());
            $stmt->bindParam(15, $employee->getBranchName());
            $stmt->bindParam(16, $employee->getBranchCode());
            $stmt->bindParam(17, $employee->getEmpStatus());
            $stmt->bindParam(18, $employee->getJoinedDate());
            $stmt->bindParam(19, $employee->getAddress());
            $stmt->bindParam(20, $employee->getPhoneAlt());
            $stmt->bindParam(21, $employee->getNameinbank());
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
