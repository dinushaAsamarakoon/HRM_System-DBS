<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    require_once(ROOT . DS . 'app' . DS . 'views' . DS . 'header' . DS . 'headerFile.php');
    ?>

    <title>Add Employee</title>
</head>

<body>
<div class="container " >
    <form action="" method="Post">
        <div class="container rounded bg-white mt-5 mb-5 ">
            <div class="row justify-content-center">

                <div class="col-md-11 border-right shadow text_area shadow " style="background-color:  #ecf0f9; ">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h2 class="text-right">Change Username and Password</h2>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Username</label><input type="text" class="form-control" value="" placeholder="Enter employee's last name"></div>
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

</body>
</html>
