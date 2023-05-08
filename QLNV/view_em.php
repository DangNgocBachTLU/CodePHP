<?php
    $page_title = "Employee properties";
    include_once "Layout/header.php";
    echo "<div class='right-button-margin'><a href='index.php' class='btn btn-default pull-right' style='text-decoration: none'>Employee</a></div>";
    include_once "Layout/footer.php";
?>
<?php
    include_once "Objects/employee.php";
    include_once "Objects/developer.php";
    include_once "Objects/manager.php";
    include_once "database.php";
    
    $database = new Database();
    $db = $database->getConnection();
    $employee = new Employee($db);
    
    if(isset($_GET['id'])){
        $employee->setId($_GET['id']);
    }
    $employee->viewEm();

    $type = ($employee->getType()==1) ? 'Developer' : 'Manager';

    echo "<table class='table table-hover table-responsive table-bordered'>
 
            <tr>
                <td>Name</td>
                <td>{$employee->getName()}</td>
            </tr>

            <tr>
                <td>Address</td>
                <td>{$employee->getAddress()}</td>
            </tr>

            <tr>
                <td>Date of birth</td>
                <td>{$employee->getBirth()}</td>
            </tr>

            <tr>
                <td>Year experience</td>
                <td>{$employee->getExperience()}</td>
            </tr>

            <tr>
                <td>Basic salary</td>
                <td>{$employee->getBasicSalary()}</td>
            </tr>
            <tr>
                <td>Type</td>
                <td>{$type}</td>
            </tr>

        </table>";
?>