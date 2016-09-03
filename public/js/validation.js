$(function () { 
    jQuery.validator.addMethod("uniqueEmail", function(value, element) {
        var result = false;
        $.ajax({
            url: '/index/checkEmail',
            type: 'POST',
            data: {email:value},
            dataType: 'JSON',
            async: false,
            success: function(response){
                if(response.count == 0){
                    result = true;
                }
            }
        });
        return result;
    }, "* Email id already registered with us.");

    $("#registration").validate({
        rules: {
            email: {
                required: true,
                uniqueEmail: true
            },
            // profile_picture:{
            //     required: true
            // }
        },
        messages: {
            email: {
                required: "* required"
            },
            // profile_picture:{
            //     required: "* required"
            // }
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
})
