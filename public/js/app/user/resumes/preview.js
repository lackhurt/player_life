define(['avalon', 'bootstrap-dialog-zh'], function(avalon, dialog) {
    var previewResume;
    previewResume = avalon.define({
        $id: 'previewResume',
        formData: JSON.parse(window.localStorage.getItem('previewResume')),


        saveResume: function() {
            var url = '/user/resumes/create';
            var request = $.restPost(url, previewResume.formData.$model);
            request.done(function (data) {
                location = '/user/resumes/manage';
            });
        }
    });


    avalon.scan();


})