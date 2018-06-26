<?php
    //Truyền 2 pamra kiểm tra xem có là dạng chuỗi, trả về thông báo
    function checkIsString($str1, $str2)
    {
        $str = '';
        if (!is_string($str1)) {
            $str .= 1 . ', ';
        }
        if (!is_string($str2)) {
            $str .= 2;
        }
        return $str;
    }

    //Truyền 2 chuỗi, tìm vi trí chuỗi 1 trong chuỗi 2
    function findStr($str1, $str2)
    {
        $checkStr = checkString($str1, $str2);
        if (strlen($checkStr) == 0) {
            $result = strpos($str1, $str2);
            if ($result) {
                echo 'true';
            } else {
                echo 'false';
            }
        } else {
            echo 'Invalid parameter: '. $checkStr;
        }
    }

    //Hiển thị chuỗi theo 2 cách
    function showStr() {
        echo 'Money$__$money <br>';
        echo "Money\$__\$money";
    }

    //truyền 1 chuỗi, kiểm tra số byte trong chuỗi, xuất tbao
    function checkBytes($str)
    {
        $lengthStr = strlen($str); //đếm cả dấu
        $lengthStr1 = mb_strlen($str); // ko đếm dấu
        if ($lengthStr == $lengthStr1) {
            echo 'Single';
        } else {
            echo 'Multiple';
        }
    }
    
    //truyền 1 chuỗi, cắt ký tự m bên phaỉ và trả về
    function trimStr($str)
    {
        echo rtrim($str, 'm');
    }

    //truyền 1 chuỗi, đảo và cắt chuỗi và return
    function revAndTrim($str)
    {
        $revStr = strrev($str);
        echo ltrim($revStr, 'm');
    }

    $str1 = "Xin chào mọi người";
    $str2 = "mọi";
    $str3 = 'hello every one';
    $str4 = 'trim';

    echo 'Bài 1 Xuất câu mẫu dưới 2 dạng: <br>';
    showStr();
    echo '<br>';

    echo 'Bài 2 Tìm kiếm trong string: <br>';
    findStr($str1, $str2);
    echo '<br>';

    echo 'Bài 3 Multiple or single bytes string: <br>';
    checkBytes($str3);
    echo '<br>';

    echo 'Bài 4 Trim: <br>';
    trimStr($str4);
    echo '<br>';

    echo 'Bài 4 Trim and Reverse: <br>';
    revAndTrim($str4);
    echo '<br>';
?>