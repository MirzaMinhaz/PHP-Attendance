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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>

    <title>Document</title>

    <style>

        .nav-item:hover {
            background-color: red;
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

        .dropdown-item:hover{
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
    <h1 style="text-align: center;">Attendance System</h1>
</div>

<div class="panel-body">
    <a href="viewtwo.php" class="btn btn-md btn-primary">Go back</a>
    <a href="view.php" class="btn btn-md btn-info">Go back to view all</a>
    <!-- <a href="add.php" style="float: right" class="btn btn-md btn-success">Add</a> -->

    

<form method="post">
    <table class="table my-4">

<thead style="background-color: rgb(97, 184, 241);">

    <tr>
        <td>Sr No.</td>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Class</td>
        <td>Roll</td>
        <td>Attendance</td>
    </tr>
</thead>


            <?php

                if($_GET['date']){
                    $date=$_GET['date'];

                $query = "SELECT stu.*,attendance.*
                FROM attendance
                inner join stu on attendance.stu_id=stu.stu_id and stu.class_id='2' and attendance.date=
                '$date' ORDER BY stu.roll ASC";
                $result = $link->query($query);

                if($result->num_rows>0){
                    $i=0;
                    while ($val=$result->fetch_assoc()) {
                        $i++;
                    


            ?>





<tr>

    <td><?php echo $i; ?></td>

    <td><?php echo $val['name']; ?></td>
    
    <td><?php echo $val['lname']; ?></td>

    <td><?php echo $val['class_id']; ?></td>

    <td><?php echo $val['roll']; ?></td>

    <td>

        present <input type="radio"
        
        value="Present"
        <?php

            if($val['value']=='Present')
            echo "checked";

        ?>
        >
        
        Absent <input type="radio"
        
        value="Absent"
        <?php

            if($val['value']=='Absent')
            echo "checked";

        ?>

        >


    </td>

    
</tr>
<?php } } } ?>

    
</div>

<!-- <div class="bg-light text-center mb-3">
	<h4 class="m-0 py-3"><strong>Date</strong>: <?php echo $date='date'; ?></h4>
	</div> -->


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