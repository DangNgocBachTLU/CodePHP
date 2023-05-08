<?php
    $page_title = "Update employee";
    include_once "Layout/header.php";
    echo "<div class='right-button-margin'><a href='index.php' class='btn btn-default pull-right'>Employee</a></div>";
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
    if($_POST){
        $employee->setName($_POST['name']);
        $employee->setAddress($_POST['address']);
        $employee->setBirth($_POST['birth']);
        $employee->setExperience($_POST['experience']);
        $employee->setBasicSalary($_POST['basicsalary']);
        if($employee->update()){
            header("location: index.php");
        }else{
            echo "<div class='alert alert-danger alert-dismissable'>Update failed</div>";
        }
    }
?>
<form action="<?php echo $_SERVER["PHP_SELF"]. "?id=" . $employee->getId();?>" method="post">

    <table class='table table-hover table-responsive table-bordered'>

        <tr>
            <td>Name</td>
            <td><input type='text' name='name' value='<?php echo $employee->getName(); ?>' class='form-control' /></td>
        </tr>

        <tr>
            <td>Address</td>
            <td><input type='text' name='address' value='<?php echo $employee->getAddress(); ?>' class='form-control' /></td>
        </tr>

        <tr>
            <td>Date of birth</td>
            <td><input type='date' name='birth' value='<?php echo $employee->getBirth(); ?>' class='form-control' /></td>
        </tr>

        <tr>
            <td>Year experience</td>
            <td><input type='text' name='experience' value='<?php echo $employee->getExperience(); ?>'class='form-control' /></td>
        </tr>

        <tr>
            <td>Basic salary</td>
            <td><input type='text' name='basicsalary' value='<?php echo $employee->getBasicSalary(); ?>' class='form-control' /></td>
        </tr>
        
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Update</button>
            </td>
        </tr>

    </table>
</form>