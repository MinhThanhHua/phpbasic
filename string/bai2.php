<?php
	/**
	* Chức năng funtion: kiểm tra chuỗi
	* @param <string> $str1
	* @param <string> $str2
	
	* @return <str>
	*
	*/
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

    /**
	* Chức năng funtion: tìm vi trí chuỗi 1 trong chuỗi 2
	* @param <string> $str1
	* @param <string> $str2
	
	* @return <str>
	*
	*/
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

    /**
	* Chức năng funtion: Hiển thị chuỗi theo 2 cách
	* @return <str>
	*/
    function showStr() {
        echo 'Money$__$money <br>';
        echo "Money\$__\$money";
    }

    /**
	* Chức năng funtion: kiểm tra số byte trong 1 chuỗi
	* @param <string> $str1
	
	* @return <str>
	*
	*/
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
    
    /**
	* Chức năng funtion: cắt ký tự 'm' bên phaỉ
	* @param <string> $str
	
	* @return <str>
	*
	*/
    function trimStr($str)
    {
        echo rtrim($str, 'm');
    }

    /**
	* Chức năng funtion: đảo và cắt chuỗi
	* @param <string> $str
	
	* @return <str>
	*
	*/
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