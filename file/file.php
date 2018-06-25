<?php
    $list = array
        (
        "Peter,Griffin,Oslo,Norway",
        "Glenn,Quagmire,Oslo,Norway",
    );

    $file = fopen("contacts.csv", "w");

    foreach ($list as $line) {
        fputcsv($file, explode(',', $line));
    }

    fclose($file);
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename('contacts.csv'));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize('contacts.csv'));
    flush(); // Flush system output buffer
    readfile('contacts.csv');
    exit;
//http://localhost/phpgmo/file/file.php