<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="ReadSession.php" method="POST">
        <input type="text" name="name_session" id="nameSession" placeholder="Tên session">
        <input type="submit" value="Tìm" name="submit">
    </form>
    <dv class="show"></dv>
    <?php
    if (isset($_POST['submit'])) {
        include_once('Session.php');
        $name = $_POST['name_session'];
        echo $_SESSION[$name];
    }
    ?>
</body>
</html>