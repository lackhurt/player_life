define(['avalon', 'text!./page_bar.html'], function(avalon, tpl) {
    var widget = avalon.ui.pageBar = function(element, data, vmodels) {

        var options = data.pageBarOptions;

        var model = avalon.define('pageBar', function(vm) {
            avalon.mix(vm, {
                start: 0,
                limit: 5,
                total: 10,
                pages: [],
                maxPagesForView: 6,
                current: 1,
                setPage: function(pageNumber) {
                    if (pageNumber >= 1 && Math.ceil(pageNumber <= vm.total / vm.limit)) {

                        vm.start = (pageNumber - 1) * vm.limit;
                    }
                }
            });

            vm.$init = function() {
                element.innerHTML = tpl;
                avalon.scan(element, model);

                vm.$watch('total', processPages);
                vm.$watch('start', processPages);
                vm.$watch('limit', processPages);

                vm.total = options.total;
                vm.start = options.start;
                vm.limit = options.limit;

                function processPages() {
                    var pagesLength = Math.ceil(vm.total / vm.limit);

                    vm.current = Math.ceil((vm.start + 1) / vm.limit);

                    var pages = {};


                    $.each([1, 2, vm.current - 1, vm.current, vm.current + 1, pagesLength - 1, pagesLength], function(index, value) {
                        if (value >= 1 && value <= pagesLength) {
                            pages[value] = value;
                        }
                    });

                    $.each(pages, function(key, value) {
                        if (!pages[key - 1]) {
                            pages[key - 1] = 'sp';
                        }
                    });

                    vm.pages = [];
                    $.each(pages, function(key, value) {

                        if (Number(key) > 0) {
                            vm.pages.push(value);
                        }
                    });

                }
            };

        });

        return model;
    };

    widget.defauls = {
        limit: 5,
        start: 0
    };

    return avalon;
});