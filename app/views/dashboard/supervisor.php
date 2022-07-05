<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supervisor Dashboard</title>
</head>
<body>
    <a href="<?=SROOT?>EmployeeLeave/approval">Leave Requests</a>
    <?php if ($this->requests){ echo count($this->requests); } ?>
</body>
</html>