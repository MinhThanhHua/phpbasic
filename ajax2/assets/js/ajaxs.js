function loadAjax() {
    $.ajax({
       // contentType : 'application/json',
        url: "server.php",
        type: "post",
        dataType: 'json',
        data: {
            number: $('input[name="number"]').val()
        },
        success: function (result) {
           $('input[name=tong]').val('Tổng: ' + result[0])
           $('input[name=tich]').val('Tích:  ' + result[1])
        }
    })
}

//chạy file ajax và trả về kết quả
function showResult() {
    loadAjax();
    return false;
}
