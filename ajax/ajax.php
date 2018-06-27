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
    <div class="container">
        <form action="ajax.php" method="post" onsubmit="return showInfo()">
            <div class="form-input">
                <input type="text" name="name" id="" placeholder="Name">
                <?php
                    $countErr = 0;
                    if (!empty($_POST['submit'])) {
                        if (isset($_POST['name']) && empty($_POST['name'])) {
                            $countErr++;
                            echo '<span>chưa nhập tên</span>';
                        } else {
                            $name = $_POST['name'];
                            if (strlen($name) < 3 || strlen($name) > 50) {
                                $countErr++;
                                echo 'Độ dài tên từ 3 đến 50 ký tự';
                            }
                        }
                    } 
                ?>
            </div>
            <div class="form-input">
                <input type="text" name="address" id="" placeholder="Địa chỉ">
                <?php
                    if (!empty($_POST['submit'])) {
                        if (isset($_POST['address']) && empty($_POST['address'])) {
                            $countErr++;
                            echo '<span>chưa nhập address</span>';
                        } else {
                            $address = $_POST['address'];
                            if (strlen($address) < 3 || strlen($address) > 150) {
                                $countErr++;
                                echo 'Độ dài address từ 10 đến 150 ký tự';
                            }
                        }
                    } 
                ?>
            </div>
            <div class="form-input">
                <input type="text" name="age" id="" placeholder="Tuổi">
                <?php
                    if (!empty($_POST['submit'])) {
                        if (isset($_POST['age']) && empty($_POST['age'])) {
                            $countErr++;
                            echo '<span>chưa nhập age</span>';
                        } else {
                            $age = $_POST['age'];                          
                            if (!is_numeric($age) || $age < 0) {
                                $countErr++;
                                echo 'Chỉ điền giá trị số';
                            }
                        }
                    } 
                ?>
            </div>
            <div class="form-input">
                <input type="text" name="birthday" id="" placeholder="Ngày sinh dd/mm/yyyy">
                <?php
                    if (!empty($_POST['submit'])) {
                        if (isset($_POST['birthday']) && empty($_POST['birthday'])) {
                            echo '<span>chưa nhập birthday</span>';
                        } else {
                            $birthday = $_POST['birthday'];
                            $arrBirthday = explode('/', $birthday);
                            if (count($arrBirthday) != 3) {
                                $countErr++;
                                echo 'Ngày sinh không hợp lệ';
                            } else {
                                $date = $arrBirthday[0];
                                $month = $arrBirthday[1];
                                $year = $arrBirthday[2];
                                if (!checkdate($month, $date, $year)) {
                                    $countErr++;
                                    echo 'Ngày không hợp lệ, mời kiểm tra lại';
                                }
                            }
                        }    
                    } 
                ?>
            </div>
            <div class="form-input">
                <input type="submit" name="submit" value="Lưu">
            </div>
        </form>
        <div class="show"></div>
        <?php
            if ($countErr == 0 && !empty($_POST['submit'])) {
                include_once('server.php');
            }
        ?>
    </div>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/ajax.js"></script>
</body>

</html>