$(document).ready(function() {
    
    //Delete comment

    $(".btnRemove").click(function() {

    	var commentID = $(this).attr('data-commentID');

        $.ajax({
            type: 'post',
            dataType:'json',
            url: 'ajax-delete-code.php',
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

    // Comment Add

    show = false;

    $(".btn1").change(function() {
        manageCommentForm();
        initCommentForm();
    });

    $(".btn2").change(function() {
        manageCommentForm();
    });

    $(".btn3").change(function() {
        manageCommentForm();
        setCommentForm($(this).attr("data-title"),$(this).attr("data-imdbID"));
    });

 });

function manageCommentForm(){
    if (show){
        hideCommentForm();
        show = false;
    }else{
        showCommentForm();
        show = true;
    }
}

function initCommentForm(){

    $("#fTitle").val("");
    $("#fTitle").attr("class","form-control d-none");
    $("#searchBox").attr("class","form-control");

}

function setCommentForm(title,imdbID){

    $("#fTitle").val(title);
    $("#fTitle").attr("class","form-control");

    $("#title").val(title);

    $("#searchBox").attr("class","form-control d-none");

    $("#imdbID").val(imdbID);

    $("#btnSave").prop("disabled", false);

}

function showCommentForm(){
    $("#js-menu").attr("class","outer-menu show");
}

function hideCommentForm(){
    $("#js-menu").attr("class","outer-menu");
}