<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <title>Custom Report</title>
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
                            <h2 class="text-right"><b>Custom Report</b></h2>
                        </div>

                        <h6>Here choose the fields that you want...</h6>

                        <div class="form-check m-3">
                            <input class="form-check-input" type="checkbox" value="" id="dept_name" name="dept_name">
                            <label class="form-check-label" for="flexCheckDefault">
                                Department
                            </label>
                        </div>
                        <div class="form-check m-3">
                            <input class="form-check-input" type="checkbox" value="" id="pay_grade" name="pay_grade">
                            <label class="form-check-label" for="flexCheckChecked">
                                Pay Grade
                            </label>
                        </div>

                        <div id="download_table">
                            <h4 class="text-lg-center mt-3"><i>Custom Report</i></h4>

                            <table class="table table-hover mt-5">
                                <thead class="table-info">
                                <tr class="text-center">
                                    <th scope="col">Employee ID</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                </tr>
                                </thead>
                                <tbody class="text-center">
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Dinusha</td>
                                    <td>Samrakoon</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Udith</td>
                                    <td>Kaushalya</td>
                                </tr>

                                </tbody>
                            </table>
                    </div>

                    <div class="col  d-flex justify-content-end align-items-start mb-4">
                        <button type="button" class="btn btn-success text-center"  name="submit"  onclick="exportPdf()">Download the Report</button>
                    </div>
                </div>
            </div>
        </div>
</div>
</form>
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
                pdfMake.createPdf(docDefinition).download("CustomReport.pdf");
            }
        });
    }
</script>

</html>