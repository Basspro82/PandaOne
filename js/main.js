$(document).ready(function() {
    
    //Delete comment

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

    // Show stars

    var options = {
        max_value: 5,
        step_size: 0.5,
        selected_symbol_type: 'utf8_star',
        initial_value: 0,
        update_input_field_name: $("#score"),
    }
    $(".rate").rate(options);

    var options = {
        max_value: 5,
        step_size: 0.5,
        selected_symbol_type: 'utf8_star',
        readonly:true,
    }
    $(".rateRO").rate(options);

    // Enabled Tooltip

    $(function () {
        $('[data-toggle="popover"]').popover();
    })

 });