<?php   
    include_once "Objects/employee.php";
    include_once "database.php";
    
    $database = new Database();
    $db = $database->getConnection();
    $employee = new Employee($db);

    if(isset($_GET['id'])){
        $employee->setId($_GET['id']);
    }
    $employee->viewEm();
    if($_GET){
        if($employee->delete()){
            header("location: index.php");
        }
    }
?>