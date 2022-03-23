<?php

include_once CONFIG . 'database.php';

// 'departments' object
class Departments{
 
    // database connection and table name
    private $conn;
    private $table_name = "departments";
 
    // object properties
    public $department_id;
    public $department_name;
    public $location_id;
 
    // constructor
    public function __construct(){
        $database = new Database();
        $db = $database->getConnection();
        $this->conn = $db;
    }

    //read all department details
    function readAll()
    {   
        $query = "SELECT departments.department_id, departments.department_name, locations.street_address, locations.postal_code, locations.city, locations.state_province, locations.country_id FROM `departments` LEFT JOIN locations ON departments.location_id = locations.location_id ORDER BY departments.department_name";
        // prepare the query
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute()) {
            $department_arr['departments'] = array();
            
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $department_item = array(
                    "department_id" => $row['department_id'],
                    "department_name" =>  $row['department_name'],
                    "street_address" =>  $row['street_address'],
                    "postal_code" =>  $row['postal_code'],
                    "city" =>  $row['city'],
                    "state_province" =>  $row['state_province'],
                    "country_id" =>  $row['country_id']
                );

                array_push($department_arr['departments'], $department_item);
            }

            return $department_arr;
        }
    }

    function readDepartment($id) {
        $query = "SELECT departments.department_id, departments.department_name, locations.street_address, locations.postal_code, locations.city, locations.state_province, locations.country_id FROM `departments` LEFT JOIN locations ON departments.location_id = locations.location_id WHERE departments.department_id = ". $id ." ORDER BY departments.department_name";
        // prepare the query
        $stmt = $this->conn->prepare($query);

        if ($stmt->execute()) {
            $department_arr['departments'] = array();
            
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $department_item = array(
                    "department_id" => $row['department_id'],
                    "department_name" =>  $row['department_name'],
                    "street_address" =>  $row['street_address'],
                    "postal_code" =>  $row['postal_code'],
                    "city" =>  $row['city'],
                    "state_province" =>  $row['state_province'],
                    "country_id" =>  $row['country_id']
                );

                array_push($department_arr['departments'], $department_item);
            }

            return $department_arr;
        }
    }

}