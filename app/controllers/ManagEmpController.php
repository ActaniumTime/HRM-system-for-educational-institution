<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    require_once 'config/database.php';
    require_once 'app/models/Employer.php';

    class ManagEmpController{

        private $connection;

        public function __construct($connection) {
            $this->connection = $connection;
        }

        public function updateEmpData($id){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $tempEmp = new Employer($this->connection);
                $tempEmp->loadByID($id);
                

            } else {

            }
        }
    }

?>