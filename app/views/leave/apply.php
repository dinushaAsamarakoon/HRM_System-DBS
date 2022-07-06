<?php 
    // if (!isset($_SESSION['customername'])){
    //     if (isset($_SESSION['employeename'])){
    //         Router::redirect('EmployeeDashboard');
    //     }else {
    //         Router::redirect('');
    //     }
        
    // }
?>


<?php
// $customer = Customer::currentLoggedInCustomer();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Application</title>
</head>
<body>

    <h3>Leave Application</h3>

    <form action="<?=SROOT?>EmployeeLeave/request" method="post">
    <div>
        <label>Leave type</label><br>
        <input type="radio" name="type" value="annual">
        <label for="annual">Annual</label>
        <input type="radio" name="type" value="casual">
        <label for="casual">Casual</label>
        <input type="radio" name="type" value="maternity">
        <label for="maternity">Maternity</label>
        <input type="radio" name="type" value="nopay">
        <label for="nopay">No Pay</label>
    </div>
    <br>
    <div>
        <label for="start_date">From</label>
        <input type="date" name="from">
        <label for="end_date">To</label>
        <input type="date" name="to">
    </div>
    <br>
    <label>Reason</label><br>
    <textarea id="reason" name="reason" rows="4" cols="50" placeholder=""></textarea>
    <br>
    <input type="submit" class="submitBtn" value="Submit">
    </form>

</body>
</html>