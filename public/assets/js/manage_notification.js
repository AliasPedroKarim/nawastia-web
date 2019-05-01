(function ($) {
    /* Gestion amis */

    $('.notification').click(function (e) {

        e.preventDefault();

        var id_status_notification = $(this).attr('data-status');
        var id_notification = $(this).attr('data-content');

        console.log(atob(id_status_notification));

        if (atob(id_status_notification) != 1){
            return false;
        }

        $.post("../../inc/traitement/profil/manage_notification.php", {
            id_notification: `${id_notification}`,
            id_status_notification: `${id_status_notification}`,
            manage_notification: true
        }, function (data) {
            if (data[0].data) {
                $('#notification').html(data[0].data)
            }
            if (data[0].data2) {
                $('.notification-icon').html(data[0].data2)
            }
            if (data[0].script) {
                $('.script_manage_notification').html(data[0].script)
            }
        },'json');
        return false;

    })
})(jQuery)