// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({

    "language": {
      "lengthMenu": "Mostrando _MENU_ registros por página",
      "zeroRecords": "Nada encontrado - desculpa",
      "info": "página _PAGE_ de _PAGES_",
      "infoEmpty": "Nenhum registro encontrado",
      "infoFiltered": "(filtrado de _MAX_ registros totáis)"
  }
    
  });
  
});
