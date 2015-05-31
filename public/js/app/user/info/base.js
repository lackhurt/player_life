define(['bootstrap.datetimepicker.cn', 'react', 'jsx!app/common/district.jsx'], function($, React, District) {

    $('.form_date').datetimepicker({
        language:  'zh-CN',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });

    District.renderTo('#bornDisctrict', 'birthplace');
    District.renderTo('#location', 'location');
});