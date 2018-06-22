<?php

    // tính tổng giá trị trong mảng
    function tinhTong($arr, $lenArr)
    {
        $tong = 0;
        for ($i = 0; $i < $lenArr; $i++) {
            $tong += $arr[$i];
        }
        return $tong;
    }

    // tính tích giá trị trong mảng
    function tinhTich($arr, $lenArr)
    {
        $tich = 1;
        for ($i = 0; $i < $lenArr; $i++) {
            $tich *= $arr[$i];
        }
        return $tich;
    }

    function main() 
    {
        $str = $_POST['number'];
        $arr = explode(',', $str);
        $lenArr = count($arr);
        $arrKQ = [tinhTong($arr, $lenArr), tinhTich($arr, $lenArr)];
        $myJson = json_encode($arrKQ);
        echo ($myJson);
    }
    main();
    

