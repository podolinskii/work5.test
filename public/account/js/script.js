$(document).ready(function (){


    $(document).on('click','.change', function (){
        let attr = $(this).attr('attr');
        $('.clear[attr="'+attr+'"]').prop('disabled', false);
        $('.save[attr="'+attr+'"]').fadeIn();
        $(this).fadeOut();
    });


    $(document).on('click', '.save', function (e){
        let target = $(this).attr('attr');
        let value = $('.clear[attr="'+target+'"]').val();
        $.ajax({
            type: "POST",
            url: "/account/changeUserInfo/",
            data: "target=" + target + "&value="+value,
            dataType: "HTML",
            cache: false,
            success: function (data) {

                $('.clear[attr="'+target+'"]').prop('disabled', true);
                $('.change[attr="'+target+'"]').fadeIn();
                $('.save[attr="'+target+'"]').fadeOut();



            }
        });
    });

    $(document).on('click','.change_pw', function (){
        $(this).fadeOut();
        $('#old_pass').fadeIn();
        $('#new_pass').fadeIn();
        $('.change_pass').fadeIn();

    });

    let inProgres = false;
    $(document).on('click','.change_pass', function (e){
        e.preventDefault();

        if(!inProgres) {
            inProgres = true;
            $('#error').hide();
            let old_pw = $('#old_pass').val();
            let new_pw = $('#new_pass').val();

            if (old_pw != '' && new_pw != '') {
                $.ajax({
                    type: "POST",
                    url: "/account/changePassword/",
                    data: "old_pw=" + old_pw + "&new_pw=" + new_pw,

                    cache: false,
                    success: function (msg) {

                        if (msg == 200) {
                            $('#old_pass').fadeOut();
                            $('#new_pass').fadeOut();
                            $('.change_pass').fadeOut();
                            $('.change_pw').fadeOut();
                            $('#success').fadeIn();


                        } else {
                            $('#error').show();
                            $('#error').html(msg);
                        }


                    }
                });
            } else {
                $('#error').show();
                $('#error').html('Заполните все поля!');
            }
            inProgres = false;
        }

    });

});