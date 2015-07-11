define(['avalon'], function(avalon) {
    var gamePicker = avalon.define({
        $id: "gamePicker",
        allGames: [],
        tpl: '/js/app/common/game_picker.html',
        indexedGames: {},
        group: {},
        query: ''
    });

    avalon.scan(document.body);

    var LETTERS = 'A,B,C;D,E,F;G,H,I,J;K,L,M;N,O,P,Q;R,S;T,W;X,Y,Z';

    var request = $.restGet('/common/game-picker/fetch-all-games');

    var allGames = [];

    request.done(function(data) {
        allGames = data;
        gamePicker.allGames = data;
    });


    gamePicker.$watch('allGames', function(newValue) {
        gamePicker.indexedGames = indexGames(gamePicker.allGames);

    });

    gamePicker.$watch('indexedGames', function(newValue) {
        gamePicker.group = groupByFirstLetter(gamePicker.indexedGames);
    });

    gamePicker.$watch('query', function() {
        gamePicker.allGames = query(gamePicker.query, allGames);
    });


    function query(queryStr, allGames) {
        if (!queryStr) {
            return allGames;
        }
        return $.grep(allGames, function(game) {
            return game.name.indexOf(queryStr) >= 0 || game.letter.indexOf(queryStr) >= 0;
        });
    }


    function indexGames(allGames) {
        var indexedGame = {};

        $.each(LETTERS.split(/[,;]/), function(index, letter) {
            indexedGame[letter] = [];
        });

        $.each(allGames || [], function(index, game) {
            game.letter = game.letter || '';

            var letterIndex = game.letter.charAt(0).toUpperCase();

            if ($.inArray(letterIndex, LETTERS.split(/[,;]/)) >= 0) {
                indexedGame[letterIndex].push(game);
            }
        });

        return indexedGame;
    }


    function groupByFirstLetter(indexedGames) {

        var groupGames = {};

        $.each(LETTERS.split(';'), function(index, group) {
            groupGames[group.replace(/,/g, '')] = groupGames[group.replace(/,/g, '')] || {
                count: 0,
                letterIndex: {}
            };
            $.each(group.split(','), function(index, letter) {

                groupGames[group.replace(/,/g, '')]['letterIndex'][letter] = indexedGames[letter];
                groupGames[group.replace(/,/g, '')]['count'] += indexedGames[letter].length;
            });
        });
        return groupGames;
    }

});