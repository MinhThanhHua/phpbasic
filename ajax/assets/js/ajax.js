//sử dụng ajax
function loadAjax() {
    $.ajax({
        url: "server.php",
        type: "post",
        dataType: 'text',
        data: {
            name: $('input[name = "name"]').val(),
            age: $('input[name = "age"]').val(),
            address: $('input[name="address"]').val(),
            birthday: $('input[name="birthday"]').val()
        },
        success: function ($result) {
            $('.show').text($result);
            alert('ok')
        }
    })
}

//chạy file ajax và trả về false
function showInfo() {
    loadAjax();
    return false;
}
