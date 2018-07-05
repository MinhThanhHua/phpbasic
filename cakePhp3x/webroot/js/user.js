function checkFormUser() {
    var name = $('input[name = name]').val();
    var countErr = 0;
    if (name.length < 3 || name.length > 50) {
        $('.show').eq(0).text('Tên từ 3 đến 50 ký tự').css({'color':'red'});
        countErr++;
    } else {
        $('.show').eq(0).text('');
    }

    // let text = validateEmail();
    // if (text.length > 0){
    //     $('.show').eq(1).text(text).css({'color':'red'});
    //     countErr++;
    // } else {
    //     $('.show').eq(1).text('')
    // }
    var email = $('input[name=email]').val();
    if (!isEmail(email)) {
        $('.show').eq(1).text(text).css({'color':'red'});
        countErr++;
    } else {
            $('.show').eq(1).text('')
        }
    
    var password = $('input[name = password]').val();
    if (password.length < 5 || password.length > 20) {
        $('.show').eq(2).text('Mật khẩu từ 5 đến 20 ký tự').css({'color':'red'});
        countErr++;
    } else {
        $('.show').eq(2).text('');
    }
    
    var address = $('input[name = address]').val();
    if (address.length < 10 || address.length > 150) {
        $('.show').eq(4).text('Địa chỉ từ 10 đến 150 ký tự').css({'color':'red'});
        countErr++;
    } else {
        $('.show').eq(4).text('');
    }
    

    var phone = $('input[name = phone]').val();
    if (phone.length < 8 || phone.length > 10) {
        $('.show').eq(5).text('Điện thoại là số từ 8 đến 10 ký tự').css({'color':'red'});
        countErr++;
    } else {
        $('.show').eq(5).text('');
    }
    
    if (isNaN(phone) || (phone) <= 0) {
        $('.show').eq(5).text('Chỉ được điền ký tự số > 0').css({'color':'red'});
        countErr++;
    } else {
        $('.show').eq(5).text('');
    }
    
    if (countErr == 0) {
        return true;
    }
    return false;
}    

// kiểm tra email có đúng định dạng, trả về nội dung lỗi
function validateEmail() {
    let email = $('input[name=email]').val();
    let i =0;
    let emailLength = email.length;
    let viTriA = 0;
    let countA = 0;
    let viTriCham = 0;
    let countCham = 0;
    if (emailLength < 8 || emailLength > 100)
    {
        return 'Độ dài email từ 8 đến 100';
    }
    for (i = 0; i < emailLength; i++){
        if (email[i] == '@'){
            viTriA = i; 
            countA++;
        }
        if (email[i] =='.'){
            viTriCham = i;
            countCham++;
        }
    }
    if (countA > 1){
        return 'Chỉ được 1 dấu @';
    }
    if (countCham > 1){
        return 'Chỉ được 1 dấu .'
    }
    if (countCham == 0 || countA == 0){
        return 'Thiếu ký tự @ hoặc .';
    }
    if (viTriA > viTriCham){
        return 'Phải đặt dấu chấm sau @';
    }
    if (viTriA < 3){
        return "Tên email phải dài hơn 3";
    }
    if (viTriCham - viTriA < 3){
        return "Tên miền email phải dài hơn 3";
    }
    if (emailLength - viTriCham <3){
        return "Sau dấu chấm ít nhất 3 ký tự";
    }
    return 0;
}

function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
  }