(function ($) {
    /* Gestion add reaction */

    $('.emojiItem').click(function (e) {
        event.preventDefault();

        $.post("../../inc/traitement/activite/manage_activite.php", {
            id_activite: $(this).attr('contexte'),
            id_reaction: $(this).attr('unicode'),
            edit_reaction: true
        }, function (data) {

            if (data[0].data) {
                $('#new-activites').html(data[0].data)
            }
            if (data[0].script) {
                $('.script_edit_reaction').html(data[0].script)
            }

            /*var alert = '';

            if (data[0].error === false){
                $('#profil-edit').html(data[0].data);
                alert = 'success';
            }else{
                alert = 'danger';
            }
            if (alert && data[0].message){
                $('body').append(displayAlert(data[0].message, alert));
            }*/
        },'json');

        return false;
    })
})(jQuery)