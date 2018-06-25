function runAjax(){
    var fileData = $('input[name=file]').prop('files')[0];
    var type = fileData.type;
    var formData = new FormData();
    formData.append('file',fileData);
    $.ajax({
        url: 'serverUpload.php',
        type: 'post',
        dataType: 'text',
        processData: false,
        contentType: false,
        data: formData,
        xhr: function(){
             var xhr = $.ajaxSettings.xhr() ;
             xhr.upload.onprogress = function(data){
                var perc = Math.round((data.loaded / data.total) * 100);
                $('.bar').text(perc + '%');
                $('.bar').css('width',perc + '%');
             };
             return xhr ;
        },
        success: function(result) {
            $('.message').text(result);
        }
    })
    return false;
}
