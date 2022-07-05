<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NMEmployee Dashbord</title>
    <script>
        function showNotifications() {
            var $n_list= document.getElementById("n_list");
            if ($n_list.style.visibility == "hidden") {
                $n_list.style.visibility = "visible";
            } else {
                $n_list.style.visibility = "hidden";
            }
        }
    </script>
</head>
<body>
    <a href="<?=SROOT?>Profile">Personal Information</a>
    <a href="<?=SROOT?>EmployeeLeave/application">Leave Application</a>
    <a href="<?=SROOT?>EmployeeLeave/details">Leave Details</a>
    <button onclick="showNotifications()"><?php if ($this->notifications){echo count($this->notifications);} else {echo 0;} ?></button>
    <div class="notifications" id="n_list" style="visibility: hidden">
    <?php $notifications = $this->notifications;
     if ($notifications) {
         foreach($notifications as $notification) {
             $n = (array) $notification;
             ?>
             <a href="<?=SROOT?>EmployeeLeave/request/<?php echo $n['id'] ?>"><?php echo $n['message'] . ' ' . $n['time']; ?> </a>

             <form action="<?=SROOT?>NMEmployeeFunctionHandler/readNotification" method="post">
                <input type="hidden" name="id" value="<?php echo $n['id'] ?>">
                <button type="submit">Mark as read</button>
             </form>
        <?php }
    } ?>
    </div>
</body>
</html>