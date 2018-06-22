<?php
    if ($_FILES["file"]['error'] > 0) {
        echo $_FILES["file"]['error'];
    } else {
        $pathSlient = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $pathServer = './file/' . $fileName;
        if (file_exists($pathServer)) {
            die ("File đã tồn tại");
        } else {
            move_uploaded_file($pathSlient, $pathServer);
            die ('Success');
        }
    }