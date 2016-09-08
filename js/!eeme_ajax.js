jQuery(document).ready(function($){
    $("#submit").on('click',function(){
        var formdata = $("form").serializeArray ();
        selfurl = location.href;
        console.log(formdata);
        $.ajax({
            type: 'POST',
            url: samples_save.ajaxurl,
            data: ({"action": 'samples_save_data_init', "samples_form_submit": formdata}),
           
            success: function(response){
                $("#content-text").append(response);
            },
            error: function(){
                // $(".thank-u.content-body ").append("Some error");
            }
    });
});  
});
