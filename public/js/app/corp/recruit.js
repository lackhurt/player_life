/**
 * Created by Administrator on 2015/7/4 0004.
 */
define(['react', 'jsx!app/common/district.jsx','avalon'],function( React, District){
    var pageCtrl = avalon.define({
        $id:'pageCtrl',
        saveClick:function(){
            var data = getFormData(formCtrl);
            delete data.roleCheckBoxList;
            delete data.isFormShow;
            saveInfo(data);
        },
        releaseClick:function(){

        }
    })
    var recruitListCtrl = avalon.define({
        $id:'recruitListCtrl',
        list:[],
        edit:function(index){
            setFormData(formCtrl,recruitListCtrl.list[index]);
            formCtrl.isFormShow = true;
        },
        del:function(index){
            deleteRecruit(index)
        },
        add:function(){
            setFormData(formCtrl,defaultFormData);
            formCtrl.isFormShow = true;
        }
    })
    var formCtrl = avalon.define({
        $id:'formCtrl',
        roleCheckBoxList:[],
        corpId:'',
        recruitIndex:'',
        tag:'',
        title:'',
        is_show:'on',
        other_role_tag:'',
        role_checked_list:[],
        point_min:0,
        point_max:0,
        play_time:'上半夜',
        sex:'other',
        info:'',
        isFormShow:false
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

    var defaultFormData = {
        tag:'',
        title:'',
        recruitIndex:false,
        is_show:'on',
        other_role_tag:'',
        role_checked_list:[],
        point_min:0,
        point_max:0,
        play_time:'上半夜',
        sex:'other',
        info:'',
    }

    formCtrl.roleCheckBoxList = roleCheckBoxList;

    function setFormData(vm,data){
        var model = vm.$model;
        $.each(data,function(key,val){
            if(!(typeof(model[key]) == "undefined")){
                formCtrl[key] = val;
            }
        })
    }
    function getFormData(vm){
        var model = vm.$model;
        var result = JSON.stringify(model);
        return JSON.parse(result);
    }
    function getRecruitList(){
        avalon.log('getRecruitList is going')
        var request = $.restPost('/corp/recruit/recruit-list',{corpId:formCtrl.corpId});
        request.done(function(data){
            avalon.log(data);
            recruitListCtrl.list = data;
            avalon.log('getRecruitList is done')
        })
    }

    function saveInfo(data){
        var request = $.restPost('/corp/recruit/create-recruit',data)
        request.done(function(response){
            getRecruitList();
        })
    }

    function deleteRecruit(index){
        console.log(index)
        var data = {corpId:formCtrl.corpId,recruitIndex:index};
        var request = $.restPost('/corp/recruit/delete-recruit',data);
        request.done(function(data){
            avalon.log(data);
        })
    }

    avalon.scan(document.body);
    District.renderTo('#location', 'location');

    return {
        setCorpId:function(corpId){
            formCtrl.corpId = corpId;
        },
        init:function(){
            getRecruitList();
        }
    }
})