<?php
//if (isset($_SESSION['username'])){
//    Router::redirect('EmployeeDashboard');
//}
//?>


<!DOCTYPE html>
<html lang="en">
<head>

    <?php
    require_once(ROOT . DS . 'app' . DS . 'views' . DS . 'header' . DS . 'headerFile.php'); ?>


    <title>Add Employee</title>
</head>
<style>
    h1 {

        text-align: center;
    }

    label {
        font-weight: bold;
    }

</style>
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
                        <a class="nav-link active" id="pills-dashboard-tab" data-toggle="pill" href="Dashboard.php"
                           role="tab" aria-controls="pills-logout" aria-selected="true"
                           style="color: #0c63e4;font-size: 20px;">Dashboard</a>

                    </li>


                </ul>

            </div>
        </div>
    </nav>

</div>

<div class="container " style="display: block;" id="create_account">
    <?php
    if (Session::get('job_class') == 'admin') { ?>
    <form action="<?= SROOT ?>AdminFunctionHandler/addEmployee" method="Post">
        <?php }else if (Session::get('job_class') == 'hr_manager') { ?>
        <form action="<?= SROOT ?>HRManagerFunctionHandler/addEmployee" method="Post">
            <?php } ?>
            <div class="rounded bg-white mt-5 mb-5 ">
                <div class="row justify-content-center shadow-lg" style="border-radius: 45px;">
                    <div class="col-md-8 border-right    ">
                        <div class="pt-5 ">
                            <div class="d-flex justify-content-center align-items-center mb-3">
                                <h2 class="text-right">Create Account</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 border-right    ">
                        <div class="p-3 py-5">
                            <div class="row mt-2">
                                <div class="col-md-6"><label class="labels">First Name</label><input type="text"
                                                                                                     name="first_name"
                                                                                                     class="form-control"
                                                                                                     value=""
                                                                                                     placeholder="Enter employee's first name">
                                </div>
                                <div class="col-md-6"><label class="labels">Last Name</label><input type="text"
                                                                                                    name="last_name"
                                                                                                    class="form-control"
                                                                                                    value=""
                                                                                                    placeholder="Enter employee's last name">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6"><label class="labels">Username</label><input type="text"
                                                                                                   name="username"
                                                                                                   class="form-control"
                                                                                                   value=""
                                                                                                   placeholder="Enter employee's last name">
                                </div>
                                <div class="col-md-6"><label class="labels">Date of Birth</label><input type="date"
                                                                                                        name="birth_date"
                                                                                                        class="form-control"
                                                                                                        value=""
                                                                                                        placeholder="Enter employee's birthday">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label"> Gender </label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1"
                                                   value="Male">
                                            <label class="form-check-label" for="inlineRadio1">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2"
                                                   value="Female">
                                            <label class="form-check-label" for="inlineRadio2">Female</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label"> Marital status </label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="marital_status"
                                                   id="inlineRadio3" value="Male">
                                            <label class="form-check-label" for="inlineRadio1">Married</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="marital_status"
                                                   id="inlineRadio4" value="Female">
                                            <label class="form-check-label" for="inlineRadio2">Unmarried</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6"><label class="labels">Email Address</label><input type="text"
                                                                                                        name="email"
                                                                                                        class="form-control"
                                                                                                        value=""
                                                                                                        placeholder="Enter mployee's email address">
                                </div>
                                <div class="col-md-6"><label class="labels">Home address</label><input type="text"
                                                                                                       name="address"
                                                                                                       class="form-control"
                                                                                                       value=""
                                                                                                       placeholder="Enter employee's resident address">
                                </div>

                            </div>

                            <!--                        //dynamic forum elements-->




                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Emergency contract Number</label><input type="text"
                                                                                                     name="emergency_contract"
                                                                                                     class="form-control"
                                                                                                     value=""
                                                                                                     placeholder="Enter emergency contract number">
                            </div>
                            <div class="col-md-6">
                                    <label class="labels">Department name </label><br>
                                    <select class="form-select form-select-lg" name="dept_name"
                                            aria-label=".form-select-lg example" style="height: 38px;font-size: 15px; color: dimgrey">
                                        <option value="" >Select department</option>
                                        <option value=""></option>

                                    </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label for=" Idnumber" class="form-label">National Identity card number</label>
                                <input type="text" class="form-control" id="Idnumber" placeholder="Enter employee's national ID card number" name="IdCardNumber" >

                            </div>
                        </div>
                            <div class="row mt-2">
                                <div class="col-md-12"><label class="labels">Qualifications</label>
                                    <div class="form-floating">
                                    <textarea name="qualification" class="form-control"
                                              id="floatingTextarea"></textarea>

                                    </div>
                                </div>

                            </div>

                    </div>

                     </div>
                    <div class="col-md-3 border-right    ">
                        <div class="p-1 py-3">

                            <div class="row mt-5">
                                <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text"
                                                                                                         name="phone_umber"
                                                                                                         class="form-control"
                                                                                                         value=""
                                                                                                         placeholder="Enter employee's mobile number">
                                </div>
                            </div>


                            <!--                        //dynamic forum elements-->
                            <?php
                            $attributes = $this->allAttributes;
                            foreach ($attributes as $attribute => $val_array) {
                                //dnd($val_array);

                                ?>
                                <div class="row mt-2">
                                    <div class="col-md-12" style="">
                                        <label class="labels">Select <?php echo $attribute; ?><?php if ($attribute == "emp_status"){?>
                                                <i class="fa-solid fa-circle-info" id="info"></i>
                                            <?php }?></label><br>
                                        <select class="form-select form-select-lg" name="<?php echo $attribute; ?>"
                                                aria-label=".form-select-lg example"
                                                style="height: 38px;font-size: 15px; color: dimgrey">
                                            <option value="" selected>select from <?php echo $attribute; ?> menu
                                            </option>
                                            <?php
                                            foreach ($val_array as $val) {
                                                if (Session::get('job_class') == 'admin' and $attribute == 'job_title' and $val[0] == 'hr_manager') { ?>
                                                    <option value=""><?php echo $val[0]; ?></option>
                                                    <?php
                                                } else if (Session::get('job_class') == 'hr_manager' and $attribute == 'job_title' and $val[0] != 'hr_manager' and $val[0] != 'admin') { ?>
                                                    <option value=""><?php echo $val[0]; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                </div>
                            <?php } ?>
                            <div class="row mt-2">
                                <div class="col-md-12" >
                                    <label class="labels">Supervisor level </label><br>
                                    <select class="form-select form-select-lg" name="sup_level"
                                            aria-label=".form-select-lg example"
                                            style="height: 38px;font-size: 15px; color: dimgrey">
                                        <option value="" selected>select Level</option>
                                        <option value="">Level 1</option>
                                        <option value="">Level 2</option>


                                    </select>
                                </div>
                            </div>
                            <br> <br> <br>
                            <div class="row mt-5 ">
                                <div class="col-md-12 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary w-75" name="submit"
                                            style=" background: rgb(2,0,36);background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 0%, rgba(93,13,220,0.5691410353203781) 0%, rgba(0,57,255,0.8128385143119747) 0%); ">
                                        Submit
                                    </button>
                                </div>

                            </div>


                        </div>
                    </div>



</form>

</div></div></div>
<div class="container " id="table_data" style="display: none;">


    <div class="rounded bg-white mt-5 mb-5 ">

                <div class="row justify-content-center shadow-lg" >
                    <div class="d-flex justify-content-end mt-2"><i class="fa-solid fa-circle-xmark" id="close"></i></div>
                   <div class="p-3"><table class="table shadow-lg">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>

                        </tbody>
                    </table>
                   </div>





                </div></div>
</div>
<script>
    var create_account = document.getElementById("create_account");
    var table_data = document.getElementById("table_data");
    var btn = document.getElementById("close");
    var info= document.getElementById('info');
    btn.addEventListener("click",()=>{
        table_data.style.display='none';
        create_account.style.display='block';
    } );
    info.addEventListener("click",()=>{
        table_data.style.display='block';
        create_account.style.display='none';
    } );


</script>
</body>
</html>