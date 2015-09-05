define(['bootstrap', 'text!./list_send_resume.html', 'bootstrap-dialog-zh'], function(bootstrap, sendResumeTpl, dialog) {

    $(document).on('click', '.js_send_resume',function() {

        var corpId = $(this).attr('data-corp-id');
        var recruitId = $(this).attr('data-recruit-id');

        var game = $(this).attr('data-game');

        var request = $.restGet('/user/resumes/resume-list', {
            game: game
        });

        var win = dialog.show({
            title: '投递简历',
            message: '',
            buttons: [{
                label: '确认投递',
                cssClass: 'btn-primary',
                action: function(win) {
                    $.restPost('/user/resumes/deliver', {
                        corpId: corpId,
                        recruitId: recruitId,
                        game: game
                    }).done(function() {
                        dialog.alert('简历已投递');
                    }).fail(function(msg) {
                        dialog.alert(msg || '投递失败');
                    });
                    win.close();
                }
            }, {
                label: '取消',
                action: function(win) {
                    win.close();
                }
            }]
        });

        request.done(function(data) {
            if (data) {
                win.setMessage('简历: <a href="/user/resumes/manage">' + data.title + '</a>');
            }
        });

    });

});