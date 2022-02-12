<?php include_once("connection.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <title>Document</title>

    <style>
        .nav-item:hover {
            background-color: red;
            border-radius: 1em;
        }

        .dropdown:hover {
            background-color: red;
        }

        .dropdown-menu {
            background-color: rgb(43, 43, 43);
            color: white;
        }

        .dropdown-item {
            color: white;
        }

        .dropdown-item:hover {
            background-color: red;
            color: white;
        }
    </style>
</head>

<body style="background-color: cornflowerblue;">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">SMS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Attendance
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="index.php">Take Attendance</a>
                        <a class="dropdown-item" href="view.php">View Record</a>
                    </div>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Exam
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="examdate.php">Exam Schedule</a>
                        <a class="dropdown-item" href="seat.php">Seat Plan</a>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="add.php">Add new student</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>


    <div class="container my-4">
        <div class="card">
            <div class="panel panel-default container my-4">

                <div class="panel-heading">
                    <h1 style="text-align: center;">Student Management System</h1>
                    <h4>Class 1</h4>
                </div>

                <div class="panel-body">

                    <?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $name=$_POST['name'];
            $lname=$_POST['lname'];
            $class_id=$_POST['class_id'];
            $roll=$_POST['roll'];

            if($name=="" || $lname=="" || $class_id=="" || $roll==""){
                echo "<div class='alert alert-danger'>

                Fields must not be empty;

                </div>";
            }
            else if(!filter_var($roll,FILTER_VALIDATE_INT)){
                echo "<div class='alert alert-danger'>

                Not valid;

                </div>";
            }

            else{
            $query = "insert into stu(name,lname,class_id,roll) values('$name','$lname','1','$roll')";
            $result = $link->query($query);
            if($result){
                echo "<div class='alert alert-success'>

                Data inserted successfully;

                </div>";
            }
        }
    }
?>



                    <form method="post">
                        <a href="view.php" class="btn btn-md btn-primary">View Attendance Record</a>
                        <a href="index.php" style="float: right" class="btn btn-md btn-success">Go back to
                            attendance</a>

                        <div class="card my-4"
                            style=" border-width: 5px; border-radius: 2rem; border-color: rgb(65, 188, 230); padding: 3%;">
                            <div class="form-group my-4">
                                <label for="name">First Name:</label>
                                <input type="text" name="name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="name">Last Name:</label>
                                <input type="text" name="lname" class="form-control">
                            </div>

                            <div class="form-group">
                            <label for="name">Class:</label>
                                <div class="input-group">
                                    <select class="custom-select" name="class_id" id="inputGroupSelect02">
                                        <option selected>---Select Class---</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">Roll:</label>
                                <input type="text" name="roll" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="submit" style="margin-left: 45%" class="btn btn-primary">
                            </div>



                        </div>



                </div>


                <div class="panel-footer">

                </div>


            </div>
        </div>

    </div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
</body>

</html>