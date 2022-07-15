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
    
<div class="container-xl mt-5 mb-5">
<h4 class="text-center">Leave Requests</h4>

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
                            echo $r["id"] ?>
                        </div>
                        <div class="col-2">
                            Employee ID:
                            <?php
                            echo $r["emp_id"] ?>
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
                                <h6>Reason: <span>
                                <?php echo $r["reason"]; ?>
                                </span>
                                </h6>
                                <h6>From: <span>
                                <?php echo $r["start_date"]; ?>
                                </span>
                                <h6>To: <span>
                                <?php echo $r["end_date"]; ?>
                                </span>
                                </h6><h6>Duration: <span>
                                <?php if ($r["duration"] == 1) {
                                    echo $r["duration"] . " day";
                                    } else {
                                    echo $r["duration"] . " days";
                                    }
                                    ?>
                                </span>
                            </div>
                            <div class="row justify-content-center mb-1">
                            <div class="col col-xl-2 text-center mb-1">
                            <form action="<?=SROOT?>EmployeeLeave/approval" method="post">
                                <input type="hidden" name="id" value="<?php echo $r['id']?>">
                                <input type="hidden" name="emp_id" value="<?php echo $r['emp_id']?>">
                                <input type="hidden" name="sup_id" value="<?php echo $r['sup_id']?>">
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
        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>