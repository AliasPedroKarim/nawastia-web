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

function displayAlert(message, alert){
    if (alert === undefined){
        alert = 'success';
    }
    var html = `<div class="alert alert-${alert} alert-dismissible fade show top-fixed col-6 offset-3 mt-3" role="alert" style="z-index: 999999;">
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

        var st = $(this).scrollTop();
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

    /* Switch control */

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
    $(".switch-notification-activite").change(function (e) {
        if (e.currentTarget.checked === true){
            $(this).parent().parent().parent().find('small').html(`Vous serez notifié pour les nouvelles activités.`);
        }else {
            $(this).parent().parent().parent().find('small').html(`Vous ne serez pas notifié pour les nouvelles activités.`);
        }
    });

    function verifSwitch(selector, message){

        try{
            if (selector[0].checked === true){
                selector.parent().parent().parent().find('small').html(message.true);
            }else {
                selector.parent().parent().parent().find('small').html(message.false);
            }
        }catch (e) {

        }
    }

    $(document).ready(function () {
        verifSwitch($(".switch-followers"), {true: `On peut vous suivre.`, false: `On ne peut pas vous suivre.`});
        verifSwitch($(".switch-visibled"), {true: `Vous êtes actuellement visible.`, false: `Vous êtes actuellement invisible.`});
        verifSwitch($(".switch-notification-activite"), {true: `Vous serez notifié pour les nouvelles activités.`, false: `Vous ne serez pas notifié pour les nouvelles activités.`});
    })

    /* Connexion */

    try {
        var form = document.forms.namedItem("form_sign_in");
        form.addEventListener('submit', function(ev) {

            var oData = new FormData(form);

            oData.append("connexion", "true");

            var oReq = new XMLHttpRequest();
            oReq.open("POST", `${$(this).attr('action')}`, true);
            oReq.onload = function(oEvent) {

                var data = JSON.parse(oReq.response)
                var alert = '';

                if (data[0].error === false){
                    alert = 'success';
                }else{
                    alert = 'danger';
                }

                if (oReq.status == 200) {
                    if (alert && data[0].message){
                        $('body').append(displayAlert(data[0].message, alert));
                    }
                    if (data[0].error === false && data[0].sign_in === true){
                        setTimeout(function () {
                            window.location.pathname = "";
                        }, 3 * 1000)
                    }
                } else {
                    if (alert && data[0].message){
                        $('body').append(displayAlert("Une erreur est survenue lors de l'exécution de l'action.", 'danger'));
                    }
                }
            };

            oReq.send(oData);
            ev.preventDefault();
        }, false);
    }catch (e) {
        
    }

    /* edit notification */
    try{

        var form_edit_profil_notification = document.forms.namedItem("edit_profil_notification");
        form_edit_profil_notification.addEventListener('submit', function(ev) {

            var oOutput = document.querySelector("div"),
                oData = new FormData(form_edit_profil_notification);

            var atop = atob($(this).attr('action'));

            oData.append("edit_profil_notification", "true");
            //oData.append("notification_activite__edit", document.getElementById('notification_activite__edit')[0].checked);

            var oReq = new XMLHttpRequest();
            oReq.open("POST", `${atop}`, true);
            oReq.onload = function(oEvent) {

                var data = JSON.parse(oReq.response)
                var alert = '';

                if (data[0].error === false){
                    $('#profil-edit').html(data[0].data);
                    alert = 'success';
                }else{
                    alert = 'danger';
                }

                if (oReq.status == 200) {
                    if (alert && data[0].message){
                        $('body').append(displayAlert(data[0].message, alert));
                    }
                } else {
                    if (alert && data[0].message){
                        $('body').append(displayAlert("Attention ! Mise à jour de photo de profil incomplete <br>" +
                            "Une erreur a été detecté !", 'danger'));
                    }
                }
            };

            oReq.send(oData);
            ev.preventDefault();
        }, false);
    }catch (e) {

    }

})(jQuery);