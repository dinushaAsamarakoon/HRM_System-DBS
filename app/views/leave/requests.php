<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Leave Requests</title>
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
                        <a class="nav-link active" id="pills-logout-tab" data-toggle="pill" href="<?=SROOT?><?=Session::get('dashboard')?>" role="tab" aria-controls="pills-logout" aria-selected="true">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div class="container " >
    <div class="container rounded bg-white mt-5 mb-5 ">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="text-right"><b>Leave Requests</b></h2>
        </div>
            <?php $requests = $this->requests;
            $count = 0 ?>
            <div class="accordion accordion-flush" id="accordionFlushExample">

            <?php if($requests) {   
                
                foreach ($requests as $request) { ?>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading<?= $count ?>">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne<?= $count ?>" aria-expanded="false" aria-controls="flush-collapseOne<?= $count ?>">
                                <?php
                                $r = (array) $request;
                                ?>
                                <div class="col-2">
                                    Request ID:
                                    <?php
                                    echo $r["req_id"] ?>
                                </div>
                                <div class="col-2">
                                    Employee:
                                    <?php
                                    echo $r["first_name"] . " " . $r["last_name"] ?>
                                </div>
                                <div class="col-2">
                                    Type:
                                    <?php
                                    echo ucwords($r["type"]); ?>
                                </div>

                                <div class="col-4">
                                    Reason:
                                    <?php
                                    echo $r["reason"]; ?>
                                </div>
                                <div class="col-2">
                                    Requested Date:
                                    <?php
                                    echo $r["apply_date"]; ?>
                                </div>

                            </button>
                        </h2>

                        <div id="flush-collapseOne<?= $count ?>" class="accordion-collapse collapse " aria-labelledby="flush-headingOne<?= $count ?>" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="container-xl row justify-content-center bg-light">
                                    <div class="row justify-content-left p-2 m-2">
                                        <p><strong>Reason: </strong>
                                        <?php echo $r["reason"]; ?>
                                        </p>
                                        <p><strong>From: </strong>
                                        <?php echo $r["start_date"]; ?>
                                        </p>
                                        <p><strong>To: </strong>
                                        <?php echo $r["end_date"]; ?>
                                        </p>
                                        <p><strong>Duration: </strong>
                                        <?php if ($r["duration"] == 1) {
                                            echo $r["duration"] . " day";
                                            } else {
                                            echo $r["duration"] . " days";
                                            }
                                            ?>
                                        </p>
                                        <p><strong>Remaining leaves: </strong>
                                        <?php echo $r["rem_annual"] . "(annual),"; ?>
                                        <?php echo $r["rem_casual"] . "(casual),"; ?>
                                        <?php echo $r["rem_maternity"] . "(maternity),"; ?>
                                        <?php echo $r["rem_no_pay"] . "(no pay)";?>
                                        </p>
                                    </div>
                                    <div class="row justify-content-center mb-1">
                                    <div class="col text-center mb-1">
                                    <form action="<?=SROOT?>EmployeeLeave/approval" method="post">
                                        <input type="hidden" name="id" value="<?php echo $r['req_id']?>">
                                        <input type="hidden" name="emp_id" value="<?php echo $r['emp_id']?>">
                                        <input type="hidden" name="sup_id" value="<?php echo $r['sup_id']?>">
                                        <input type="hidden" name="type" value="<?php echo $r['type']?>">
                                        <input type="hidden" name="duration" value="<?php echo $r['duration']?>">
                                        <input type="hidden" name="rem_annual" value="<?php echo $r['rem_annual']?>">
                                        <input type="hidden" name="rem_casual" value="<?php echo $r['rem_casual']?>">
                                        <input type="hidden" name="rem_maternity" value="<?php echo $r['rem_maternity']?>">
                                        <input type="hidden" name="rem_no_pay" value="<?php echo $r['rem_no_pay']?>">
                                        <button class="btn btn-success" type="submit" name="status" value="approved">Approve</button>
                                        <button class="btn btn-danger" type="submit" name="status" value="rejected">Reject</button>
                                    </form>
                                    </div>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                <?php $count++;
                    } 
                } else { ?>
                    <p class="text-center">No leave requests</p>
                <?php }?>              

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>