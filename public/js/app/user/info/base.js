define(['bootstrap.datetimepicker.cn'], function($) {



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
    window.locationAddress = avalon.define({
        $id:'locationAddress',
        province:[],
        city:[],
        proChange:function(id){
            $.post('/common/district/list-by-parent-id',{parentId:id},function(response){
                locationAddress.city = response;
            },'json');
        }
    });

    setTimeout(function() {
        $.post('/common/district/list-by-parent-id',{parentId:0},function(response){
            console.log('list-by-parent-id:%o',response);
            locationAddress.province = response;
        },'json');
    }, 2000);





});