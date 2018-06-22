<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/ajax.css">
    <title>Ajax</title>
</head>

<body>
    <div class="container">
        <form action="ajax.php" method="post" onsubmit="return showInfo()">
            <div class="form-input">
                <input type="text" name="name" id="" placeholder="Name">
            </div>
            <div class="form-input">
                <input type="text" name="address" id="" placeholder="Địa chỉ">
            </div>
            <div class="form-input">
                <input type="text" name="age" id="" placeholder="Tuổi">
            </div>
            <div class="form-input">
                <input type="text" name="birthday" id="" placeholder="Ngày sinh">
            </div>
            <div class="form-input">
                <input type="submit" value="Lưu">
            </div>
        </form>
        <div class="show"></div>
    </div>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/ajax.js"></script>
</body>

</html>