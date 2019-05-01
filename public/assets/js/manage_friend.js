(function ($) {
    /* Gestion amis */

    $('.amis').click(function (e) {

        e.preventDefault();

        var id_other_user = $(this).attr('data-content');
        var action = $(this).attr('data-status');

        $.post("../../inc/traitement/profil/manage_amis.php", {
            id_other_user: `${id_other_user}`,
            action: `${action}`,
            manage_amis: true
        }, function (data) {
            if (data[0].data) {
                $('#amis').html(data[0].data)
            }
            if (data[0].script) {
                $('.script_manage_friend').html(data[0].script)
            }
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

    })
})(jQuery)