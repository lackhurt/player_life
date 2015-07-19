define(['avalon', 'text!./game_picker.html'], function(avalon, tpl) {

    // 用于生成tab的唯一前缀
    var unionTabId = 0;

    avalon.ui.gamePicker = function(element, data, vmodels) {

        var options = {};

        var model = avalon.define('game_picker', function(vm) {
            avalon.mix(vm, {
                allGames: [],
                indexedGames: {},
                group: {},
                query: '',
                select: function() {},
                selectedGames: [],
                currentSelectedGame: {},
                unionTabId: ''
            });

            var LETTERS = 'A,B,C;D,E,F;G,H,I,J;K,L,M;N,O,P,Q;R,S;T,W;X,Y,Z';

            var request = $.restGet('/common/game-picker/fetch-all-games');



            var allGames = [];
            vm.$init = function() {
                vm.unionTabId = 'tabId' + unionTabId++;
                element.innerHTML = tpl;

                request.done(function(data) {
                    allGames = data;
                    vm.allGames = data;
                });

                avalon.scan(element, model);

            };

            vm.$watch('allGames', function(newValue) {
                vm.indexedGames = indexGames(vm.allGames);

            });

            vm.$watch('indexedGames', function(newValue) {
                vm.group = groupByFirstLetter(vm.indexedGames);
            });

            vm.$watch('query', function() {
                vm.allGames = query(vm.query, allGames);
            });

            vm.select = function(game) {
                if ($.inArray(game, vm.selectedGames) < 0) {
                    vm.selectedGames.push(game);
                }

                vm.currentSelectedGame = game;
            };


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

        return model;
    };

    return avalon;
});