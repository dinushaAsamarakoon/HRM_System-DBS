<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Record</title>
</head>
<body>
    
    <h3>Leave Record</h3>

    <?php if ($this->record) { ?>
    <?php $r = (array) $this->record[0]; ?>
    <?php echo 'pay grade: ' . $r['pay_grade']; ?>
    <p>Remaining Leaves</p>
    <?php echo 'Annual: ' . $r['rem_annual']; ?> <br>
    <?php echo 'Casual: ' . $r['rem_casual']; ?> <br>
    <?php echo 'Maternity: ' . $r['rem_maternity']; ?> <br>
    <?php echo 'No Pay: ' . $r['rem_no_pay']; ?> <br>
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