define(['app/common/avalon_widget/game_picker', 'bootstrap-dialog-zh'], function(avalon, dialog) {


    function initCareerModel(data) {
        console.log(data);
        var career = avalon.define({
            $id: 'career',
            formData: {
                achievement: data.achievement,
                skilled: data.skilled,
                years: data.years
            }
        });

        avalon.scan(document.body);

        return career;
    }

    function initPlayedGamesModel(data) {
        function removeGame(game, model) {
            model.games = $.grep(model.games, function(g) {
                return g !== game;
            });
        }

        function addGame(game, model) {

            if (!$.grep(model.$model.games, function(g) {
                    return game.name === g.name;
                }).length) {
                model.games.push({
                    name: game.name,
                    experience: ''
                });
            }
        }

        var playedGames = avalon.define({
            $id: "playedGames",
            games: [],
            removeGame: function(game) {
                removeGame(game, playedGames);
            },
            playBest: ''
        });

        playedGames.games = data.played_games;
        playedGames.playBest = data.play_best;

        avalon.vmodels.playedGamesGamePicker.$watch('currentSelectedGame', function() {
            addGame(avalon.vmodels.playedGamesGamePicker.$model.currentSelectedGame, playedGames);
        });

        avalon.scan(document.body);

        return playedGames;
    }

    var career, playedGames;
    function initCareerForm(data) {
        career = initCareerModel(data);
        playedGames = initPlayedGamesModel(data);
    }



    $('#submitCareer').on('click', function(e) {
        e.preventDefault();

        var request = $.restPost('/user/info/career', {
            played_games: $.map(playedGames.games.$model, function(game) {
                return {
                    name: game.name,
                    experience: game.experience
                }
            }),
            play_best: playedGames.playBest,
            achievement: career.formData.$model.achievement,
            skilled: career.formData.$model.skilled,
            years: career.formData.$model.years
        });
        request.done(function() {
            dialog.success('保存完毕');
        });

        request.fail(function(msg) {
            dialog.alert(msg || '保存失败');
        });
    });

    return {
        initCareerForm: initCareerForm
    };
});