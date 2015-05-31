requirejs.config({
    baseUrl: '/js/',
    map: {
        '*': {
            'css': '/js/lib/requirejs/plugins/require-css/0.1.8/css.js'
        }
    },
    paths: {
        jsx: "lib/requirejs/plugins/require-jsx/jsx",
        JSXTransformer: 'lib/react/0.13.3/JSXTransformer',
        avalon: 'lib/avalon/1.44/avalon',
        jquery: 'lib/jquery/2.1.3/jquery',
        bootstrap: 'lib/bootstrap/3.3.4/bootstrap',
        'bootstrap.datetimepicker': 'lib/bootstrap/plugins/datetimepicker/bootstrap-datetimepicker.min',
        'bootstrap.datetimepicker.cn': 'lib/bootstrap/plugins/datetimepicker/bootstrap-datetimepicker.zh-CN',
        plupload: 'lib/plupload/2.1.4/plupload.full.min',
        react: 'lib/react/0.13.3/react'
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
        },
        'avalon':{
            exports: 'avalon'
        },
        'plupload': {
            exports: 'plupload'
        },
        JSXTransformer: {
            exports: "JSXTransformer"
        },
        'react': {
            //deps: ['lib/react/0.13.3/JSXTransformer'],
            exports: 'React'
        }
    }
});