// Show compatibility

function showCompatibility(userID,friendID){
	$.ajax({
		type: 'post',
		dataType:'json',
		url: 'ajax-compatibility-code.php',
		data:{userID:userID, friendID:friendID},
		success: function (response) {
			
			var color = '#6EEB83';
			if (response < 66){
				color = '#D95D39';
			}else if (response < 33){
				color = '#A50104';
			}

			var value = response/100;

			$('#' + friendID).circleProgress({
				value: value,
				fill: { gradient: [color, color] }
			}).on('circle-animation-progress', function(event, progress) {
				$(this).find('strong').html(parseInt(100 * value) + '<i>%</i>');
			});

		}
	});
}