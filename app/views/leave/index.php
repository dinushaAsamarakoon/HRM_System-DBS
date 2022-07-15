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
    

   

</body>
</html>
    <div class="container-xl mt-5 mb-5">

    <h4 class="text-center">Remaining Leaves</h4>
    <div class="row justify-content-center">
    <div class="col-sm-6 table-responsive no-wrap">
        <table class="table table-hover table-borderless align-middle no-wrap">
            <thead class="thead">
                <tr>
                    <th>Annual</th>
                    <th>Casual</th>
                    <th>Maternity</th>
                    <th>No Pay</th>
                </tr>
            </thead>
            <tbody>
            <?php if ($this->record) { ?>
                    <?php $r = (array) $this->record[0]; ?>
                    <tr class="border-top">
                        <th>
                        <?php echo $r['rem_annual'];?>
                        </th>
                        <td>
                        <?php echo $r['rem_casual']; ?>
                        </td>
                        <td>
                        <?php echo $r['rem_maternity'];?>
                        </td>
                        <td>
                        <?php echo $r['rem_no_pay'];?>
                        </td>
                    </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    </div>

    <h4 class="text-center">Leave Requests</h4>
    <div class="row justify-content-center">
    <div class="col-xl-9 table-responsive no-wrap">
        <table class="table table-hover table-borderless align-middle no-wrap">
            <thead class="thead">
                <tr>
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
            <tbody>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>