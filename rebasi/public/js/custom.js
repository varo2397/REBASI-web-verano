$('#radios-1').click(function() {
   if($('#radios-1').is(':checked')) {
    //$('#place').append(selects); 
    $('#place').show('slow');
   }
});

$('#radios-0').click(function() {
	if($('#radios-0').is(':checked')) {
	   	$('#place').hide(1500);
	   }
});
