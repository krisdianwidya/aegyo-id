// Call the dataTables jQuery plugin
$(document).ready(function () {
  $('#dataTable').DataTable({
    columns: [
      null,
      { orderable: false }
    ]
  });
});
