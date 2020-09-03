(function ($) {

    /* Edit Information utilisateur */

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

        try {
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

            var pattern = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/gm;

            if ($('#new_password__edit').val().match(pattern) === null && $('#similary_password__edit').val().match(pattern) === null){
                $('.exigence-2').addClass('text-danger');
                valid = false;
            } else if ($('#new_password__edit').val().match(pattern) !== null && $('#similary_password__edit').val().match(pattern) !== null){
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
        }catch (e) {
            return null;
        }
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
    });

    try {
        var form = document.forms.namedItem("form_edit_profil_avatar");
        form.addEventListener('submit', function(ev) {

            var oOutput = document.querySelector("div"),
                oData = new FormData(form);

            oData.append("photo-profil", document.getElementById('photo-profil__edit').files[0]);

            oData.append("edit_profil_avatar", "true");

            var oReq = new XMLHttpRequest();
            oReq.open("POST", `${$(this).attr('action')}`, true);
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
})(jQuery)