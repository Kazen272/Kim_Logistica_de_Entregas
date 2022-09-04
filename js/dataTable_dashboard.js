$(document).ready(function(){
    $('#logistic-table').DataTable({
        "processing": true,
        "serverside": true,
        "ajax": "../sistema/dataTable.php"
    });
});