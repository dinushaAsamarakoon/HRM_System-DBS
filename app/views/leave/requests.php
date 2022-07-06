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

    <?php if ($this->requests && count($this->requests)){ 

        foreach($this->requests as $request)
        {
            $l = (array) $request;
        ?>
            <div class="request">
                <?php echo $l['id']; ?>
                <?php echo $l['type']; ?>
                <?php echo $l['apply_date']; ?>
                <?php echo $l['start_date']; ?>
                <?php echo $l['duration']; ?>
                <?php echo $l['reason']; ?>
                <?php echo $l['status']; ?>
            </div>
            <form action="<?=SROOT?>EmployeeLeave/approve" method="post">
                <input type="hidden" name="id" value="<?php echo $l['id']?>">
                <input type="hidden" name="emp_id" value="<?php echo $l['emp_id']?>">
                <input type="hidden" name="sup_id" value="<?php echo $l['sup_id']?>">
                <button type="submit" name="status" value="approved">Approve</button>
                <button type="submit" name="status" value="rejected">Decline</button>
            </form>
        <?php          
        }
    }
    ?>

</body>
</html>