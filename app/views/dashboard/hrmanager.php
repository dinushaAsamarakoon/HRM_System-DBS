<!doctype html>
<html lang="en">
<head>
    <?php
    require_once(ROOT . DS . 'app' . DS . 'views' . DS . 'header' . DS . 'headerFile.php');
    ?>

    <title>Dashboard</title>
</head>
<body>
<div class="shadow p-3">
    <nav class="navbar navbar-expand-lg bg-light ">
        <div class="container-fluid">
            <!--            <a class="navbar-brand" href="#">Navbar scroll</a>-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end  " id="navbarScroll"
                 style="padding-top: 9px;height: 50px;">

                <ul class="nav  " id="pills-tab" role="tablist">

                    <li class="nav-item ">
                        <a class="nav-link" id="pills-notification-tab" data-toggle="pill" href="#pills-notifications"
                           role="tab" aria-controls="pills-notifications" aria-selected="false"><i
                                    class="fa-regular fa-bell"></i></a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link active " id="pills-logout-tab" data-toggle="pill" href="#pills-logout"
                           role="tab" aria-controls="pills-logout" aria-selected="true"
                           style="color: #0c63e4;font-size: 20px;">logout</a>

                    </li>


                </ul>

            </div>
        </div>
    </nav>

</div>
<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <!--            <h3>Bootstrap Sidebar</h3>-->
            <button type="button" id="sidebarCollapse" class="btn " style="background-color: #7386D5;">
                <i class="fa-solid fa-align-justify"></i>
            </button>
        </div>
        <br> <br> <br> <br>

        <ul class="list-unstyled components " id="list1">

            <li>
                <a href="../profile/employee.php"><i class="fa-solid fa-user"></i> Profile </a>
            </li>
            <li>
                <a href="#"><i class="fa-solid fa-message"></i> Notifications</a>
            </li>
            <li>
                <a href="#"><i class="fa-solid fa-circle-question"></i> Help</a>
            </li>
        </ul>
    </nav>

    <!-- Page Content -->
    <div class="container">


        <div class="row pt-lg-5">
            <div class="col-sm-12 ">
                <div class="card">
                    <div class="card-body shadow  px-lg-5">
                        <h5 class="card-title">Add the employee to the system</h5>
                        <p class="card-text">You can add the employee details to from this</p>
                        <a href="../register/addEmployee.php" class="btn btn-primary justify-content-center"><i
                                    class="fa-solid fa-user-plus"></i> Add Employee</a>
                    </div>
                </div>
            </div>

        </div>
        <div class="row pt-lg-3">
            <div class="col-sm-12">
                <div class="card h-100">
                    <div class="card-body shadow px-lg-5">
                        <h5 class="card-title">View Employee details</h5>
                        <p class="card-text">You can view the all the employees details of the system </p>
                        <a href="#" class="btn btn-primary"><i class="fa-light fa-file-circle-info"></i> View
                            Details</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-lg-3">
            <div class="col-sm-12">
                <div class="card ">
                    <div class="card-body shadow px-lg-5">
                        <h5 class="card-title">View employee reports</h5>
                        <p class="card-text">You can view all the employee's reports of the company</p>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                View Report <i class="fa-solid fa-caret-down"></i>
                            </button>
                            <div class="p-0">

                            <div class="dropdown-menu w-100" aria-labelledby="dropdownMenu2">
                                <button class="dropdown-item" type="button"><i class="fa-solid fa-arrow-left-long"></i><a href="../employeeDept/EmployeeByDept.php">Employee by department report</a></button>
                                <button class="dropdown-item" type="button"><i class="fa-solid fa-arrow-left-long"></i> Total leave report</button>
                                <button class="dropdown-item" type="button"><i class="fa-solid fa-arrow-left-long"></i> Employee report</button>
                                <button class="dropdown-item" type="button"><i class="fa-solid fa-arrow-left-long"></i> Custom report</button>
                            </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>

</div>


</body>
</html>
