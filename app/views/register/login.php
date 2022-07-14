
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--    CSS only-->
<!--    <link href="../../content/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">-->
    <link rel="stylesheet" href="../../content/custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!--Javascript only-->
    <script src="../../content/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>Login Page</title>
</head>
<body  >
<div class="shadow p-3 mb-5  rounded" >
    <nav class="navbar navbar-expand-lg bg-light ">
        <div class="container-fluid ">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse  navbar-collapse justify-content-end " id="navbarScroll" >

                <ul class="nav nav-tabs   " id="pills-tab" role="tablist">
                    <li class="nav-item">
                           <a class="nav-link active " id="pills-home-tab"  aria-current="page" href="<?=SROOT?>" style="color: #0c63e4;font-size: 20px;">Home</a>
                    </li>


                </ul>

            </div>
        </div>
    </nav>

</div>

<div class="container-fluid">

    <div >

        <div class="tab-content" id="pills-tabContent2">
            <!--This is the login page of the website        -->
            <div class="h-100 " id="pills-login" role="tabpanel" aria-labelledby="pills-profile-tab" >

                <div class="container ">
                    <div class="row shadow-lg" style="border-radius: 50px;">

                        <div class="col-md-6 d-flex justify-content-center" >
                           <div class="d-flex justify-content-center  p-3 " >
                               <img src="<?=SROOT?>app/views/image/sideimage.jpg" class="card-img-top">
                           </div>
                        </div>
                        <div class="col-md-6 " >
                            <div class="d-flex justify-content-center w-100 h-100  p-3"  >
                                <div class=" w-75  p-3  p-5  mb-5 "  >
                                    <form action="<?=SROOT?>EmployeeRegister/login" method="POST" style="height: 450px;margin-top: 5px;">
                                        <div class="d-lg-flex justify-content-center m-1">

                                            <h2  >Login</h2>

                                        </div>
                                        <div class="mb-3 ">
                                            <label for="exampleInputEmail1" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="InputEmail1OrUser" placeholder="Enter your username" name="username">

                                        </div>


                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter your password" name="password">
                                        </div>
                                        <div class="mb-3 ">

                                            <a href="" ><label class="form-label"  > <u>Forget password</u> </label></a>
                                        </div>
                                        <div class="col text-center"><button type="submit" name="submit" class="btn btn-primary w-100"  style=" background: rgb(2,0,36);background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 0%, rgba(93,13,220,0.5691410353203781) 0%, rgba(0,57,255,0.8128385143119747) 0%); ">Submit</button></div>
                                    </form>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div></div>
</body>
</html>