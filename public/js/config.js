requirejs.config({
    baseUrl: '/js/',
    map: {
        '*': {
            'css': '/js/lib/requirejs/plugins/require-css/0.1.8/css.js'
        }
    },
    paths: {
        jquery: 'lib/jquery/2.1.3/jquery',
        bootstrap: 'lib/bootstrap/bootstrap',
        'bootstrap.datetimepicker': 'lib/bootstrap/datetimepicker/bootstrap-datetimepicker.min',
        'bootstrap.datetimepicker.cn': 'lib/bootstrap/datetimepicker/bootstrap-datetimepicker.zh-CN'
    },
    shim: {
        'bootstrap.datetimepicker': {
            deps: ['jquery', 'bootstrap', 'css!/style/lib/bootstrap/bootstrap-datetimepicker.min.css'],
            exports: '$'
        },
        'bootstrap.datetimepicker.cn': {
            deps: ['bootstrap.datetimepicker'],
            exports: '$'
        },
        'bootstrap': {
            deps: ['jquery', 'css!/style/lib/bootstrap/bootstrap.css'],
            exports: 'bootstrap'
        }
    }
});