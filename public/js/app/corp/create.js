define(['plupload', 'app/common/game_picker_dialog'], function(plupload, gamePickerDialog) {
    $('#primaryGame').click(function() {
        gamePickerDialog.pickAGame().done(function(game) {
            $('#primaryGame').val(game.name);
        });
    });
});