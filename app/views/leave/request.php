<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Request</title>
</head>
<body>
    
    <h3>Leave Request</h3>

    <?php if ($this->request) {
    $request = (array) $this->request[0]; ?>
    <div>
        <?php echo 'id: ' . $request['id']; ?>
        <?php echo 'type: ' . $request['type']; ?>
        <?php echo 'requested date: ' . $request['apply_date']; ?>
        <?php echo 'from: ' . $request['start_date']; ?>
        <?php echo 'to: ' . $request['end_date']; ?>
        <?php echo 'reason: ' . $request['reason']; ?>
        <?php echo 'status: ' . $request['status']; ?>
    </div>
    <?php } ?>
</body>
</html>