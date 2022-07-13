<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Notifications</title>
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

            <div class="collapse navbar-collapse justify-content-end  " id="navbarScroll3" style="padding-top: 9px;height: 50px;">

                <ul class="nav" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-logout-tab" data-toggle="pill" href="" role="tab" aria-controls="pills-logout" aria-selected="true">Dashboard</a>
                    </li>
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
                            <h2 class="text-right"><b>Notifications</b></h2>
                        </div>

<!--                        <div class="form-check m-3">-->
<!--                            <input class="form-check-input" type="checkbox" value="" id="dept_name" name="dept_name">-->
<!--                            <label class="form-check-label" for="flexCheckDefault">-->
<!--                                Department-->
<!--                            </label>-->
<!--                        </div>-->
<!--                        <div class="form-check m-3">-->
<!--                            <input class="form-check-input" type="checkbox" value="" id="pay_grade" name="pay_grade" checked>-->
<!--                            <label class="form-check-label" for="flexCheckChecked">-->
<!--                                Pay Grade-->
<!--                            </label>-->
<!--                        </div>-->


<!--                        <h4 class="text-lg-center mt-3"><i>Custom Report</i></h4>-->

                        <table class="table table-hover mt-5">
                            <thead class="table-primary">
                            <tr class="text-center">
                                <th scope="col">Notification No.</th>
                                <th scope="col">Send Date</th>
                                <th scope="col">Leave Requested Time Period</th>
                                <th scope="col">Status</th>
                                <th scope="col"> </th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            <tr>
                                <th scope="row">1</th>
                                <td>2022/02/02</td>
                                <td>From start_date to end_date</td>
                                <td><label id="status" class="btn btn-primary disabled"><p style="font-weight: bold;width:150px; height:10px;"><i class="fas fa-angle-double-right"></i>Pending</p></label></td>
                                <td><a href="../applyLeave/ApplyLeave.php" class="btn btn-primary">View Leave Application</a></td>
                            </tr>

<!--                            <td><label id="status" class="btn btn-primary disabled"><p style="font-weight: bold;width:150px; height:10px;"><i class="fas fa-angle-double-right"></i>Approved</p></label></td>-->
<!--                            <td><label id="status" class="btn btn-primary disabled"><p style="font-weight: bold;width:150px; height:10px;"><i class="fas fa-angle-double-right"></i>Disaproved</p></label></td>-->
<!--                            <td><label id="status" class="btn btn-primary disabled"><p style="font-weight: bold;width:150px; height:10px;"><i class="fas fa-angle-double-right"></i>Seen</p></label></td>-->

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>