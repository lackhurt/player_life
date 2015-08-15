var index = 0;
define(['avalon', 'bootstrap-dialog-zh', 'app/common/game_picker_dialog'], function(avalon, dialog, gamePickerDialog) {
    var resumesCtrl = avalon.define({
        $id: 'resumesCtrl',
        page: 1,
        pageNum: 3,
        pageCount: 0,
        listCount: 0,
        list: [],
        resumeList : {},
        title: '',
        formData: {
            'game': '',
            'title': '',
            'platform': '',
            'network_provider': '',
            'adept_hero': '',
            'speciality': '',
            'integral': '',
            'skill_level': '',
            'game_time': '',
            'apply_introduction': '',
            'game_experience': '',
            'resume_status': '',
            'privacy_setting': ''
        },


        resumesSubmit: function() {
            submit();
        },

        resumesList: function() {

            getResumeList(1, 6);

        },

        updateResume: function(name) {
            window.location="#resume-head";
            var request = $.restPost('/user/resumes/update', {game: name});
            request.done(function(data) {
                setFormData(formCtrl, data[0]);
                location='#';
            });
        },
        
        modifyResumeStatus: function (name, status) {
            var request = $.restPost('/user/resumes/modify-status', {game: name, resume_status: status});
            request.done(function(data) {


            });
        },

        deleteResume: function(game) {
            dialog.confirm({
                title: '温馨提示',
                message: '确认要删除' + game + '的简历么',
                callback: function(result) {
                    if(result) {
                        var request = $.restPost('/user/resumes/delete-resume', {game: game});

                        request.done(function(data) {
                            getResumeList();
                            location='#';
                        })

                    } else {

                    }}
            });
        },

        getIndex: function() {
            if(index < resumesCtrl.listCount) {
                return index ++;
            } else {
                return index;
            }
        },
    });


    var formCtrl = avalon.define({
        $id: 'formCtrl',
        'game': '',
        'title': '',
        'platform': '',
        'network_provider': '',
        'adept_hero': '',
        'speciality': '',
        'integral': '',
        'skill_level': '',
        'game_time': '',
        'apply_introduction': '',
        'game_experience': '',
        'resume_status': '',
        'privacy_setting': ''
    });

    avalon.scan(document.body);
    resumesCtrl.list = [
        {test: 1, name: '1年'},
        {test: 2, name: '2年'},
        {test: 3, name: '3年'},
        {test: 4, name: '4年'},
        {test: 5, name: '5年'},
        {test: 6, name: '6年'},
        {test: 7, name: '7年'},
        {test: '7 more', name: '7年以上'}
    ];

    function submit() {

        var data = getFormData(formCtrl);
        var request = $.restPost('/user/resumes/create', data);

        request.done(function(data) {
            getResumeList();
            location='#';
        });

        request.fail(function(msg) {
            console.log(msg);
        });
    }

    $('#game').click(function() {
        gamePickerDialog.pickAGame().done(function(game) {
            $('#game').val(game.name);
        });
    });

    function getResumeList() {
        var list = '';
        var request = $.restPost('/user/resumes/get-resume-list', {

        });
        request.done(function(data) {
            resumesCtrl.resumeList = data;
            resumesCtrl.listCount = data.length;
            resumesCtrl.pageCount = Math.ceil(resumesCtrl.listCount / resumesCtrl.pageNum);
        });

        request.fail(function(data) {

        });
    }

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


    getResumeList();
});