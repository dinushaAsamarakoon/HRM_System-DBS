<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Requests</title>
</head>
<body>
    
    <h3>Leave Requests</h3>

    <?php if ($this->leaves && count($this->leaves)){ 

        foreach($this->leaves as $leave)
        {
            $l = (array) $leave;
        ?>
            <div>
                <?php echo $l['id']; ?>
                <?php echo $l['type']; ?>
                <?php echo $l['apply_date']; ?>
                <?php echo $l['start_date']; ?>
                <?php echo $l['duration']; ?>
                <?php echo $l['reason']; ?>
            </div>
        <?php          
        }
    }
    ?>
    
    <a href="<?=SROOT?>EmployeeLeave/request">Request Leave</a>

</body>
</html>