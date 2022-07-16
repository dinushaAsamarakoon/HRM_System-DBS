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
                        <a class="nav-link active " id="pills-dashboard-tab" data-toggle="pill" href="<?=SROOT?><?=Session::get('dashboard')?>" role="tab" aria-controls="pills-logout" aria-selected="true" style="color: #0c63e4;font-size: 20px;" >Dashboard</a>
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

                <?php $p = (array) $this->profile[0];
//                dnd($p);?>
                <form>

                <div class="row mt-1" >
                    <div class="col-md-6"><label class="labels">First name</label><input type="text" class="form-control"  value="<?php echo $p["first_name"];?>" disabled></div>
                    <div class="col-md-6"><label class="labels">Last name</label><input type="text" class="form-control" value="<?php echo $p["last_name"];?>" disabled></div>
                </div>
                    <div class="row mt-2" >
                    <div class="col-md-6"><label class="labels">Username</label><input type="text" class="form-control"  value="<?php echo $p["username"];?>" disabled></div>
                    <div class="col-md-6"><label class="labels">Gender</label><input type="text" class="form-control"  value="<?php echo $p["gender"];?>" disabled></div>
                </div>
                <div class="row mt-2" >
                    <div class="col-md-6"><label class="labels">Date of Birth</label><input type="text" class="form-control"  value="<?php echo $p["birth_date"];?>" disabled></div>
                    <div class="col-md-6"><label class="labels">Marital status</label><input type="text" class="form-control"  value="<?php echo $p["marital_status"];?>" disabled></div>
                </div>


                <div class="row mt-2 ">
                    <div class="col-md-6"><label class="labels">Mobile Number</label><input type="text" class="form-control"  value="<?php echo $p["phone_number"];?>" disabled></div>
                    <div class="col-md-6"><label class="labels">Job title</label><input type="text" class="form-control"  value="<?php echo $p['job_title'] ?>" disabled></div>

                </div>
                <div class="row mt-2 ">
                    <div class="col-md-6"><label class="labels">Pay grade</label><input type="text" class="form-control"  value="<?php echo $p['pay_grade'] ?>" disabled></div>
                    <div class="col-md-6"><label class="labels">Employment status id</label><input type="text" class="form-control"  value="<?php echo $p["emp_status_id"];?>" disabled></div>
                </div>
                <div class="row mt-2" >
                    <div class="col-md-12"><label class="labels">National identity card number</label><input type="text" class="form-control"  value="" disabled></div>
                    <div class="col-md-12"><label class="labels">Home address</label><input type="text" class="form-control"  value="<?php echo $p["address"];?>" disabled></div>
                    <div class="col-md-12"><label class="labels">Email Address</label><input type="text" class="form-control"  value="<?php echo $p["email"];?>" disabled></div>
                    <div class="col-md-12"><label class="labels">Qualification</label><textarea type="text" class="form-control" placeholder="" disabled style="place"><?php echo $p["qualification"];?></textarea></div>
                </div>

                </form>
            </div>

        </div>

    </div>

</div>
</div>
</body>
</html>

