// Call the dataTables jQuery plugin
$(document).ready(function () {
  $('#dataTableCategories').DataTable({
    columns: [
      null,
      { orderable: false }
    ]
  });

  $('#dataTableArticles').DataTable({
    columns: [
      null,
      null,
      null,
      null,
      { orderable: false }
    ]
  });
});
