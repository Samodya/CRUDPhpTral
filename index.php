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
    <title>Student Registration</title>
</head>
<body class="bg-dark">
    <div class="body-content">
        <div class="sidenav">
            <div class="top">
            <i class="bi bi-list-ul top-icon"> </i> <h3>  Menu</h3>
            </div>
            <hr>
            <div class="bottom-menu">
                <ul>
                   <li> <a href="index.php" class="active-menu"><i class="bi bi-house-door-fill"></i> Home</a> </li>
                   <li> <a href="newStudent.php" class="non-active"><i class="bi bi-person-add"></i> Add new Student</a> </li> 
                   <li> <a href="viewStudent.php" class="non-active"><i class="bi bi-person-lines-fill"></i> View All students</a> </li>  
                   
                </ul>
            </div>
        </div>
        <div class="page-content">
            <div class="bg-warning title-bar">
                <h1>Student Registratin Form</h1>
            </div>
            <div class="banner d-flex bg-secondary">
                
                    <img src="images/banner/graduated.png" class="w-25 cover-img">
                    <div class="banner-content text-white">Welcome to the student registration</div>

            </div>
            <div class="bg-dark manage-student">
                <h2 class="text-warning"> Manage Students</h2>
                <div class="row bottom-content" >
                <div class="col-md-5 addStu">
                    <img src="images/page-content/student.png">
                    <a href="newStudent.php" class="btn btn-danger">Add a New Student</a>
                </div>
                <div class="col-md-5 view">
                <img src="images/page-content/students.png">
                <a href="viewStudent.php" class="btn btn-warning">View All Students</a>
                </div>
                </div>
            </div>
        </div>

        
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

</body>
</html>