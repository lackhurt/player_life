/**
 * Created by Administrator on 2015/7/4 0004.
 */
define(['react', 'jsx!app/common/district.jsx','avalon'],function( React, District){
    var recruitListCtrl = avalon.define({
        $id:'recruitListCtrl',
        list:[],
        edit:function(){

        },
        del:function(){
            deleteRecruit
        }
    })
    var formCtrl = avalon.define({
        $id:'formCtrl',
        roleCheckBoxList:[],
        corpId:'55a238ed58bc734b448b4567',
        form_data:{},
        saveClick:function(){
            var data = getFormData();
            saveInfo(data);
        },
        releaseClick:function(){

        }
    });
    var roleCheckBoxList = [
        {name:'核心'},
        {name:'中单'},
        {name:'劣单'},
        {name:'辅助'},
        {name:'打野'},
        {name:'经理'},
        {name:'领队'},
    ];

    var form_data = {
        tag:'天天向上',
        title:'招募强力中单',
        is_show:'on',
        other_role_tag:'中华好队友',
        role_checked_list:['核心','其他'],
        point:{min:1000,max:1300},
        play_time:'上半夜',
        sex:'other',
        info:'',
    }

    formCtrl.roleCheckBoxList = roleCheckBoxList;
    formCtrl.form_data = form_data;

    console.log(formCtrl.form_data.$model);

    var request = $.restPost('/corp/recruit/recruit-list',{corpId:formCtrl.corpId});
    request.done(function(data){
        avalon.log(data);
        recruitListCtrl.list = data;
    })
    function saveInfo(data){
        var request = $.restPost('/corp/recruit/create-recruit',data)
        request.done(function(response){

        })
    }
    function getFormData(){
        var formData = formCtrl.form_data.$model;
        formData.corpId = formCtrl.corpId;
        return formCtrl.form_data.$model;
    }
    avalon.scan(document.body);
    District.renderTo('#location', 'location');
})