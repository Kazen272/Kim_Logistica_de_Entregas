$(document).ready(function(){
    $('#logistic-table').DataTable({
        "processing": true,
        "serverside": true,
        ajax: {
            url: 'datatable.php',
            type: 'POST',
        }
    });
});