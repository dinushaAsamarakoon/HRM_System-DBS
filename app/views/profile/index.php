<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h3>Employee Profile</h3>
    <?php $p = (array) $this->profile[0];
    echo 'Employee ID: ' . $p['emp_id'];
    echo 'Job title: ' . $p['job_title'];
    echo 'Pay grade: ' . $p['pay_grade'];
    echo 'Employee status ID: ' . $p['emp_status_id'];
    echo 'Supervisor ID: ' . $p['sup_id'];
    echo 'Department name: ' . $p['dept_name']; ?>
</body>
</html>