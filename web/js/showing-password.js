$('.input-group-text .fa-eye, .input-group-text .fa-eye-slash').on('click', function() {
        var icon = $(this);
        var input = icon.closest('.input-group').find('input');
        if (input.attr('type') === 'password') {
            input.attr('type', 'text');
            icon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            input.attr('type', 'password');
            icon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });