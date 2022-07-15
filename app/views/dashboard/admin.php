<!doctype html>
<html lang="en">
<head>

    <?php require_once(ROOT . DS . 'app' . DS . 'views' . DS . 'header' . DS . 'headerFile.php'); ?>

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
                    <li class="nav-item">
                        <a class="nav-link active " id="pills-logout-tab" data-toggle=""
                           href="<?= SROOT ?>AdminFunctionHandler/logout"
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
        <div class="sidebar-header w-100 bg-opacity-75 bg-gradient shadow ">
            <div class="container shadow d-flex justify-content-center">
                <div class="row  ">
                    <div class="col-md-10">
                        <h4> Dashboard</h4>
                    </div>
                    <div class="col-md-1">
                        <button type="button" id="sidebarCollapse" class="btn " style="background-color: #7386D5;">
                            <i class="fa-solid fa-align-justify"></i>
                        </button>
                    </div>

                </div>
            </div>
        </div>
        <br> <br> <br>

        <ul class="list-unstyled components " id="list1">

            <li>
                <a href="<?= SROOT ?>Profile/display/<?= $this->id; ?>"><i class="fa-solid fa-user"></i> Profile </a>
            </li>
<!--            <li>-->
<!--                <a href="#"><i class="fa-solid fa-message"></i> Notifications</a>-->
<!--            </li>-->
            <li>
                <a href="<?= SROOT ?>app/views/help/Help.php"><i class="fa-solid fa-circle-question"></i> Help</a>
            </li>
        </ul>
    </nav>

    <!-- Page Content -->
    <div class="container">


        <div class="row pt-lg-5">
            <div class="col-sm-12 ">
                <div class="card">
                    <div class="card-body shadow  px-lg-5">
                        <h5 class="card-title">Add HR manager to the system</h5>
                        <p class="card-text">You can add the HR manger's details to the system</p>
                        <a href="<?= SROOT ?>AdminFunctionHandler/addHRManager"
                           class="btn btn-primary justify-content-center"><i class="fa-solid fa-user-plus"></i> Add HR
                            manager</a>
                    </div>
                </div>
            </div>

        </div>

        <div class="row pt-lg-5">
            <div class="col-sm-12 ">
                <div class="card">
                    <div class="card-body shadow  px-lg-5">
                        <h5 class="card-title">Create new table</h5>
                        <p class="card-text">You can define the new database table</p>
                        <a href="<?= SROOT ?>AdminFunctionHandler/addEmployeeAttribute"
                           class="btn btn-primary justify-content-center"><i class="fa-solid fa-user-plus"></i> Create
                            table</a>
                    </div>
                </div>
            </div>

        </div>


    </div>
</div>
</body>
</html>

