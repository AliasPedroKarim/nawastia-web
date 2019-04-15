(function($) {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

function keyUpCaratere(input, display, defaultMessage) {
    input.keyup(() => {
        if (input.val() === ""){
            display.html(`${defaultMessage}`);
        }else{
            display.html(`${input.val()}`);
        }
    });
}

(function ($) {

    var lastScrollTop = 0;

    var origin_number_opaticity = 0.1;

    $(window).scroll(function (event) {

        var scroll = $(window).scrollTop();

        if (origin_number_opaticity >= 1){
            origin_number_opaticity = 1;
        }if (origin_number_opaticity <= 0){
            origin_number_opaticity = 0;
        }

        var heightPage = $('body');

        $('.navbar').css(`background-color`, `rgba(52, 58, 64, ${origin_number_opaticity})`);

        st = $(this).scrollTop();
        if(st < lastScrollTop) {
            origin_number_opaticity -= 0.1;
        }
        else {
            origin_number_opaticity += 0.1;
        }
        lastScrollTop = st;

        if (scroll === 0){
            origin_number_opaticity = 0
        }

        console.log(origin_number_opaticity)
    });
})(jQuery);