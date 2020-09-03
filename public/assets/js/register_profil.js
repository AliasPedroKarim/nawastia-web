(function ($) {
    /* Inscription */

    var verifPasswordInputSignIn = function(displayMessage){
        try {
            if (displayMessage === undefined){
                displayMessage = false;
            }

            var valid = true;

            if($('#new_password__register').val() !== '' && $('#similary_password__register').val() !== ''){
                valid = true;
            }else if ($('#new_password__register').val() === '' || $('#similary_password__register').val() === '') {
                valid = false;
                if (displayMessage === true){
                    $('body').append(displayAlert(`<strong>Attention !</strong> L'un des champs de mots de passe n'est pas rempli.`, 'danger'));
                }
            }

            if ($('#new_password__register').val().length >= 8 && $('#similary_password__register').val().length >= 8) {
                $('.exigence-1').removeClass('text-danger');
                valid = true;
            }else{
                $('.exigence-1').addClass('text-danger');
                valid = false;
            }

            var pattern = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/gm;

            if ($('#new_password__register').val().match(pattern) === null && $('#similary_password__register').val().match(pattern) === null){
                $('.exigence-2').addClass('text-danger');
                valid = false;
            } else if ($('#new_password__register').val().match(pattern) !== null && $('#similary_password__register').val().match(pattern) !== null){
                $('.exigence-2').removeClass('text-danger');
                valid = true;
            }

            if ($('#new_password__register').val().match(/[0-9]/gm) === null && $('#similary_password__register').val().match(/[0-9]/gm) === null){
                $('.exigence-3').addClass('text-danger');
                valid = false;
            } else if ($('#new_password__register').val().match(/[0-9]/gm) !== null && $('#similary_password__register').val().match(/[0-9]/gm) !== null) {
                $('.exigence-3').removeClass('text-danger');
                valid = true;
            }

            if ($('#new_password__register').val() !== $('#similary_password__register').val() || ($('#new_password__register').val() === '' && $('#similary_password__register').val() === '')){
                $('#new_password__register').addClass('is-invalid').removeClass('is-valid');
                $('#similary_password__register').addClass('is-invalid').removeClass('is-valid');
                valid = false;
            }else if ($('#new_password__register').val() === $('#similary_password__register').val() || ($('#new_password__register').val() !== '' && $('#similary_password__register').val() !== '')) {
                $('#new_password__register').removeClass('is-invalid').addClass('is-valid');
                $('#similary_password__register').removeClass('is-invalid').addClass('is-valid');
                valid = true;
            }

            if (valid === true){
                $("#inscription").attr('onclick', null);
            }else{
                $("#inscription").attr('onclick', 'return false');
            }

            return valid
        }catch (e) {

        }
    };

    $(document).ready(function (event) {
        verifPasswordInputSignIn()
    });

    $('#new_password__register').keyup(function (event) {
        verifPasswordInputSignIn()
    });
    $('#similary_password__register').keyup(function (event) {
        verifPasswordInputSignIn()
    });

    var form = document.forms.namedItem("form_register");
    form.addEventListener('submit', function(ev) {
        ev.preventDefault();
        if (verifPasswordInputSignIn(true) === true){
            var oData = new FormData(form);

            oData.append("inscription", "true");

            var oReq = new XMLHttpRequest();
            oReq.open("POST", `${$(this).attr('action')}`, true);
            oReq.onload = function(oEvent) {

                if (oReq.response.length !== 0){
                    console.log(oReq.response);
                    var data = JSON.parse(oReq.response)
                    var alert = '';

                    if (data[0].error && data[0].error === false){
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
                }else {
                    $('body').append(displayAlert("Une erreur est survenue lors de l'exécution de la tâche.", 'danger'));
                }
            };

            oReq.send(oData);
        } else if (verifPasswordInputSignIn(true) === false) {

        }

    }, false);
})(jQuery)