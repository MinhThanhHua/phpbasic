<?php

    /**
    * Chức năng funtion: tính giá trị trong mảng  
	*   @param <mảng> $arr
    *   @param <int> $lenArr
    
	*   @return <int>
	*/
    function tinhTong($arr, $lenArr)
    {
        $tong = 0;
        for ($i = 0; $i < $lenArr; $i++) {
            $tong += $arr[$i];
        }
        return $tong;
    }

    /**
    * Chức năng funtion: tính tích giá trị trong mảng
	*   @param <mảng> $arr
    *   @param <int> $lenArr 
    
	*   @return <int>
	*/
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
    

