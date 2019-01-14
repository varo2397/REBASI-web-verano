$(function(){
	$.getJSON("js/directions.json", function(json){
		//console.log(json[1][0]['cantones']);
		$.each(json, function(key,value){
			//console.log('<option value="'+i+'">'+item+'</option>');
			//console.log(value[0]["province"]);
			$('#province').append('<option value="'+key+'">'+value["province"]+'</option>');
		});

		$.each(json[1]['cantones'], function(i,item){
			//console.log('<option value="'+i+'">'+item+'</option>');
			//console.log(item);
			$('#canton').append('<option value="'+i+'">'+item['canton']+'</option>');
		});
	});
});


$('#radios-1').click(function() {
   if($('#radios-1').is(':checked')) {
    $('#place').show('slow');
   }
});

$('#radios-0').click(function() {
	if($('#radios-0').is(':checked')) {
	   	$('#place').hide(1500);
	   }
});

$('#province').change(function(){
	var provinceID = $('#province').val();
	$('#canton').empty();
	$.getJSON("js/directions.json", function(json){
		//console.log(json[1][0]['cantones']);
		$.each(json[provinceID]['cantones'], function(i,item){
			//console.log('<option value="'+i+'">'+item+'</option>');
			$('#canton').append('<option value="'+i+'">'+item['canton']+'</option>');
		});
	});
});

