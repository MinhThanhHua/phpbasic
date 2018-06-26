<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="insertsession.php" method="POST">
        <input type="text" name="name_session" id="nameSession" placeholder="Name">
        <input type="text" name="value_session" id="valueSession" placeholder="Value">
        <input type="submit" value="Lưu" name="submit">
    </form>
    <?php
    
    if (isset($_POST['submit'])) {
        include_once('Session.php');
        $name = $_POST['name_session'];
        $value = $_POST['value_session'];
        $_SESSION[$name] = $value;
    }
    ?>
</body>
</html>