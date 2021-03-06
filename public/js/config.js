requirejs.config({
    baseUrl: '/js/',
    deps: ['rest', 'bootstrap'],
    map: {
        '*': {
            css: '/js/lib/requirejs/plugins/require-css/0.1.8/css.js',
            jsx: "lib/requirejs/plugins/require-jsx/jsx"
        }
    },
    paths: {
        JSXTransformer: 'lib/react/0.13.3/JSXTransformer',
        avalon: 'lib/avalon/1.44/avalon.shim',
        text: 'lib/requirejs/plugins/require-text/2.0.12/text',
        domReady: 'lib/requirejs/plugins/domReady/2.0.1/domReady',
        jquery: 'lib/jquery/2.1.3/jquery',
        bootstrap: 'lib/bootstrap/3.3.4/bootstrap',
        'bootstrap-datetimepicker': 'lib/bootstrap/plugins/datetimepicker/bootstrap-datetimepicker.min',
        'bootstrap-datetimepicker-cn': 'lib/bootstrap/plugins/datetimepicker/bootstrap-datetimepicker.zh-CN',
        'bootstrap-switch': 'lib/bootstrap/plugins/switch/bootstrap-switch',
        'bootstrap-dialog-zh': 'lib/bootstrap/plugins/dialog/i18n_zh',
        'bootstrap-dialog': 'lib/bootstrap/plugins/dialog/bootstrap-dialog',
        plupload: 'lib/plupload/2.1.4/plupload.full.min',
        react: 'lib/react/0.13.3/react',
        rest: 'lib/rest/rest',
        angular: 'lib/angular/1.4.1/angular'
    },
    shim: {
        'bootstrap-datetimepicker': {
            deps: ['jquery', 'bootstrap', 'css!/style/lib/bootstrap/bootstrap-datetimepicker.min.css'],
            exports: '$'
        },
        'bootstrap-datetimepicker-cn': {
            deps: ['bootstrap-datetimepicker'],
            exports: '$'
        },
        'bootstrap-switch':{
            deps:['jquery','css!/style/lib/bootstrap/bootstrap-switch.css'],
            exports:'$'
        },
        'bootstrap': {
            deps: ['jquery', 'css!/style/lib/bootstrap/bootstrap.css'],
            exports: 'bootstrap'
        },
        'avalon':{
            exports: 'avalon'
        },
        'domReady':{
            exports: 'domReady'
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
        },
        rest: {
            exports: '$'
        },
        angular: {
            exports: 'angular'
        }
    }
});
require(['avalon'],function(){
    avalon.config({
        interpolate:["{%","%}"]
    })
});