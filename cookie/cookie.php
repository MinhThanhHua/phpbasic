<!DOCTYPE html>
<?php
setcookie('username', 'thanh', time() + 60); //tạo cookie
setcookie('username', '', time() - 70); // xóa cookie
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cookie</title>
</head>
<body>
    <?php
    if (!isset($_COOKIE['username'])) {
        echo 'Chưa có';    
    } else {
        echo $_COOKIE['username'];
    }
    ?>
    <script>
        document.cookie = "user = minhthanh; expires=Fri, 22 Jun 2018 18:00:00 UTC";
        document.cookie = "user1 = minhthanh1; expires=Fri, 22 Jun 2018 18:00:00 UTC";
        var cookieName = document.cookie;
        function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for(var i = 0; i < ca.length; i++) {
                var c = ca[i];              
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }
        console.log(getCookie('user1'));
    </script>
</body>
</html>