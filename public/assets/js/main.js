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

        $('.navbar-custom').css(`background-color`, `rgba(52, 58, 64, ${origin_number_opaticity})`);

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
    });

    WeeklyHours = function() {
        var a, e, t = $("#weeklyHoursChart");
        t.length && (a = t, e = new Chart(a, {
            type: "bar",
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            callback: function(a) {
                                if (!(a % 10)) return a + "hrs"
                            }
                        }
                    }]
                },
                tooltips: {
                    callbacks: {
                        label: function(a, e) {
                            var t = e.datasets[a.datasetIndex].label || "",
                                o = a.yLabel,
                                r = "";
                            return 1 < e.datasets.length && (r += '<span class="popover-body-label mr-auto">' + t + "</span>"), r += '<span class="popover-body-value">' + o + "hrs</span>"
                        }
                    }
                }
            },
            data: {
                labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                datasets: [{
                    data: [21, 12, 28, 15, 5, 12, 17, 2]
                }]
            }
        }), a.data("chart", e))
    }();

    jQuery(".switch_price_prod").click(function () {
        jQuery("[js-price-value]").html(jQuery(this).attr("data-price_label"));
        jQuery("[js-license-type]").val(jQuery(this).attr("data-type"));
        jQuery("[js-price-dropdown]").html(jQuery(this).attr("data-label"));
    });

    //Mobile preview Iframe action
    $('.btn-iframe-to-mobile-trigger').on('click', function (event) {
        event.preventDefault();
        $('.iframe-preview').addClass('iframe-preview--mobile');
    });
    $('.btn-iframe-to-desktop-trigger').on('click', function (event) {
        event.preventDefault();
        $('.iframe-preview').removeClass('iframe-preview--mobile');
    });

    //Theme submission preview iframe toggle
    $('.btn-iframe-to-preview-trigger').on('click', function (event) {
        event.preventDefault();
        $('.iframe-preview').attr('src', '//bootstrap-themes.github.io/dashboard');
    });
    $('.btn-iframe-to-details-trigger').on('click', function (event) {
        event.preventDefault();
        $('.iframe-preview').attr('src', location.origin + '/product/stripped');
    });

    //Setting initial frame
    $('#submitPreviewIframe').attr('src', location.origin + '/product/stripped');

    $('[js-handle="review-toggler"]').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')
        $(this).removeClass('active')
        $('.sub-nav-link.active').removeClass('active')
        $('.sub-nav-link[href="#reviews-tab"]').addClass('active')
        $('html, body').animate({
            scrollTop: $('.sub-nav-link[href="#reviews-tab"]').offset().top - 100
        }, 1000);
    });

    $('#billToEditable').popover({
        'placement':'left',
        'html': true,
        'content':'<div class="mb-1 d-flex justify-content-between align-items-center"><strong>Billing info is editable</strong><button style="fonts-size: 1.25rem;" class="close">Ã—</button></div><span class="text-gray">Click your info and type to make edits, including adding a VAT or a company name!<span>',
        'trigger': 'manual'
    }).popover('show');

    $(document).on("click", ".popover .close" , function(){
        $(this).parents(".popover").popover('hide');
    });

    $(document).on("focus", "#billToEditable" , function(){
        $(".popover").popover('hide');
    });


    $(".switch-followers").change(function (e) {
        if (e.currentTarget.checked === true){
            $(this).parent().parent().parent().find('small').html(`On peut vous suivre.`);
        }else {
            $(this).parent().parent().parent().find('small').html(`On ne peut pas vous suivre.`);
        }
    });

    $(".switch-visibled").change(function (e) {
        if (e.currentTarget.checked === true){
            $(this).parent().parent().parent().find('small').html(`Vous êtes actuellement visible.`);
        }else {
            $(this).parent().parent().parent().find('small').html(`Vous êtes actuellement invisible.`);
        }
    });

    function verifSwitch(selector, message){

        if (selector[0].checked === true){
            selector.parent().parent().parent().find('small').html(message.true);
        }else {
            selector.parent().parent().parent().find('small').html(message.false);
        }
    }

    $(document).ready(function () {
        verifSwitch($(".switch-followers"), {true: `On peut vous suivre.`, false: `On ne peut pas vous suivre.`})
        verifSwitch($(".switch-visibled"), {true: `Vous êtes actuellement visible.`, false: `Vous êtes actuellement invisible.`})
    })

    /* Edit Information utilisateur */

    function displayAlert(message, alert){
        if (alert === undefined){
            alert = 'success';
        }
        var html = `<div class="alert alert-${alert} alert-dismissible fade show top-fixed col-6 offset-3 mt-3" role="alert">
                      ${message}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>`;
        setTimeout(function () {
            $('.alert-dismissible').css('transition', '.8s').css('display', 'none');
        }, 15 * 1000)
        return html;
    }

    $('#edit_profil_genaral').click(function (event) {
        event.preventDefault();

        var atop = atob($(this).attr('attr_encrypt'));

        $.post(atop, {
            id: $('#id__edit').val(),
            pseudo: $('#pseudo__edit').val(),
            nom: $('#nom__edit').val(),
            prenom: $('#prenom__edit').val(),
            email: $('#email__edit').val(),
            pseudo_discord: $('#pseudo_discord__edit').val(),
            genre: $("input[name='genre__edit'][checked='checked']").val(),
            visibilite_utilisateur: $('#visilite_utilisateur__edit')[0].checked,
            followers_utilisateur: $('#followers_utilisateur__edit')[0].checked,
            edit_profil_genaral: true
        }, function (data) {
            var alert = '';

            if (data[0].error === false){
                $('#profil-edit').html(data[0].data);
                alert = 'success';
            }else{
                alert = 'danger';
            }
            if (alert && data[0].message){
                $('body').append(displayAlert(data[0].message, alert));
            }
        },'json');

        return false;

    });

    $("input[name='genre__edit']").change(function (e) {

        var list_option_genre = $("input[name='genre__edit']");

        var checked = $(this).val();
        $(this).attr('checked', 'checked');

        for (var i = 0; i < list_option_genre.length; i++){
            if (checked !== list_option_genre[i].value){
                list_option_genre[i].removeAttribute('checked')
            }
        }

    });

    var verifPasswordInput = function(displayMessage){

        if (displayMessage === undefined){
            displayMessage = false;
        }

        var valid = true;

        if($('#old_password__edit').val() !== '' && $('#new_password__edit').val() !== '' && $('#similary_password__edit').val() !== ''){
            valid = true;
        }else if ($('#old_password__edit').val() === '' || $('#new_password__edit').val() === '' || $('#similary_password__edit').val() === '') {
            valid = false;
            if (displayMessage === true){
                $('body').append(displayAlert(`<strong>Attention !</strong> L'un des champs de mots de passe n'est pas rempli.`, 'danger'));
            }
        }

        if ($('#new_password__edit').val().length >= 8 && $('#similary_password__edit').val().length >= 8) {
            $('.exigence-1').removeClass('text-danger');
            valid = true;
        }else{
            $('.exigence-1').addClass('text-danger');
            valid = false;
        }

        if ($('#new_password__edit').val().match(/[-]/gm) === null && $('#similary_password__edit').val().match(/[-]/gm) === null){
            $('.exigence-2').addClass('text-danger');
            valid = false;
        } else if ($('#new_password__edit').val().match(/[-]/gm) !== null && $('#similary_password__edit').val().match(/[-]/gm) !== null){
            $('.exigence-2').removeClass('text-danger');
            valid = true;
        }

        if ($('#new_password__edit').val().match(/[0-9]/gm) === null && $('#similary_password__edit').val().match(/[0-9]/gm) === null){
            $('.exigence-3').addClass('text-danger');
            valid = false;
        } else if ($('#new_password__edit').val().match(/[0-9]/gm) !== null && $('#similary_password__edit').val().match(/[0-9]/gm) !== null) {
            $('.exigence-3').removeClass('text-danger');
            valid = true;
        }

        if ($('#new_password__edit').val() !== $('#similary_password__edit').val() || ($('#new_password__edit').val() === '' && $('#similary_password__edit').val() === '')){
            $('#new_password__edit').addClass('is-invalid').removeClass('is-valid');
            $('#similary_password__edit').addClass('is-invalid').removeClass('is-valid');
            valid = false;
        }else if ($('#new_password__edit').val() === $('#similary_password__edit').val() || ($('#new_password__edit').val() !== '' && $('#similary_password__edit').val() !== '')) {
            $('#new_password__edit').removeClass('is-invalid').addClass('is-valid');
            $('#similary_password__edit').removeClass('is-invalid').addClass('is-valid');
            valid = true;
        }

        if (valid === true){
            $("#edit_profil_password__edit").attr('onclick', null);
        }else{
            $("#edit_profil_password__edit").attr('onclick', 'return false');
        }

        return valid
    };

    $(document).ready(function (event) {
        verifPasswordInput()
    });


    $('#old_password__edit').keyup(function (event) {
        verifPasswordInput()
    });
    $('#new_password__edit').keyup(function (event) {
        verifPasswordInput()
    });
    $('#similary_password__edit').keyup(function (event) {
        verifPasswordInput()
    });

    $("#edit_profil_password__edit").click(function (event) {
        event.preventDefault();

        if (verifPasswordInput(true) === true){
            var atop = atob($(this).attr('attr_encrypt'));
            $.post(atop, {
                id: $('#id_password__edit').val(),
                old_password: $('#old_password__edit').val(),
                new_password: $('#new_password__edit').val(),
                similary_password: $('#similary_password__edit').val(),
                edit_profil_password: true
            }, function (data) {

                var alert = '';

                if (data[0].error === false){
                    $('#profil-edit').html(data[0].data);
                    alert = 'success';
                }else{
                    alert = 'danger';
                }
                if (alert && data[0].message){
                    $('body').append(displayAlert(data[0].message, alert));
                }
            },'json');
        } else if (verifPasswordInput(true) === false) {

        }

        return false;
    })

    $('#edit_profil_avatar__edit').click(function (event) {
        event.preventDefault();

        if (window.URL){
            console.log(document.getElementById('photo-profil__edit').files[0])
        } else{
            console.log('no load')
        }

        return false;
    })
})(jQuery);