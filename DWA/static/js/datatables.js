// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    "columnDefs": [
      { "width": "10%", "targets": 0 }
    ]
  });
});
