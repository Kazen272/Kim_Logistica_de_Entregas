$(document).ready(function(){
    $('#logistic-table').DataTable({
        "processing": true,
        "serverside": true,
        ajax: {
            url: 'dataTable.php',
            type: 'POST',
            }
    });
});