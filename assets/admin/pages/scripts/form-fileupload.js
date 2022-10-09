var FormFileUpload = function () {
    return {
        //main function to initiate the module
        init: function () {

             // Initialize the jQuery File Upload widget:
            $('#fileupload').fileupload({
                disableImageResize: false,
                autoUpload: false,
               // disableImageResize: /Android(?!.*Chrome)|Opera/.test(window.navigator.userAgent),
                //maxFileSize: 1750*375,
                acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
                // Uncomment the following to send cross-domain cookies:
                //xhrFields: {withCredentials: true},                
            }).bind('fileuploadadd', function (e, data) {
                console.log('fileuploadadd');
            }).bind('fileuploadprogress', function (e, data) {
                console.log('fileuploadprogress');
            }).bind('fileuploadstart', function (e) {
                console.log('fileuploadstart');
            }).bind('fileuploaddone', function (e,data) {
                console.log('done')
            }).on('fileuploadprocessfail', function (e, data) {console.log('failed')});


 

            // Enable iframe cross-domain access via redirect option:
            $('#fileupload').fileupload(
                'option',
                'redirect',
                window.location.href.replace(
                    /\/[^\/]*$/,
                    '/cors/result.html?%s'
                )
            );

            // Upload server status check for browsers with CORS support:
            if ($.support.cors) {
                $.ajax({
                    type: 'HEAD'
                }).fail(function () {
                    $('<div class="alert alert-danger"/>')
                        .text('Upload server currently unavailable - ' +
                                new Date())
                        .appendTo('#fileupload');
                }).done(function(){
                   
                });
            }

            // Load & display existing files:
            $('#fileupload').addClass('fileupload-processing');
            $.ajax({
                // Uncomment the following to send cross-domain cookies:
                //xhrFields: {withCredentials: true},
                url: $('#fileupload').attr("action"),
                dataType: 'json',
                context: $('#fileupload')[0]
            }).always(function () {
                $(this).removeClass('fileupload-processing');
            }).done(function (result) {
                 console.log('hiii');
//                $(this).fileupload('option', 'done')
//                .call(this, $.Event('done'), {
//                    result: result});
            });
        }

    };

}();

jQuery(document).ready(function() {
    FormFileUpload.init();
});