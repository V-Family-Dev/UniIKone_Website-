<?php
require "../DB/dbconfig.php";
// Create Employee class
class Employee {
    // Database connection and table name
    private $conn;
    private $table_name = "employees";

    // Private properties correspoding table columns
    private $idEmployees;
    private $firstName;
    private $lastName;
    private $nic;
    private $empNumber;
    private $ref;
    private $phone;
    private $houseNumber;
    private $street;
    private $city; 
    private $province;
    private $PostalCode;
    private $accountNum;
    private $BankName;
    private $bankCode;
    private $branchName;
    private $branchCode;
    private $empStatus;
    private $joinedDate;
    private $address;
    private $phoneAlt;
    private $nameinbank;

    // Constructor with $db as database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // Getters and Setters
    public function getIdEmployees() {
        return $this->idEmployees;
    }
    public function setIdEmployees($idEmployees) {
        $this->idEmployees = $idEmployees;
    }
    public function getFirstName() {
        return $this->firstName;
    }
    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }
    public function getLastName() {
        return $this->lastName;
    }
    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }
    public function getNic() {
        return $this->nic;
    }
    public function setNic($nic) {
        $this->nic = $nic;
    }
    public function getEmpNumber() {
        return $this->empNumber;
    }
    public function setEmpNumber($empNumber) {
        $this->empNumber = $empNumber;
    }
    public function getRef() {
        return $this->ref;
    }
    public function setRef($ref) {
        $this->ref = $ref;
    }
    public function getPhone() {
        return $this->phone;
    }
    public function setPhone($phone) {
        $this->phone = $phone;
    }
    public function getHouseNumber() {
        return $this->houseNumber;
    }

    public function setHouseNumber($houseNumber) {
        $this->houseNumber = $houseNumber;
    }
    public function getStreet() {
        return $this->street;
    }
    public function setStreet($street) {
        $this->street = $street;
    }
    public function getCity() {
        return $this->city;
    }
    public function setCity($city) {
        $this->city = $city;
    }
    public function getProvince() {
        return $this->province;
    }
    public function setProvince($province) {
        $this->province = $province;
    }
    public function getPostalCode() {
        return $this->PostalCode;
    }
    public function setPostalCode($PostalCode) {
        $this->PostalCode = $PostalCode;
    }
    public function getAccountNum() {
        return $this->accountNum;
    }
    public function setAccountNum($accountNum) {
        $this->accountNum = $accountNum;
    }
    public function getBankName() {
        return $this->BankName;
    }
    public function setBankName($BankName) {
        $this->BankName = $BankName;
    }
    public function getBankCode() {
        return $this->bankCode;
    }
    public function setBankCode($bankCode) {
        $this->bankCode = $bankCode;
    }
    public function getBranchName() {
        return $this->branchName;
    }
    public function setBranchName($branchName) {
        $this->branchName = $branchName;
    }
    public function getBranchCode() {
        return $this->branchCode;
    }
    public function setBranchCode($branchCode) {
        $this->branchCode = $branchCode;
    }
    public function getEmpStatus() {
        return $this->empStatus;
    }
    public function setEmpStatus($empStatus) {
        $this->empStatus = $empStatus;
    }
    public function getJoinedDate() {
        return $this->joinedDate;
    }
    public function setJoinedDate($joinedDate) {
        $this->joinedDate = $joinedDate;
    }
    public function getAddress() {
        return $this->address;
    }
    public function setAddress($address) {
        $this->address = $address;
    }
    public function getPhoneAlt() {
        return $this->phoneAlt;
    }
    public function setPhoneAlt($phoneAlt) {
        $this->phoneAlt = $phoneAlt;
    }
    public function getNameinbank() {
        return $this->nameinbank;
    }
    public function setNameinbank($nameinbank) {
        $this->nameinbank = $nameinbank;
    }  

}