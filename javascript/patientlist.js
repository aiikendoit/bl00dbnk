$(document).ready(function(){
	var left = $('#searchid').position().left;
	var top = $('#searchid').position().top;
	var width = $('#searchid').width();

	$('#result').css('left', left+5).css('top', top+40).css('width', width);

	$('#searchid').keyup(function(){
		var value = $(this).val();

		if(value != ''){
			$('#result').show();
			$.post('search.php', {value: value}, function(data){
				$('#result').html(data);
			});
		}else{
			$('#result').hide();
		}
	});

});