<!DOCTYPE html>
<?php 
    session_start();
    if (isset($_POST['submit-session'])) {
        $_SESSION['username'] = $_POST['username'];
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Session</title>
</head>
<body>
    <form action="index.php" method="post">
        <input type="text" name="username" id="username">
        <input type="submit" value="Lưu" name='submit-session'>
    </form>
    <?php
        session_destroy();
        if (isset($_SESSION['username'])) {
            echo "Xin chào $_SESSION[username]";
            
            echo "Xin chào $_SESSION[username]";
        }
    ?>
</body>
</html>
<!-- //http://localhost/phpgmo/session/index.php -->