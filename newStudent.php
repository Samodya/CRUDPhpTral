<?php
    require("classes/Student.php");
    session_start();
    
    if(isset($_POST["btnAdd"])){

        $students=array();
        if(isset($_SESSION["student"])){
            $students = $_SESSION["student"];
        }

        $student = new Student(
            $_POST["txtName"],
            $_POST["txtContact"],
            $_POST["txtAddress"],
            $_POST["txtEmail"],
            $_POST["txtBatch"],
            $_POST["txtCourse"]
        );

        try {
            $student->AddStudent();

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
    <title>Add a new student</title>
</head>
<body>
    <div class="body-content">
        <div class="sidenav">
            <div class="top">
            <i class="bi bi-list-ul top-icon"> </i><h3>Menu</h3>
            </div>
            <hr>
            <div class="bottom-menu">
                <ul>
                   <li> <a href="index.php" class="non-active"><i class="bi bi-house-door-fill"></i> Home</a> </li>
                   <li> <a href="newStudent.php" class="active-menu"><i class="bi bi-person-add"></i> Add new Student</a> </li> 
                   <li> <a href="viewStudent.php" class="non-active"><i class="bi bi-person-lines-fill"></i> View All students</a> </li>  
                   
                </ul>
            </div>
        </div>
        <div class="add-new-form">
        
            <form action="" method="post" class="text-light bg-dark p-3 new-student-form">
                <div class="d-flex form-top">
                <h1><i class="bi bi-person-add"></i> New Student</h1>
                <button type="submit" 
                        class="btn btn-success fw-bold px-2"
                        name="btnPrint">
                    View Students</a>
                </div>
                <ul >
                    <li>Student Name:</li>
                    <li><input type="text" name="txtName" class="form-control"></li>
                    <li>Contact No:</li>
                    <li><input type="number" name="txtContact" class="form-control"></li>
                    <li>Address:</li>
                    <li><input type="text" name="txtAddress" class="form-control"></li>
                    <li>Email:</li>
                    <li><input type="email" name="txtEmail" class="form-control"></li>
                    <li>Batch No:</li>
                    <li><input type="text" name="txtBatch" class="form-control"></li>
                    <li>Course:</li>
                    <li><input type="text" name="txtCourse" class="form-control"></li>
                    <li class="d-flex"><button type="submit" 
                        class="btn btn-danger fw-bolder ms-auto mt-2" name="btnAdd"> Add New Student</button></li>
                </ul>
            </form>
        
                <?php
                    if (isset($_POST["btnPrint"])) {
                        $students=array();
                        if(isset($_SESSION["student"])){
                            $students=$_SESSION["student"];
                        }

                        header("location:viewStudent.php");
                    } 
                ?>
               
            
        </div>
    </div>
</body>
</html>