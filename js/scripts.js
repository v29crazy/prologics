


//search on table
$(document).on("keyup", '#tableSearc', function() { 
  var value = $(this).val().toLowerCase();
  $("#myTabl tbody tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
  });
});
