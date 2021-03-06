define(['bootstrap-dialog-zh'], function(dialog) {
    $(document).on('click', '.js_remove_admin', function() {
        removeAdmin($(this).attr('data-corp-id'), $(this).attr('data-member-id'));
    });

    $(document).on('click', '.js_remove_member', function() {
        removeMember($(this).attr('data-corp-id'), $(this).attr('data-member-id'));
    });

    $(document).on('click', '.js_add_admin', function() {
        addAdmin($(this).attr('data-corp-id'), $(this).attr('data-member-id'));
    });


    function removeAdmin(corpId, userId) {
        var request = $.restPost('/corp/manage/remove-admin', {
            id: corpId,
            userId: userId
        });
        request.done(function() {
            locate.reload();
        });
        request.fail(function(msg) {
            dialog.alert(msg);
        });
    }

    function addAdmin(corpId, userId) {
        $.restPost('/corp/manage/add-admin', {
            id: corpId,
            userId: userId
        });
        request.done(function() {
            locate.reload();
        });
    }

    function removeMember(corpId, userId) {
        $.restPost('/corp/manage/remove-member', {
            id: corpId,
            userId: userId
        });
        request.done(function() {
            locate.reload();
        });
    }
});