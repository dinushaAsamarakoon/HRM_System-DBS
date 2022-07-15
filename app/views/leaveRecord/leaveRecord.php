<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Leave Records</title>
</head>
<body>
<div class="shadow p-3"  >
    <nav class="navbar navbar-expand-lg bg-light" >
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"  data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

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
                            <h1 class="text-right"><b>Leave Records</b></h1>
                        </div>

                        <form>

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="text-right"><b>Leave Records Count</b></h5>
                            </div>

                            <div class="form-group row">
                                <label for="annual" class="col-sm-2 col-form-label">Annual Leaves</label>
                                <div class="col-sm-2">
                                    <label class="form-control text-center" id="annualCount" name="annualCount">30</label>
                                </div>
<!--                            </div>-->
<!--                            <div class="form-group row">-->
                                <label for="casual" class="col-sm-2 col-form-label">Casual Leaves</label>
                                <div class="col-sm-2">
                                    <label class="form-control text-center" id="casualCount" name="casualCount">30</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="maternity" class="col-sm-2 col-form-label">Maternity Leaves</label>
                                <div class="col-sm-2">
                                    <label class="form-control text-center" id="maternityCount" name="maternityCount">30</label>
                                </div>
<!--                            </div>-->
<!--                            <div class="form-group row">-->
                                <label for="noPay" class="col-sm-2 col-form-label">No Pay Leaves</label>
                                <div class="col-sm-2">
                                    <label class="form-control text-center" id="noPayCount" name="noPayCount">30</label>
                                </div>
                            </div>
                        </form>

                        <table class="table table-hover mt-5">
                            <thead class="table-primary">
                            <tr class="text-center">
                                <th scope="col">Leave Id</th>
                                <th scope="col">Type</th>
                                <th scope="col">Apply Date</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Reason</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            <tr>
                                <th scope="row">1</th>
                                <td>annual</td>
                                <td>2022/07/15</td>
                                <td>2022/07/15</td>
                                <td>From start_date to end_date</td>
                                <td>abcdefghi</td>
                            </tr>
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