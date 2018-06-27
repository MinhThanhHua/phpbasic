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
           
        }
    })
}

//chạy file ajax và trả về false
function showInfo() {
    if(!checkValidateForm()) {
        return false;
    }
    loadAjax();
    return false;
}


function checkValidateForm(){
    var name = $('input[name = name]').val();
    if (name.length < 3 || name.length > 50) {
        $('span').eq(0).text('');
        $('input[name = name]').after('<span>Tên từ 3 đến 50 ký tự</span>');
        return false;
    } 
    $('span').eq(0).text('');

    var address = $('input[name = address]').val();
    if (address.length < 3 || address.length > 50) {
        $('span').eq(1).text('');
        $('input[name = address]').after('<span>Địa chỉ từ 10 đến 150 ký tự</span>');
        return false;
    } 
    $('span').eq(1).text('');

    var age = $('input[name = age]').val();
    if (isNaN(age) || age === '' || age < 1) {
        $('span').eq(2).text('');
        $('input[name = age]').after('<span>Chỉ nhập số</span>');
        return false;
    } 
    $('span').eq(2).text('');

    
    if (checkBirthday()) {
        $('span').eq(3).text('');
        $('input[name = birthday]').after('<span>Ngày sinh không hợp lệ</span>');
        return false;
    } 
    $('span').eq(3).text('');
    return true;
}

//hàm kiểm tra ngày thang, sai ngày trả về true, ngược lại false
function checkBirthday() {
    var birthday = $('input[name = birthday]').val();
    if (birthday.length < 8){
        return 1;
    } else{
        let arrBirthday = birthday.split('/');
        if (arrBirthday.length != 3){
            return 1;
        }
        let date = new Date();
        let timeNow = date.getTime();
        let month = arrBirthday[1];
        if (isNaN(arrBirthday[2]) || isNaN(arrBirthday[1]) || isNaN(arrBirthday[0])){
            return 1;
        }
        if (arrBirthday[2] < 1900 || arrBirthday[2] > 2048){
            return 1;
        }
        if (arrBirthday[1] < 1 || arrBirthday[1] >12){
            return 1;
        }
        if (month == 4 || month == 6 || month == 9 || month == 11){
            if (arrBirthday[0] > 30){
                return 1;
            }
        }
        if (month == 1 || month == 3 || month == 5 || month == 7 || month == 8 || 
            month == 10 || month == 12){
            if (arrBirthday[0] > 31){
                return 1;
            } 
        }
        if (month == 2){
            if (checkNamNhuan(arrBirthday[2])){
                if (arrBirthday[0]> 29){
                    return 1;
                }
            } else{
                if (arrBirthday[0]> 28){
                    return 1;
                }
            }
        }
        let birthdayInput = new Date(arrBirthday[2], arrBirthday[1]-1, arrBirthday[0]);
        let timeBirthday = birthdayInput.getTime();
        if(timeNow < timeBirthday){
            return 1;
        }
    }
    return 0;
}


//truyền năm, kiểm tra có là năm nhuận ko, đúng trả về true, ngược lại false
function checkNamNhuan(year) {
    if ((year % 4 == 0 && year % 100 != 0) || (year % 100 == 0 && (year /100) % 4 == 0)) {
        return true;
    }
    return false;
}
