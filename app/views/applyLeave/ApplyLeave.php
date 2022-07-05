<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.css"> -->
    <link rel="stylesheet" href="../../content/mystyles.css">
    <link rel="stylesheet" href="../bootstrap/css/custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>ApplyLeave</title>
</head>
<body>
    <div class="shadow p-3"  >
    <nav class="navbar navbar-expand-lg bg-light" >
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"  data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-start" id="navbarScroll1">
                <a class="navbar-brand">
                    <img src="../../../images/jupiterCrop.jpg" style="height: 23px; width: 150px;">
                </a>
            </div>

            <div class="collapse navbar-collapse justify-content-end  " id="navbarScroll" style="padding-top: 9px;height: 50px;">

                <ul class="nav" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-logout-tab" data-toggle="pill" href="javascript:history.back()" role="tab" aria-controls="pills-logout" aria-selected="true">Back</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><img class="image" src="images/boy.png" ></a>
                    </li> -->
                </ul>

            </div>
        </div>
    </nav>

</div>

     <div class="container " >
        <form action="" method="">
            <div class="container rounded bg-white mt-5 mb-5 ">
                <div class="row justify-content-center">
    
                    <div class="col-md-11 border-right shadow text_area shadow" >
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h2 class="text-right"><b>Apply For Leave</b></h2>
                            </div>
                            <div class="row mt-2" >
                                <div class="col-md-6"><label class="labels">From</label><input type="date" class="form-control" ></div>
                                <div class="col-md-6"><label class="labels">To</label><input type="date" class="form-control"></div>
                            </div>

                            <div class="row mt-3" >
                                <div class="col-md-12"><div class="mb-3">
                                        <label class="form-label">Leave type</label><br>
                                        <div class="form-check" style="margin-bottom: 20px;">
                                            <input  type="radio" name="leave-type" value="annual" id="annual" />
                                            <label class="form-check-label" for="annual">Annual</label>
                                            <input  type="radio" name="leave-type" value="casual" id="casual" />
                                            <label class="form-check-label" for="casual">Casual</label>
                                            <input type="radio" name="leave-type" value="maternity" id="maternity" />
                                            <label class="form-check-label" for="maternity">Maternity</label>
                                            <input  type="radio" name="leave-type" value="noPay" id="noPay" />
                                            <label class="form-check-label" for="noPay">No Pay</label>
                                        </div>
                                    </div></div>
                            </div>
                            
                            <div  class="row mt-3">
                                <div class="col-md-6"><label class="labels" >Reason</label><input type="text" class="form-control"  value="" placeholder="Reason..."></div>
                            </div>
                            <div  class="row mt-3">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary" name="submit" >Apply Leave</button>
                                    <button type="submit" class="btn btn-success" style="margin-left: 10px;" name="submit" >Cancel</button>
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