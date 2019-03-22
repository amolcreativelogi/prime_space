function getdatatableRecord(Id,Url)
{
  table = $(Id).DataTable({
        dom: 'lBfrtip',
        buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
        ],
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.
                // Load data for the table's content from an Ajax source
                "ajax": {
                        "url": Url,
                        "type": "POST"
                },
                //Set column definition initialisation properties.
                "columnDefs": [
                {
                        "targets": [ -1 ], //last column
                        "orderable": false, //set not orderable
                },
                ],
        });
}