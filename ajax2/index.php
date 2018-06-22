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
        <form action="server.php" method="post" onsubmit="return showResult()">
            <div class="form-input">
                <input type="text" name="number" id="" placeholder="1, 2, 3, ...">
            </div>
            <div class="form-input">
                <input type="text" name="tong" id="" placeholder="Tổng" disabled>
            </div>
            <div class="form-input">
                <input type="text" name="tich" id="" placeholder="Tích" disabled>
            </div>
            <div class="form-input">
                <input type="submit" value="Tính">
            </div>
        </form>
    </div>
    <div class="result"></div>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/ajaxs.js"></script>
</body>

</html>