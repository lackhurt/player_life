/**
 * Created by Administrator on 2015/7/4 0004.
 */
define(['react', 'app/common/avalon_widget/district','bootstrap-dialog-zh','avalon'],function( React, district, dialog){
    var pageCtrl = avalon.define({
        $id:'pageCtrl',
        isFormShow:true,
        saveClick:function(){
            putDistrictInfoIntoForm();
            var data = getFormData(formCtrl);
            delete data.roleCheckBoxList;
            saveInfo(data);
        },
        releaseClick:function(){

        }
    })
    var recruitListCtrl = avalon.define({
        $id:'recruitListCtrl',
        list:[],
        edit:function(index){
            setFormData(formCtrl,inrecruitListCtrl.list[dex]);
            avalon.vmodels.district_1.setDistrict(formCtrl.province_id, formCtrl.city_id);
            pageCtrl.isFormShow = true;
        },
        del:function(recruitId , remove){

            dialog.confirm('确认删除招募？',function(result){
                if(result){
                    deleteRecruit(recruitId)
                    remove()
                }
            })
        },
        add:function(){
            avalon.log('do add')
            setFormData(formCtrl,defaultFormData);
            avalon.vmodels.district_1.setDistrict(formCtrl.province_id, formCtrl.city_id);
            pageCtrl.isFormShow = true;
        },
        toggle:function(recruitId){

        }
    })

    var districtCtrl = avalon.define({
        $id:'districtCtrl',
        $opt:{
            province_id:'-1',
            city_id:'-1',
        }

    })

    var formCtrl = avalon.define({
        $id:'formCtrl',
        roleCheckBoxList:[],
        corpId:'',
        recruitId:'',
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
        province_id:'-1',
        city_id:'-1',
        province_name:'',
        city_name:''
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
        recruitId:false,
        is_show:'on',
        other_role_tag:'',
        role_checked_list:[],
        point_min:0,
        point_max:0,
        play_time:'上半夜',
        sex:'other',
        info:'',
        province_id:'-1',
        city_id:'-1'
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

    function deleteRecruit(recruitId){
        var data = {corpId:formCtrl.corpId,recruitId:recruitId};
        var request = $.restPost('/corp/recruit/delete-recruit',data);
        request.done(function(data){
            avalon.log(data);
        })
    }

    function putDistrictInfoIntoForm(){
        var districtInfo = avalon.vmodels.district_1.getDistrictInfo();
        formCtrl.province_id = districtInfo.province_id;
        formCtrl.province_name = districtInfo.province_name;
        formCtrl.city_id = districtInfo.city_id;
        formCtrl.city_name = districtInfo.city_name;
    }

    avalon.scan(document.body);

    return {
        setCorpId:function(corpId){
            formCtrl.corpId = corpId;
        },
        init:function(){
            getRecruitList();
        }
    }
})