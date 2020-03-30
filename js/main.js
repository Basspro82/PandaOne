$(document).ready(function() {
    $(".btnRemove").click(function() {

    	var commentID = $(this).attr('data-commentID');

        $.ajax({
            type: 'post',
            dataType:'json',
            url: 'delete-code.php',
            data:{commentID:commentID},
            success: function (response) {
            	$('.comment' + commentID).fadeOut();	    
            }
        });
    });
 });