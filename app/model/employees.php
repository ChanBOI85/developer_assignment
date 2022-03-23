<?php

include_once CONFIG . 'database.php';

// 'employees' object
class Employees{
 
    // database connection and table name
    private $conn;
    private $table_name = "employees";
 
    // object properties
    public $employee_id;
    public $first_name;
    public $last_name;
    public $email;
    public $phone_number;
    public $hire_data;
    public $job_id;
    public $salary;
    public $manager_id;
    public $department_id;
 
    // constructor
    public function __construct(){
        $database = new Database();
        $db = $database->getConnection();
        $this->conn = $db;
    }

    //read all employee details
    function readAll()
    {   
        $query = "SELECT employees.employee_id, employees.first_name, employees.last_name, employees.email, employees.job_id, jobs.job_title FROM `employees` LEFT JOIN jobs ON employees.job_id = jobs.job_id ORDER BY employees.last_name;";
        // prepare the query
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute()) {
            $employee_arr['employees'] = array();
            
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $emp_item = array(
                    "employee_id" => $row['employee_id'],
                    "first_name" =>  $row['first_name'],
                    "last_name" =>  $row['last_name'],
                    "email" =>  $row['email'],
                    "job_id" =>  $row['job_id'],
                    "job_title" =>  $row['job_title']
                );

                array_push($employee_arr['employees'], $emp_item);
            }

            return $employee_arr;
        }
    }

    function readEmployee($id) {
        $query = "SELECT employees.employee_id, employees.first_name, employees.last_name, employees.email, employees.job_id, jobs.job_title, employees.phone_number, employees.hire_date, employees.salary, employees.manager_id, employees.department_id FROM `employees` LEFT JOIN jobs ON employees.job_id = jobs.job_id WHERE employees.employee_id = ". $id ." ORDER BY employees.last_name";
        // prepare the query
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute()) {
            $employee_arr['employees'] = array();
            
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $emp_item = array(
                    "employee_id" => $row['employee_id'],
                    "first_name" =>  $row['first_name'],
                    "last_name" =>  $row['last_name'],
                    "email" =>  $row['email'],
                    "job_id" =>  $row['job_id'],
                    "job_title" =>  $row['job_title'],
                    "phone_number" =>  $row['phone_number'],
                    "hire_date" =>  $row['hire_date'],
                    "salary" =>  $row['salary'],
                    "manager_id" =>  $row['manager_id'],
                    "department_id" => $row['department_id']
                );

                array_push($employee_arr['employees'], $emp_item);
            }

            return $employee_arr;
        }
    }

}