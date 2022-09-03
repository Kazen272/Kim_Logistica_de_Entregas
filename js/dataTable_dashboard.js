$(document).ready(function(){
    $('#logistic-table').DataTable({
        "processing": true,
        "serverside": true,
        "ajax":{
            type: "POST",
            url:  "../sistema/dataTable.php"
        }

    });
});

