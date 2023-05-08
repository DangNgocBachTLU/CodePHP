<?php
    $page_title = "Insert employee";
    include_once "Layout/header.php";
    echo "<div class='right-button-margin'><a href='index.php' class='btn btn-default pull-right' style='text-decoration: none'>Employee</a></div>";
    include_once "Layout/footer.php";
?>
<?php
    include_once "Objects/employee.php";
    include_once "Objects/developer.php";
    include_once "Objects/manager.php";
    include_once "database.php";

    //khởi tạo dữ liệu
    $database = new Database();
    $db = $database->getConnection();
    $employee = new Employee($db);

    if($_POST){
        $employee->setName($_POST['name']);
        $employee->setAddress($_POST['address']);
        $employee->setBirth($_POST['birth']);
        $employee->setExperience($_POST['experience']);
        $employee->setBasicSalary($_POST['basicsalary']);
        
        if($employee->add()){
            header("location: index.php");
        }   else{
            echo "<div class='alert alert-danger alert-dismissable'>Insert failed</div>";
        }
    }
?>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">

    <table class='table table-hover table-responsive table-bordered'>

        <tr>
            <td>Name</td>
            <td><input type='text' name='name' class='form-control' /></td>
        </tr>

        <tr>
            <td>Address</td>
            <td><input type='text' name='address' class='form-control' /></td>
        </tr>

        <tr>
            <td>Date of birth</td>
            <td><input type='date' name='birth' class='form-control' /></td>
        </tr>

        <tr>
            <td>Year experience</td>
            <td><input type='text' name='experience' class='form-control' /></td>
        </tr>

        <tr>
            <td>Basic salary</td>
            <td><input type='text' name='basicsalary' class='form-control' /></td>
        </tr>

        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Add</button>
            </td>
        </tr>

    </table>
</form>