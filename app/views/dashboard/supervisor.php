<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supervisor Dashboard</title>
</head>
<body>
    
</body>
</html>
=======


<!doctype html>
<html lang="en">
<head>
    <?php include('../header/headerFile.php') ?>
    <script src="../../script/Sidemenu.js"></script>
    <title>Dashboard</title>
</head>
<body>
<div class="shadow p-3"  >
    <nav class="navbar navbar-expand-lg bg-light " >
        <div class="container-fluid">
            <!--            <a class="navbar-brand" href="#">Navbar scroll</a>-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"  data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end  " id="navbarScroll" style="padding-top: 9px;height: 50px;">

                <ul class="nav  " id="pills-tab" role="tablist">

                    <li class="nav-item ">
                        <a class="nav-link" id="pills-notification-tab" data-toggle="pill" href="#pills-notifications" role="tab" aria-controls="pills-notifications" aria-selected="false"><i class="fa-regular fa-bell"></i></a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link active " id="pills-logout-tab" data-toggle="pill" href="#pills-logout" role="tab" aria-controls="pills-logout" aria-selected="true" style="color: #0c63e4;font-size: 20px;">logout</a>

                    </li>


                </ul>

            </div>
        </div>
    </nav>

</div>
<div class="wrapper" >
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">

            <button type="button" id="sidebarCollapse" class="btn " style="background-color: #7386D5;">
                <i class="fa-solid fa-align-justify"></i>
            </button>
        </div>
        <br>  <br>  <br>  <br>

        <ul class="list-unstyled components " id="list1">

            <li>
                <a href="../profile/employee.php"><i class="fa-solid fa-user" ></i> Profile </a>
            </li>
            <li>
                <a href="#"><i class="fa-solid fa-message"></i> Notifications</a>
            </li>
            <li>
                <a href="../help/Help.php"><i class="fa-solid fa-circle-question"></i> Help</a>
            </li>
        </ul>
    </nav>

    <!-- Page Content -->
    <div class="container">



        <div class="row pt-lg-5">
            <div class="col-sm-12">
                <div class="card h-100">
                    <div class="card-body shadow px-lg-5">
                        <h5 class="card-title">View leave applications</h5>
                        <p class="card-text">You can view the all the employee leave applications from the system</p>
                        <a href="#" class="btn btn-primary"><i class="fa-light fa-file-circle-info"></i> View leave application</a>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>

<a href="<?=SROOT?>EmployeeLeave/approval">Leave Requests</a>
    <?php if ($this->requests){ echo count($this->requests); } ?>

</body>
</html>
