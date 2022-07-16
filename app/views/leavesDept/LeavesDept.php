<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <title>Leave Report</title>
</head>
<body>
<div class="shadow p-3">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-start" id="navbarScroll1">
                <a class="navbar-brand">
                    <img src="../../../images/jupiterCrop.jpg" style="height: 23px; width: 150px;">
                </a>
            </div>

            <div class="collapse navbar-collapse justify-content-end  " id="navbarScroll3"
                 style="padding-top: 9px;height: 50px;">

                <ul class="nav" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-logout-tab" data-toggle="pill" href="" role="tab"
                           aria-controls="pills-logout" aria-selected="true">Dashboard</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><img class="image" src="images/boy.png"></a>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>

</div>

<div class="container ">

    <div class="container rounded bg-white mt-5 mb-5 ">
        <div class="row justify-content-center">

            <div class="col-md-11 border-right shadow text_area shadow">
                <div class="p-3 py-5">
                    <form action="<?= SROOT ?>HRManagerFunctionHandler/viewLeaveRecordByDept" method="Post">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h2 class="text-right"><b>Total leaves in given period by department</b></h2>
                        </div>

                        <select class="custom-select mr-3 w-50" name="filter_employee_by_dept_name">
                            <option disabled selected hidden>Choose the department</option>
                            <?php foreach ($this->depts as $dept) { ?>
                                <option value="<?php echo $dept->dept_name; ?>"><?php echo $dept->dept_name; ?></option>
                            <?php } ?>
                        </select>


                        <div class="row mt-2 mb-4">
                            <div class="col-md-4 w-25"><label class="labels">From</label><input type="date" name="start_date"
                                                                                                class="form-control">
                            </div>
                            <div class="col-md-4 w-25"><label class="labels">To</label><input type="date" name="end_date"
                                                                                              class="form-control">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary text-center ml-10" name="submit">Filter</button>
                    </form>
                </div>

                <div id="download_table">
                    <h4 class="text-lg-center mb-3"><i>Total leaves in given period by "selected_dept" from "from_date"
                            to "to_date"</i></h4>

                    <table class="table table-hover mt-5">
                        <thead class="table-info">
                        <tr class="text-center">
                            <th scope="col">Employee ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Total Leaves</th>
                            <th scope="col">Department Name</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <?php
                        foreach ($this->emp_leave_details as $emp_leave){
                        ?>
                        <tr>
                            <th scope="row"><?= $emp_leave[0];?></th>
                            <td><?= $emp_leave[1];?></td>
                            <td><?= $emp_leave[2];?></td>
                            <td><?= $emp_leave[3];?></td>
                            <td><?= $emp_leave[4];?></td>
                        </tr>
                        <?php }?>

                        </tbody>
                    </table>
                </div>

                <div class="col  d-flex justify-content-end align-items-start mb-4">
                    <button type="button" class="btn btn-success text-center" name="submit" onclick="exportPdf()">
                        Download the Report
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>

<script type="text/javascript">
    function exportPdf() {
        html2canvas(document.getElementById('download_table'), {
            onrendered: function (canvas) {
                var data = canvas.toDataURL();
                var docDefinition = {
                    content: [{
                        image: data,
                        width: 500
                    }]
                };
                pdfMake.createPdf(docDefinition).download("LeaveReport.pdf");
            }
        });
    }
</script>
</html>