<!doctype html>
<html lang="en">
<head>
    <?php

    require_once(ROOT . DS . 'app' . DS . 'views' . DS . 'header' . DS . 'headerFile.php');
    ?>
    <title>Profile</title>
</head>
<body>
<div class="shadow p-3"  >
    <nav class="navbar navbar-expand-lg bg-light" >
        <div class = "container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"  data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end  " id="navbarScroll" style="padding-top: 9px;height: 50px;">

                <ul class="nav  " id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active " id="pills-dashboard-tab" data-toggle="pill" href="#" role="tab" aria-controls="pills-logout" aria-selected="true" style="color: #0c63e4;font-size: 20px;" >Dashboard</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

</div>
<div class="container rounded bg-white mt-4 mb-5 ">
    <div class="row justify-content-center">
        <div class="col-md-9 border-right shadow text_area" >
            <div class="p-3 py-5">
                <div class="d-flex justify-content-center align-items-center mb-3">
                    <h2 class="text-center">Profile Details</h2>
                </div>
                <?php $p = (array) $this->profile[0]; ?>
                <div class="row mt-1" >
                    <div class="col-md-6"><label class="labels">First name</label><input type="text" class="form-control"  value="" disabled></div>
                    <div class="col-md-6"><label class="labels">Last name</label><input type="text" class="form-control" value="" disabled></div>
                </div>
                    <div class="row mt-2" >
                    <div class="col-md-6"><label class="labels">Username</label><input type="text" class="form-control"  value="" disabled></div>
                    <div class="col-md-6"><label class="labels">Gender</label><input type="text" class="form-control"  value="" disabled></div>
                </div>
                <div class="row mt-2" >
                    <div class="col-md-6"><label class="labels">Date of Birth</label><input type="text" class="form-control"  value="" disabled></div>
                    <div class="col-md-6"><label class="labels">Marital status</label><input type="text" class="form-control"  value="" disabled></div>
                </div>

                <div class="row mt-2" >
                    <div class="col-md-12"><label class="labels">Home address</label><input type="text" class="form-control"  value="" disabled></div>
                     <div class="col-md-12"><label class="labels">Email Address</label><input type="text" class="form-control"  value="" disabled></div>
                     <div class="col-md-12"><label class="labels">Qualification</label><textarea type="text" class="form-control"  value="" disabled></textarea></div>

                </div>
                <div class="row mt-2 ">
                    <div class="col-md-6"><label class="labels">Mobile Number</label><input type="text" class="form-control"  value="" disabled></div>
                    <div class="col-md-6"><label class="labels">Job title</label><input type="text" class="form-control"  value="<?php echo $p['job_title'] ?>" disabled></div>

                </div>
                <div class="row mt-2 ">
                    <div class="col-md-6"><label class="labels">Pay grade</label><input type="text" class="form-control"  value="<?php echo $p['pay_grade'] ?>" disabled></div>
                    <div class="col-md-6"><label class="labels">Employment status</label><input type="text" class="form-control"  value="" disabled></div>
                </div>
            </div>

        </div>

    </div>

</div>
</div>
</body>
</html>

