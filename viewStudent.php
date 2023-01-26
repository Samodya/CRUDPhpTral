<?php
    require("classes/Student.php");
    session_start();
    $students=Student::GetStudents();
    $bEdit= new Student(null,null,null,null,null,null);
    if(isset($_POST["btnEdit"])){
        $bEdit=$students[$_POST["btnEdit"]];
        $_SESSION["studentEdit"]=$bEdit;
        header("location:updateStudent.php");
    }
    if (isset($_POST["btnDelete"])) {
        try {
            Student::DeleteStudent($_POST["btnDelete"]);
        } catch (Exception $th) {
            throw $th;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet" 
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
          crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="icon" href="images/banner/graduated.png" type="image/icon type">
    <title>Student List</title>
</head>
<body class="">
    <div class="body-content">
        <div class="sidenav">
            <div class="top">
            <i class="bi bi-list-ul top-icon"> </i><h3>Menu</h3>
            </div>
            <hr>
            <div class="bottom-menu">
                <ul>
                   <li> <a href="index.php" class="non-active"><i class="bi bi-house-door-fill"></i> Home</a> </li>
                   <li> <a href="newStudent.php" class="non-active"><i class="bi bi-person-add"></i> Add new Student</a> </li> 
                   <li> <a href="" class="active-menu"><i class="bi bi-person-lines-fill"></i> View All students</a> </li>  
                   
                </ul>
            </div>
        </div>
        <div class="view-all-form">
        <div class="table-content">
        <?php
            $students=Student::GetStudents();
            if(sizeof($students)>0){
               
                echo '<form method="post" >
                    <table class="table student-table">';

                echo '<tr class="table-dark">
                        <th>Name </th>
                        <th>Course</th>
                        <th>Batch No</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th></th>
                        </tr>';
                        $rc=0;
                        foreach($students as $stu){
                            echo '<tr class="table-warning">
                            <td>'.$stu->GetStudentName().'</td>
                            <td>'.$stu->Getcourse().'</td>
                            <td>'.$stu->Getbatchno().'</td>
                            <td>'.$stu->Getcontact().'</td>
                            <td>'.$stu->Getaddress().'</td>
                            <td>'.$stu->Getemail().'</td>
                            <td><button type="submit" class="btn btn-danger mx-1" name="btnDelete"
                            value="'.$stu->GetSID().'">
                            <i class="bi bi-trash-fill"></i>
                            </button><button type="submit" class="btn btn-primary mx-1" name="btnEdit" 
                            value="'.$rc.'">
                            <i class="bi bi-pencil-fill"></i></button></td></tr>
                            ';
                            $rc++;
                        }
                        echo '</table></form>';
            } else 
                echo '<div class="messg"> No data to Display </div> '

        ?>
        
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
   
</body>
</html>