<?php
    require("classes/Student.php");
    session_start();
    $students=Student::GetStudents();
    if(!isset($_SESSION["studentEdit"])){
        header("location:viewStudent.php");
    }

    if(isset($_POST["btnUpdate"])){

        $students=array();
        if(isset($_SESSION["student"])){
            $students = $_SESSION["student"];
        }

        $student = new Student(
            $_POST["txtNameEdit"],
            $_POST["txtContactEdit"],
            $_POST["txtAddressEdit"],
            $_POST["txtEmailEdit"],
            $_POST["txtBatchEdit"],
            $_POST["txtCourseEdit"]
        );

        try {
            $student->SetSID($_SESSION["studentEdit"]->GetSID());
            $student->UpdateStudent();
            header("location:viewStudent.php");
            //unset($_SESSION["studentEdit"]);
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
                   <li> <a href="newStudent.php" class="non-active"><i class="bi bi-person-add"></i> Add new Student</a> </li> 
                   <li> <a href="viewStudent.php" class="non-active"><i class="bi bi-person-lines-fill"></i> View All students</a> </li>  
                   
                </ul>
            </div>
        </div>
        <div class="add-new-form">
            <form action="" method="post" class="text-light bg-primary p-3 new-student-form">
                <div class="d-flex form-top">
                <h1><i class="bi bi-person-fill-up"></i> Update Student Details</h1>
                <button type="submit" 
                        class="btn btn-success fw-bold px-2"
                        name="btnPrint2">
                    View Students</a>
                </div>
                <ul >
                    <li>Student Name:</li>
                    <li><input type="text" name="txtNameEdit" class="form-control"
                        value="<?php
                                if ($_SESSION["studentEdit"]->GetStudentName() !=null) {
                                    echo $_SESSION["studentEdit"]->GetStudentName();
                                }
                            ?>
                        "></li>
                    <li>Contact No:</li>
                    <li><input type="text" name="txtContactEdit" class="form-control"
                        value="<?php
                                if ($_SESSION["studentEdit"]->Getcontact() !=null) {
                                    echo $_SESSION["studentEdit"]->Getcontact();
                                }
                            ?>
                        "></li>
                    <li>Address:</li>
                    <li><input type="text" name="txtAddressEdit" class="form-control"
                        value="<?php
                                if ($_SESSION["studentEdit"]->Getaddress() !=null) {
                                    echo $_SESSION["studentEdit"]->Getaddress();
                                }
                            ?>
                        "></li>
                    <li>Email:</li>
                    <li><input type="email" name="txtEmailEdit" class="form-control"
                        value="<?php
                                if ($_SESSION["studentEdit"]->Getemail() !=null) {
                                    echo $_SESSION["studentEdit"]->Getemail();
                                }
                            ?>
                        "></li>
                    <li>Batch No:</li>
                    <li><input type="text" name="txtBatchEdit" class="form-control"
                        value="<?php
                                if ($_SESSION["studentEdit"]->Getbatchno() !=null) {
                                    echo $_SESSION["studentEdit"]->Getbatchno();
                                }
                            ?>
                        "></li>
                    <li>Course:</li>
                    <li><input type="text" name="txtCourseEdit" class="form-control"
                        value="<?php
                                if ($_SESSION["studentEdit"]->Getcourse() !=null) {
                                    echo $_SESSION["studentEdit"]->Getcourse();
                                }
                            ?>
                        "></li>
                    <li class="d-flex"><button type="submit" 
                        class="btn btn-danger fw-bolder ms-auto mt-2" name="btnUpdate"> Update Student</button></li>
                </ul>
            </form>
        
                <?php
                    if (isset($_POST["btnPrint2"])) {
                        $students=array();
                        if($_SESSION["student"]->GetStudentName){
                            $students=$_SESSION["student"];
                           
                            
                        }

                        header("location:viewStudent.php");
                    } 
                ?>
               
            
        </div>
    </div>
</body>
</html>