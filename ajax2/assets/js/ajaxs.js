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
    if (!checkValidateForm()) {
        return false;
    }
    loadAjax();
    return false;
}

function checkValidateForm() {
    var number = $('input[name = number]').val();
    var arrNumber = number.split(',');
    var lengthArr = arrNumber.length;
    var i = 0;
    for (i = 0; i < lengthArr; i++) {
        if (isNaN(arrNumber[i])) {
            $('span').eq(0).text('')
            $('input[name = tich]').val('');
            $('input[name = tong]').val('');
            $('input[name = number]').after('<span>Nội dung không hợp lệ</span>')
            return false;
        }
    }
    $('span').eq(0).text('')
    return true;
}
