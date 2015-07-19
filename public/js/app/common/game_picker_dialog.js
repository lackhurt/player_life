define(['./avalon_widget/game_picker', 'bootstrap-dialog-zh'], function(avalon, dialog) {

    var gamePickerUnionIndex = 0, win, deferred;
    function pickAGame() {
        deferred = $.Deferred();

        var gamePickerWidgetId = 'gamePicker' + gamePickerUnionIndex++;

        if (!win) {
            win = dialog.show({
                title: '选择游戏',
                message: '<div ms-controller="gamePickerDialog" ms-widget="gamePicker, ' + gamePickerWidgetId + '"></div>',
                onshow: function() {
                    setTimeout(function() {
                        avalon.define({
                            $id: 'gamePickerDialog'
                        });
                        avalon.scan(win.getModalBody().get(0));


                        avalon.vmodels[gamePickerWidgetId].$watch('currentSelectedGame', function() {
                            deferred.resolve(avalon.vmodels[gamePickerWidgetId].$model.currentSelectedGame);
                            win.close();
                        });
                    }, 500);
                },
                onhide: function() {
                    deferred.reject();
                }
            });
        } else {
            win.open();
        }


        return deferred;
    }

    return {
        pickAGame: pickAGame
    }
});