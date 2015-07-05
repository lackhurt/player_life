define(['avalon'], function() {
    var resumes = avalon.define({
        $id: 'resumes',

        test: 'dd',

        list: [],



        avalonAlert: function(e) {

            submit();
        }



    });
    avalon.scan(document.body);
    resumes.list = [{test: 111, name: 'wali'}, {test: 222, name: 'lily'}];


    function submit() {
        var data = $('form').serialize();
        var request = $.restPost('/user/resumes/create', data);

        request.done(function(data) {
            console.log(data);
        });

        request.fail(function(msg) {
            console.log(msg);
        });
    }
});
