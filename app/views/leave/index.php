<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Leave Record</title>
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
                        <a class="nav-link active" id="pills-logout-tab" data-toggle="pill" href="<?= SROOT ?>NMEmployeeDashboard" role="tab" aria-controls="pills-logout" aria-selected="true">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div class="container " >
    <div class="container rounded bg-white mt-5 mb-5 ">
        <div class="row justify-content-center">

            <div class="col-md-11 border-right shadow text_area shadow" >
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2 class="text-right"><b>Leave Record</b></h2>
                    </div>
                        <?php if ($this->record) {
                            $r = (array) $this->record[0]; ?>
                        <div class="d-flex justify-content-between align-items-center mt-5 mb-3">
                            <h5 class="text-right"><b>Remaining Leaves</b></h5>
                        </div>
                        <div class="form-group row">
                            <label for="annual" class="col-sm-2 col-form-label">Annual Leaves</label>
                            <div class="col-sm-2">
                                <label class="form-control text-center" id="annualCount" name="annualCount"><?php echo $r['rem_annual'];?></label>
                            </div>
                            <label for="casual" class="col-sm-2 col-form-label">Casual Leaves</label>
                            <div class="col-sm-2">
                                <label class="form-control text-center" id="casualCount" name="casualCount"><?php echo $r['rem_casual']; ?></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="maternity" class="col-sm-2 col-form-label">Maternity Leaves</label>
                            <div class="col-sm-2">
                                <label class="form-control text-center" id="maternityCount" name="maternityCount"><?php echo $r['rem_maternity'];?></label>
                            </div>
                            <label for="noPay" class="col-sm-2 col-form-label">No Pay Leaves</label>
                            <div class="col-sm-2">
                                <label class="form-control text-center" id="noPayCount" name="noPayCount"><?php echo $r['rem_no_pay'];?></label>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="d-flex justify-content-between align-items-center mt-5 mb-3">
                            <h5 class="text-right"><b>Leave Requests</b></h5>
                        </div>
                        
                        <div class="row justify-content-center">
                        <div class="table-responsive no-wrap">
                            <table class="table table-hover table-borderless align-middle no-wrap">
                                <thead class="thead table-primary">
                                    <tr class="text-center">
                                        <th>ID</th>
                                        <th>Type</th>
                                        <th>Requested Date</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Duration</th>
                                        <th>Reason</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                <?php $requests = $this->requests; 
                                    if($requests) {
                                    foreach ($requests as $request) {
                                        $r = (array) $request;?>
                                        <tr class="border-top">
                                            <th>
                                            <?php echo $r['id'];?>
                                            </th>
                                            <td>
                                            <?php echo ucwords($r['type']); ?>
                                            </td>
                                            <td>
                                            <?php echo $r['apply_date'];?>
                                            </td>
                                            <td>
                                            <?php echo $r['start_date'];?>
                                            </td>
                                            <td>
                                            <?php echo $r['end_date'];?>
                                            </td>
                                            <td>
                                            <?php if ($r["duration"] == 1) {
                                                echo $r["duration"] . " day";
                                            } else {
                                                echo $r["duration"] . " days";
                                            }
                                            ?>
                                            </td>
                                            <td>
                                            <?php echo $r['reason'];?>
                                            </td>
                                            <td>
                                            <?php echo ucwords($r['status']);?>
                                            </td>
                                        </tr>
                                <?php } } ?>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>
</html>