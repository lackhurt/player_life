define(['plupload'], function(plupload) {

    function processUploadBadge(token) {
        var uploader = new plupload.Uploader({
            runtimes : 'html5,flash,silverlight,html4',
            browse_button : 'pickfiles', // you can pass in id...
            container: $('#container').get(0), // ... or DOM Element itself
            max_file_size : '10mb',
            multipart_params: {
                upload_token: token
            },
            url: "/corp/create/upload-badge",

            //flash_swf_url : 'http://rawgithub.com/moxiecode/moxie/master/bin/flash/Moxie.cdn.swf',
            //silverlight_xap_url : 'http://rawgithub.com/moxiecode/moxie/master/bin/silverlight/Moxie.cdn.xap',
            filters : [
                {title : "Image files", extensions : "jpg,gif,png"}
            ],

            init: {
                PostInit: function() {
                },

                FilesAdded: function(up, files) {
                    plupload.each(files, function(file) {
                        $('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
                    });
                    uploader.start();
                    $('#badge').val('');
                },

                UploadProgress: function(up, file) {
                    //$(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
                },

                Error: function(up, err) {
                    $('console').innerHTML += "\nError #" + err.code + ": " + err.message;
                },
                FileUploaded: function(up, file, response) {
                    var data = $.parseJSON(response.response);

                    if (data.code === 4095) {
                        $('#badgePreview').attr('src', data.data.path);
                        $('#badge').val(data.data.path);
                    }
                }
            }
        });

        uploader.init();
    }


    return {
        processUploadBadge: processUploadBadge
    };
});