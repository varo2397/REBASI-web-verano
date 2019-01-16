$(function(){
	$.getJSON("http://localhost:8000/js/directions.json", function(json){
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

		$.each(json[1]['cantones'][1]['districts'], function(i,item){
			//console.log('<option value="'+i+'">'+item+'</option>');
			//console.log(item);
			$('#district').append('<option value="'+i+'">'+item+'</option>');
		});
	});
});


$('#role').change(function() {
	var role = $('#role').val();
   if(role == 1) {
    $('#place').show('slow');
   }else{
   	$('#place').hide(1500);
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
	$.getJSON("http://localhost:8000/js/directions.json", function(json){
		//console.log(json[1][0]['cantones']);
		$.each(json[provinceID]['cantones'], function(i,item){
			//console.log('<option value="'+i+'">'+item+'</option>');
			$('#canton').append('<option value="'+i+'">'+item['canton']+'</option>');
		});
	});
});

$('#canton').change(function(){
	var cantonID = $('#canton').val();
	var provinceID = $('#province').val();
	$('#district').empty();
	$.getJSON("http://localhost:8000/js/directions.json", function(json){
		//console.log(json[1][0]['cantones']);
		$.each(json[provinceID]['cantones'][cantonID]['districts'], function(i,item){
			//console.log(json[provinceID][cantonID]);
			//console.log('<option value="'+i+'">'+item+'</option>');
			$('#district').append('<option value="'+i+'">'+item+'</option>');
		});
	});
});
