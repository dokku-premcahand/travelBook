$(document).ready(function(){
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile_picture').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("body").on('change','#profilePic',function(){
        readURL(this);
    });

    $("body").on('click','#registrationModalClose',function(){
        $("label.error").hide();
        $("#regEmail").val('');
        $(":file").filestyle('clear');
        $(".profile_picture").attr('src',BaseURL+'public/images/default_profile_picture.jpg');
    });
});
