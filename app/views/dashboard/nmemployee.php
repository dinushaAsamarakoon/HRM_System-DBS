<!doctype html>
<html lang="en">
<head>

    <?php
    require_once(ROOT . DS . 'app' . DS . 'views' . DS . 'header' . DS . 'headerFile.php');
    ?>
    <title>Dashboard</title>

    <title>Dashboard</title>
    <script>
        function showNotifications() {
            var $n_list = document.getElementById("n_list");
            if ($n_list.style.visibility == "hidden") {
                $n_list.style.visibility = "visible";
            } else {
                $n_list.style.visibility = "hidden";
            }
        }
    </script>

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
                        <a class="nav-link active " id="pills-logout-tab" data-toggle=""
                           href="<?= SROOT ?>NMEmployeeFunctionHandler/logout"
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

            <!--            <li>-->
            <!--                <a href="../profile/employee.php"><i class="fa-solid fa-user" ></i> Profile </a>-->
            <!--            </li>-->
            <li>
                <a onclick="showNotifications()">
                <i class="fa-solid fa-message"></i> Notifications 
                <?php if ($this->notifications) {
                    echo count($this->notifications);
                } else {
                    echo 0;
                } ?>
                    
            </a>
            <div class="notifications text-center flex" id="n_list" style="visibility: hidden">
                <?php $notifications = $this->notifications;
                if ($notifications) {
                    foreach ($notifications as $notification) { ?>
                        <form action="<?= SROOT ?>NMEmployeeFunctionHandler/completeRequest" method="post">
                            <?php $n = (array)$notification;
                            echo 'Request ' . $n['status'] . ': ' . $n['reason']; ?>
                            <input type="hidden" name="id" value="<?php echo $n['id'] ?>">
                            <button class="btn btn-light p-1" type="submit">Mark as read</button>
                        </form>
                    <?php }
                } ?>
            </div>
            </li>
            <li>
                <a href="<?= SROOT ?>app/views/help/Help.php"><i class="fa-solid fa-circle-question"></i> Help</a>
            </li>
        </ul>
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row pt-lg-5">
            <div class="col-sm-12">
                <div class="card h-100">
                    <div class="card-body shadow px-lg-5">
                        <h5 class="card-title">Profile Details</h5>
                        <p class="card-text">Personal information, Employment details </p>


                        <a href="<?= SROOT ?>Profile/display/<?= $this->id;?>" class="btn btn-primary"><i
                                    class="fa-light fa-file-circle-info"></i> View profile</a>


                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-lg-5">
            <div class="col-sm-12">
                <div class="card h-100">
                    <div class="card-body shadow px-lg-5">
                        <h5 class="card-title">Leave Record</h5>
                        <p class="card-text">Remaining leaves (annual, casual, maternity, no pay), Leave requests </p>

                        <a href="<?= SROOT ?>EmployeeLeave/record" class="btn btn-primary"><i
                                    class="fa-light fa-file-circle-info"></i> View Leave Record</a>


                    </div>
                </div>
            </div>
        </div>


        <div class="row pt-lg-5">
            <div class="col-sm-12">
                <div class="card h-100">
                    <div class="card-body shadow px-lg-5">
                        <h5 class="card-title">Leave Application</h5>
                        <p class="card-text">Apply a leave application to get approval from supervisor </p>

                        <a href="<?= SROOT ?>EmployeeLeave/application" class="btn btn-success"><i
                                    class="fa-light fa-file-circle-info"></i> Apply For Leave</a>

                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</body>
</html>
