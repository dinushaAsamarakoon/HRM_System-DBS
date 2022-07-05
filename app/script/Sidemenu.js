$(document).ready(function () {

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        // Disable and enable the side menu links
        if (document.getElementById('list1').style.pointerEvents ==='none'){
            document.getElementById('list1').style.pointerEvents = 'auto';
        }
        else {
            document.getElementById('list1').style.pointerEvents = 'none';
        }

    });

});
