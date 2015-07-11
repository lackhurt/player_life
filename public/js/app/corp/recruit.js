/**
 * Created by Administrator on 2015/7/4 0004.
 */
define(['react', 'jsx!app/common/district.jsx','avalon'],function( React, District){
    var RecruitListCtrl = avalon.define({
        $id:'RecruitListCtrl',

    })
    var formCtrl = avalon.define({
        $id:'formCtrl',
        roleCheckBoxList:[],
        form_data:{},
        saveClick:function(){

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

    $.post('/corp/recruit/recruit-list',function(response){

        avalon.log('list:%o' ,
        response);

    });
    function saveInfo(){

    }
    function getFormData(){

        return {};
    }
    avalon.scan(document.body);
    District.renderTo('#location', 'location');
})