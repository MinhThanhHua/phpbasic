<?php

    //truyền arr và độ dài, tính tổng giá trị trong mảng, trả về tong
    function tinhTong($arr, $lenArr)
    {
        $tong = 0;
        for ($i = 0; $i < $lenArr; $i++) {
            $tong += $arr[$i];
        }
        return $tong;
    }

    //truyền arr và độ dài, trả về tích giá trị trong mảng
    function tinhTich($arr, $lenArr)
    {
        $tich = 1;
        for ($i = 0; $i < $lenArr; $i++) {
            $tich *= $arr[$i];
        }
        return $tich;
    }

    //hàm main gọi lại các function trên
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
    

