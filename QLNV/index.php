<?php
    $page_title = "List of employee";
    include_once "Layout/header.php";
    echo "<div class='right-button-margin'><a href='insert_em.php' class='btn btn-default pull-right'>Insert</a></div>";
    include_once "Layout/footer.php";
?>
<?php
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //Đặt số lượng bản ghi trên mỗi trang
    $records_per_page = 2;
    $from_record_num = ($records_per_page * $page) - $records_per_page;

    include_once "Objects/employee.php";
    include_once "Objects/developer.php";
    include_once "Objects/manager.php";
    include_once "database.php";
    //khởi tạo dữ liệu
    $database = new Database();
    $db = $database->getConnection();
    $employee = new Employee($db);
    
    //truy vấn emplyee
    $stmt = $employee->readAll($from_record_num, $records_per_page);
    $num = $stmt->rowCount();

    //hiển thị employee ra màn hình
    if($num>0){
 
        echo "<table class='table table-hover table-responsive table-bordered'>";
            echo "<tr>";
                echo "<th>Product</th>";
                echo "<th>Address</th>";
                echo "<th>Date of birth</th>";
                echo "<th>Year experience</th>";
                echo "<th>Basic salary</th>";
            echo "</tr>";
     
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                
                extract($row);
             
                echo "<tr>";
                    echo "<td>{$row['Name']}</td>";
                    echo "<td>{$row['Address']}</td>";
                    echo "<td>{$row['DateOfBirth']}</td>";
                    echo "<td>{$row['YearExperience']}</td>";
                    echo "<td>{$row['BasicSalary']}</td>";
                    echo "<td>";
                        echo "<a href='view_em.php?id={$row['ID']}' class='btn btn-primary left-margin'><span class='glyphicon glyphicon-list'></span> View </a>";
                        echo "<a href='update_em.php?id={$row['ID']}' class='btn btn-info left-margin'><span class='glyphicon glyphicon-edit'></span> Edit </a>";
                        echo "<a href='delete_em.php?id={$row['ID']}' class='btn btn-danger delete-object'><span class='glyphicon glyphicon-remove'></span> Delete </a>";
                    echo "</td>";
                echo "</tr>";
            }
        echo "</table>";

        $page_url = "index.php?";
        $total_rows = $employee->countAll();
        include_once 'pagination.php'; 
    }
?>