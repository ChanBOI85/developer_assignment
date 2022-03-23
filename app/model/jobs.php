<?php

include_once CONFIG . 'database.php';

// 'jobs' object
class Jobs{
 
    // database connection and table name
    private $conn;
    private $table_name = "jobs";
 
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

    //read all job details
    function readAll()
    {   
        $query = "SELECT * FROM jobs";
        // prepare the query
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute()) {
            $jobs_arr['jobs'] = array();
            
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $job_item = array(
                    "job_id" => $row['job_id'],
                    "job_title" =>  $row['job_title'],
                    "min_salary" =>  $row['min_salary'],
                    "max_salary" =>  $row['max_salary']
                );

                array_push($jobs_arr['jobs'], $job_item);
            }

            return $jobs_arr;
        }
    }

}