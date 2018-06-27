<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/ajaxs.css">
    <title>Ajax</title>
</head>

<body>
    <?php
        $countErr = 0;
        if (isset($_POST['submit'])) {
            if (isset($_POST['number']) && empty($_POST['number'])) {
                $countErr++;
                echo '<span>chưa nhập số</span>';
            } else {
                $birthday = $_POST['number'];
                $arrBirthday = explode(',', $birthday);
                $lengthArrBirthday = count($arrBirthday);
                for ($i = 0; $i < $lengthArrBirthday; $i++) {
                    if (!is_numeric($arrBirthday[$i])) {
                        $countErr++;
                        echo 'Số không hợp lệ';
                    }
                }
            }  
        }
    ?>
    <?php
        if (!empty($_POST['submit']) && $countErr == 0) {
            ob_start(); // begin collecting output

            include 'server.php';
            
            $result = ob_get_clean(); // retrieve output from myfile.php, stop buffering

            $result = json_decode($result);
        }
    ?>
    <div class="container">
        <form action="index.php" method="post" onsubmit="return showResult()">
            <div class="form-input">
                <input type="text" name="number"  id="" placeholder="1, 2, 3, ...">
            </div>
            <div class="form-input">
                <input type="text" name="tong" value="<?php echo (isset($result)?  $result[0] : '?') ?>" placeholder="Tổng" disabled>
            </div>
            <div class="form-input">
                <input type="text" name="tich" value="<?php echo (isset($result)? $result[1] : '?') ?>" placeholder="Tích" disabled>
            </div>
            <div class="form-input">
                <input type="submit" name="submit" value="Tính">
            </div>
        </form>
    </div>
    
    <div class="result"></div>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/ajaxs.js"></script>
</body>

</html>