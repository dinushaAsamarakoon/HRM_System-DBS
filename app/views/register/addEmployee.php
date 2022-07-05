<?php
if (isset($_SESSION['username'])){
    Router::redirect('EmployeeDashboard');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <?php include('../header/headerFile.php') ?>

    <title>Add Employee</title>
</head>
<style>

    h1{

        text-align: center;
    }
    label{
        font-weight: bold;
    }

</style>
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

                    <li class="nav-item">
                        <a class="nav-link active" id="pills-dashboard-tab" data-toggle="pill" href="Dashboard.php" role="tab" aria-controls="pills-logout" aria-selected="true" style="color: #0c63e4;font-size: 20px;">Dashboard</a>

                    </li>


                </ul>

            </div>
        </div>
    </nav>

</div>

<div class="container " >
    <form action="" method="Post">
        <div class="container rounded bg-white mt-5 mb-5 ">
            <div class="row justify-content-center">

                <div class="col-md-11 border-right shadow text_area shadow " style="background-color:  #ecf0f9; ">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h2 class="text-right">Create Account</h2>
                        </div>
                        <div class="row mt-2" >
                            <div class="col-md-6"><label class="labels">First Name</label><input type="text" class="form-control"  value="" placeholder="Enter employee's first name" ></div>
                            <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control" value="" placeholder="Enter employee's last name"></div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Username</label><input type="text" class="form-control" value="" placeholder="Enter employee's last name"></div>
                            <div class="col-md-6"><label class="labels">Date of Birth</label><input type="date" class="form-control"  value="" placeholder="Enter employee's birthday"></div>
                        </div>
                        <div class="row mt-3" >
                            <div class="col-md-6"><div class="mb-3">
                                    <label class="form-label"> Gender </label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Male">
                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Female">
                                        <label class="form-check-label" for="inlineRadio2">Female</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"><div class="mb-3">
                                    <label class="form-label"> Marital status </label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions3" id="inlineRadio3" value="Male">
                                        <label class="form-check-label" for="inlineRadio1">Married</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions3" id="inlineRadio4" value="Female">
                                        <label class="form-check-label" for="inlineRadio2">Unmarried</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Email Address</label><input type="text" class="form-control"  value="" placeholder="Enter mployee's email address"></div>
                            <div class="col-md-6"><label class="labels">Home address</label><input type="text" class="form-control"  value=""  placeholder="Enter employee's resident address"></div>

                        </div>
                        <div class="row mt-2" >
                            <div class="col-md-6"><label class="labels" >Mobile Number</label><input type="text" class="form-control"  value="" placeholder="Enter employee's mobile number"></div>
                            <div class="col-md-6">
                                <label class="labels" >Select job title</label><br>
                                <select class="form-select form-select-sm mb-3" aria-label=".form-select-lg example">
                                    <option selected>select job menu</option>
                                    <option value="">Supervisor</option>
                                    <option value="">HR Manager</option>
                                    <option value="">Accountant</option>
                                    <option value="">Software Engineer</option>
                                    <option value="">QA Engineer</option>
                                </select>
                            </div>

                        </div>
                        <div class="row mt-2" >
                             <div class="col-md-6">
                                <label class="labels" >Pay grade</label><br>
                                <select class="form-select form-select-sm mb-3" aria-label=".form-select-lg example">
                                    <option selected>select pay grade menu</option>
                                    <option value="">Level 1</option>
                                    <option value="">Level 2</option>
                                    <option value="">Level 3</option>
                                    <option value="">Level 4</option>
                                    <option value="">Level 5</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="labels" >Employment status</label><br>
                                <select class="form-select form-select-sm mb-3" aria-label=".form-select-lg example">
                                    <option selected>select employment status menu</option>
                                    <option value="">Intern</option>
                                    <option value="">contract</option>
                                    <option value="">Permanent</option>
                                    <option value="">Freelance</option>

                                </select>
                            </div>

                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12"><label class="labels">Qualifications</label>
                                <div class="form-floating">
                                    <textarea class="form-control"  id="floatingTextarea"></textarea>

                                </div>
                            </div>

                        </div>

                        <div  class="row mt-2">
                            <div class="col-md-6">
                                <label for=" Password1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="Password1" placeholder="Enter  password" name="passwordn1" onkeyup="valid()">
                                <!--            <meter min="1" max="100" value="0" low="0" high="0" id="grade"></meter>-->
                                <span id="msg"></span>

                            </div>
                            <div class="col-md-6">
                                <label for="Password2" class="form-label">Conform Password</label>
                                <input type="password" class="form-control" id="Password2" placeholder="Enter  password again" name="passwordn2" onkeyup="ConfirmPassword()">
                                <span id="msg2"></span>
                            </div>

                        </div>
                        <div  class="row mt-3">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</div>



</form>
</div>
</body></html>

