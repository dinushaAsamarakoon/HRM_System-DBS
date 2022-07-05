<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Details</title>
</head>
<body>
    
    <h3>Leave Details</h3>

    <?php if ($this->details) { ?>
    <?php $d = (array) $this->details[0]; ?>
    <?php echo 'pay grade: ' . $d['pay_grade']; ?>
    <p>Remaining Leaves</p>
    <?php echo 'Annual: ' . $d['rem_annual']; ?> <br>
    <?php echo 'Casual: ' . $d['rem_casual']; ?> <br>
    <?php echo 'Maternity: ' . $d['rem_maternity']; ?> <br>
    <?php echo 'No Pay: ' . $d['rem_no_pay']; ?> <br>
    <?php } ?>

    <?php if ($this->requests && count($this->requests)) { ?>
        <p>Leave Requests</p>
            <?php foreach($this->requests as $request)
            {
                $r = (array) $request;
            ?>
                <div>
                    <?php echo $r['id']; ?>
                    <?php echo $r['type']; ?>
                    <?php echo $r['apply_date']; ?>
                    <?php echo $r['start_date']; ?>
                    <?php echo $r['duration']; ?>
                    <?php echo $r['reason']; ?>
                </div>
            <?php          
            }
        }
?>

</body>
</html>