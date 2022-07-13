$(function() {

    // Animate On Scroll
    AOS.init();

    // BackToTop
    var btn = $('#backToTop');
    $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });

    btn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, '300');
    });

    //  SmoothScroll
    $('.smoothScroll').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 500);
                return false;
            }
        }
    });

    // Contact Form
    $('.apply_form').on('submit', function(e) {
        $('#m_submit').attr("disabled", "true");
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'mail_handler.php',
            data: $("form").serialize(),
            success: function(data) {
                if (data == 'sent') {
                    $('#form_notification').removeClass('hide alert alert-danger').addClass('alert alert-success').slideDown().show();
                    $('#notification_content').html('<h4>Thank You! We will contact you shortly.</h4>');
                    setTimeout(function() {
                        $('#form_notification').addClass('hide').slideUp();
                    }, 3000);
                    e.preventDefault();
                } else if (data == "not_sent") {
                    $('#form_notification').removeClass('hide alert alert-success').addClass('alert alert-danger').slideDown().show();
                    $('#notification_content').html('<h4>Something went wrong, please try again.</h4>');
                    setTimeout(function() {
                        $('#form_notification').addClass('hide').slideUp();
                        $("#m_submit").prop("disabled", false);
                    }, 3000);
                    e.preventDefault();
                }
            }
        });
        return false;
    });

});