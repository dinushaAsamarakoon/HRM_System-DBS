<?php
if (!isset($this->allAttributes)) {
    Router::redirect('HRManagerDashboard');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <?php
    require_once(ROOT . DS . 'app' . DS . 'views' . DS . 'header' . DS . 'headerFile.php'); ?>


    <title>Employee Details</title>
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
                        <a class="nav-link active" id="pills-dashboard-tab" data-toggle="pill" href="<?=SROOT?><?=Session::get('dashboard')?>"
                           role="tab" aria-controls="pills-logout" aria-selected="true"
                           style="color: #0c63e4;font-size: 20px;">Dashboard</a>

                    </li>


                </ul>

            </div>
        </div>
    </nav>

</div>

<div class="container ">
    <?php
    $p = (array)$this->Employee[0]; ?>

    <form action="<?= SROOT ?>HRManagerFunctionHandler/editEmployee/<?= $p['id'] ?>" method="Post">
        <div class="container rounded bg-white mt-5 mb-5 ">
            <div class="row justify-content-center shadow-lg" style="border-radius: 45px;">
                <div class="col-md-8 border-right  text_area pt-3 ">
                    <div class="d-flex justify-content-center align-items-center mb-3">
                        <h2 class="text-right">Employee Account</h2>
                    </div>
                </div>

                <div class="col-md-8 border-right  text_area  ">
                    <div class="p-3 py-5">
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels" >First Name</label><input type="text"
                                                                                                 name="first_name"
                                                                                                 class="form-control"
                                                                                                 value="<?php echo $p["first_name"]; ?>"
                                                                                                 id="fname"
                                                                                                 disabled>
                            </div>
                            <div class="col-md-6"><label class="labels">Last Name</label><input type="text"
                                                                                                name="last_name"
                                                                                                class="form-control"
                                                                                                value="<?php echo $p["last_name"]; ?>"
                                                                                                id="lname"
                                                                                                disabled>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Date of Birth</label><input type="date"
                                                                                                    name="birth_date"
                                                                                                    class="form-control"
                                                                                                    value="<?php echo $p["birth_date"]; ?>"
                                                                                                    id="birth"
                                                                                                    disabled>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label"> Gender </label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1"
                                               value="Male" <?php if ($p["gender"] == 'male'){ ?>checked<?php } ?>
                                               disabled>
                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2"
                                               value="Female"
                                               <?php if ($p["gender"] == 'female'){ ?>checked<?php } ?> disabled>
                                        <label class="form-check-label" for="inlineRadio2">Female</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label"> Marital status </label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="marital_status"
                                               id="inlineRadio3" value="Married"
                                               <?php if ($p["marital_status"] == 'Married'){ ?>checked<?php } ?>
                                               disabled>
                                        <label class="form-check-label" for="inlineRadio3">Married</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="marital_status"
                                               id="inlineRadio4" value="Unmarried"
                                               <?php if ($p["marital_status"] == 'Unmarried'){ ?>checked<?php } ?>
                                               disabled>
                                        <label class="form-check-label" for="inlineRadio4">Unmarried</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Email Address</label><input type="text"
                                                                                                    name="email"
                                                                                                    id="iemail"
                                                                                                    class="form-control"
                                                                                                    value="<?php echo $p["email"]; ?>"
                                                                                                    disabled>
                            </div>
                            <div class="col-md-6"><label class="labels">Home address</label><input type="text"
                                                                                                   name="address"
                                                                                                   id="iaddress"
                                                                                                   class="form-control"
                                                                                                   value="<?php echo $p["address"]; ?>"
                                                                                                   disabled>
                            </div>

                        </div>

                        <!--                        //dynamic forum elements-->
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Emergency contact Number</label><input
                                        type="text"
                                        name="emergency_contact"
                                        class="form-control"
                                        value="<?php echo $p["emergency_contact"]; ?>"
                                        placeholder="Enter emergency contract number">
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Department name </label><br>
                                <select class="form-select form-select-lg" name="dept_name"
                                        aria-label=".form-select-lg example"
                                        style="height: 38px;font-size: 15px; color: dimgrey">

                                    <?php foreach ($this->depts as $dept) {?>
                                        <option value="<?php echo $dept->dept_name; ?>"
                                                <?php if ($dept->dept_name == $p["dept_name"]){ ?>selected<?php } ?>><?php echo $dept->dept_name; ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label for=" Idnumber" class="form-label">National Identity card number</label>
                                <input type="text" class="form-control" id="Idnumber"
                                       value="<?php echo $p["NIC"]; ?>" name="NIC" disabled>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12"><label class="labels">Qualifications</label>
                                <div class="form-floating">
                                    <textarea name="qualification" class="form-control"
                                              id="Textarea" disabled><?php echo $p["qualification"]; ?></textarea>

                                </div>
                            </div>

                        </div>


                    </div>

                </div>
                <div class="col-md-3 border-right  text_area  ">

                    <div class="p-1 py-4">

                        <div class="row mt-4">
                            <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text"
                                                                                                     name="phone_number"
                                                                                                     class="form-control"
                                                                                                     id="mbnum"
                                                                                                     value="<?php echo $p["phone_number"]; ?>"
                                                                                                     disabled>
                            </div>
                        </div>

                        <!--                        //dynamic forum elements-->
                        <script>
                            var Idname1 = [];
                        </script>
                        <?php
                        foreach ($this->allAttributes as $attribute => $val_array) {
                            ?>
                            <script>
                                Idname1.push('<?= $attribute; ?>');
                            </script>
                            <div class="row mt-2">
                                <div class="col-md-12" style="">
                                    <label class="labels">Select <?php echo $attribute; ?></label><br>
                                    <select class="form-select form-select-lg" name="<?php echo $attribute; ?>"
                                            aria-label=".form-select-lg example"
                                            style="height: 38px;font-size: 15px; color: dimgrey"
                                            id="<?php echo $attribute; ?>" disabled>
                                        <?php
                                        foreach ($val_array as $val) {
                                            if (Session::get('job_class') == 'admin') {
                                                if ($attribute == 'job_title') {
                                                    if ($val[0] == 'hr_manager') { ?>
                                                        <option value="<?php echo $val[0]; ?>"
                                                                <?php if ($val[0] == $p[$attribute]){ ?>selected<?php } ?>><?php echo $val[0]; ?></option>
                                                    <?php }

                                                } else { ?>
                                                    <option value="<?php echo $val[0]; ?>"
                                                            <?php if ($val[0] == $p[$attribute]){ ?>selected<?php } ?>><?php echo $val[0]; ?></option>
                                                <?php }

                                                ?>
                                                <?php
                                            } else if (Session::get('job_class') == 'hr_manager') {
                                                if ($attribute == 'job_title') {
                                                    if ($val[0] != 'hr_manager' and $val[0] != 'admin') { ?>
                                                        <option value="<?php echo $val[0]; ?>"
                                                                <?php if ($val[0] == $p[$attribute]){ ?>selected<?php } ?>><?php echo $val[0]; ?></option>
                                                    <?php }
                                                } else { ?>
                                                    <option value="<?php echo $val[0]; ?>"
                                                            <?php if ($val[0] == $p[$attribute]){ ?>selected<?php } ?>><?php echo $val[0]; ?></option>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        <?php }
                        if ($p["job_title"] == 'supervisor') { ?>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <label class="labels">Supervisor level </label><br>
                                    <select class="form-select form-select-lg" name="sup_level"
                                            aria-label=".form-select-lg example"
                                            style="height: 38px;font-size: 15px; color: dimgrey">

                                        <?php foreach ($this->sup_levels as $level) {
                                            ?>
                                            <option value="<?= $level->sup_level ?>"
                                                    <?php if ($level->sup_level == $p[$attribute]){ ?>selected<?php } ?>><?= $level->sup_level ?></option>

                                        <?php } ?>


                                    </select>
                                </div>
                            </div>
                        <?php } ?>
                        <br> <br> <br>
                        <div class="row mt-5 " style="display: block">
                            <div class="col-md-12 d-flex justify-content-center">
                                <button type="button" class="btn btn-success w-75" id="btnedit">
                                    Edit
                                </button>
                            </div>
                        </div>


                        <div class="row mt-3 " id="btnsub" style="display: none">
                            <div class="col-md-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary w-75" name="submit"
                                        style=" background: rgb(2,0,36);background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 0%, rgba(93,13,220,0.5691410353203781) 0%, rgba(0,57,255,0.8128385143119747) 0%); ">
                                    Submit
                                </button>
                            </div>
                        </div>

                        <form action="<?= SROOT ?>HRManagerFunctionHandler/removeEmployee/<?= $p['id'] ?>">
                            <div class="row mt-3 " id="remove" style="display: block">
                                <div class="col-md-12 d-flex justify-content-center">
                                    <button class="btn btn-danger w-75">
                                        Remove
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
</div>


</form>

<form action="<?= SROOT ?>HRManagerFunctionHandler/removeEmployee/<?= $p['id'] ?>/<?= $p['job_title'] ?>">
    <div class="row mt-3 " id="remove" style="display: block">
        <div class="col-md-12 d-flex justify-content-center">
            <button class="btn btn-danger w-75">
                Remove
            </button>
        </div>
    </div>
</form>

>


</div>
<script>

    document.getElementById('btnedit').addEventListener("click", () => {
        document.getElementById('btnsub').style.display = 'block';
        document.getElementById('remove').style.display = 'none';
        document.getElementById('mbnum').disabled = false;
        for (let i = 0; i < Idname1.length; i++) {
            document.getElementById(Idname1[i]).disabled = false;
        }
        document.getElementById('Textarea').disabled = false;
        document.getElementById('Idnumber').disabled = false;
        document.getElementById('iaddress').disabled = false;
        document.getElementById('iemail').disabled = false;
        document.getElementById('inlineRadio1').disabled = false;
        document.getElementById('inlineRadio2').disabled = false;
        document.getElementById('inlineRadio3').disabled = false;
        document.getElementById('inlineRadio4').disabled = false;
        document.getElementById('birth').disabled = false;
        document.getElementById('fname').disabled = false;
        document.getElementById('lname').disabled = false;
        document.getElementById('uname').disabled = false;


    });
</script>
</body>
</html>