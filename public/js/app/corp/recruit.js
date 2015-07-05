/**
 * Created by Administrator on 2015/7/4 0004.
 */
define(['react', 'jsx!app/common/district.jsx','avalon'],function( React, District){
    var formCtrl = avalon.define({
        $id:'formCtrl',
        roleCheckBoxList:[],
        roleCheckedList:[],
        roleClick:function(e){

        },
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



    formCtrl.roleCheckBoxList = roleCheckBoxList;
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