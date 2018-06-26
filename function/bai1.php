<?php
    // kiểm tra 3 parameter truyền vào có phải arr ko
    function checkIsArray($arr1, $arr2, $arr3)
    {
        $arr = '';
        if (!is_array($arr1)) {
            $arr .= 1 . ', ';
        }
        if (!is_array($arr2)) {
            $arr .= 2 . ', ';
        }
        if (!is_array($arr3)) {
            $arr .= 3;
        }
        return $arr;
    }

    //truyền 3 arr, tìm số 1 trong arr1, xuất thông báo
    function findNumber($arr1, $arr2, $arr3) 
    {   
        $checkArr = checkArray($arr1, $arr2, $arr3);
        if (strlen($checkArr) != 0) {
            echo('Invalid parameter ' . $checkArr);
        } else {
            $number = in_array('1', $arr1);
            if ($number == 1) {
                echo 'Found';
            } else {
                echo 'Not found';
            }
        }
    }

    //truyền 3 arr, cộng  arr 2 và 3 , sau đó trả về và xóa giá trị trùng ở arr mới(*)
    function xoaTrungLap($arr1, $arr2, $arr3)
    {
        $checkArr = checkArray($arr1, $arr2, $arr3);
        if (strlen($checkArr) != 0) { 
            return 'Invalid parameter ' . $checkArr;
        } else {
            $mergeArr = array_merge($arr2, $arr3);
            $arrUnique = array_unique($mergeArr);
            return $arrUnique;
        }
    }

    //truyền 3 arr, từ arr (*) , trả vể arr chứa giá trị chia hết cho 2
    function chiaHetCho2($arr1, $arr2, $arr3)
    {
        $arrAll = xoaTrungLap($arr1, $arr2, $arr3);
        $arrFilter = array_filter($arrAll, function($value) {
            return $value % 2 == 0;
        });
        return $arrFilter;
    }

    //truyền 3 arr, trả về arr chứa gia tri tăng dần cua arr 1 mà có gtri trùng giá trị với arr(*)
    function sapXepArr1($arr1, $arr2, $arr3)
    {
        $arrAll = xoaTrungLap($arr1, $arr2, $arr3);//=>arr(*)
        $arrIntersect = array_intersect($arr1, $arrAll);
        sort($arrIntersect);
        return $arrIntersect;
    }

    //truyền 3arr, trả về các số giảm dần của arr1 khác key với arr(*)
    function sapXepGiamArr1($arr1, $arr2, $arr3)
    {
        $arrAll = xoaTrungLap($arr1, $arr2, $arr3);
        $arrKeyArr1 = array_keys($arr1);// lấy key của arr1
        $keyArr1 = array_diff($arrKeyArr1, $arrAll); // lấy value của key không trùng
        $lengthKeyArr1 = count($keyArr1);
        for ($i = 0; $i < $lengthKeyArr1; $i++) {
            echo($arr1[$keyArr1[$i]]);
        } 
    }

    // danh sách mảng
    $arr1 = [9, 1, 3];
    $arr2 = [1, 2];
    $arr3 = [7, 2, 9];
    
    echo 'Arr1: ['.implode(', ',$arr1).']<br>';
    echo 'Arr2: ['.implode(', ',$arr2).']<br>';
    echo 'Arr3: ['.implode(', ',$arr3).']<br>';

    echo 'Bài 1 Tìm giá trị 1 trong arr1:';
    findNumber($arr1, $arr2, $arr3);
    echo '<br>';
    
    echo 'Bài 2 Merge array (2, 3) và xóa trùng => arr(*): ';
    $arrAll = xoaTrungLap($arr1, $arr2, $arr3);
    echo implode(', ', $arrAll);
    echo '<br>';

    echo 'Bài 3 In ra các số trong (*) chia hết cho 2: ';
    $arrBai3 = chiaHetCho2($arr1, $arr2, $arr3);
    echo implode(', ',$arrBai3);
    echo '<br>';

    echo 'Bài 4 Các số tăng dần của arr1 có cùng giá trị trong (*): ';
    echo implode(', ',sapXepArr1($arr1, $arr2, $arr3));
    echo '<br>';   

    echo 'Bài 5 Các số giảm dần của arr1 khác key với (*): ';
    sapXepGiamArr1($arr1, $arr2, $arr3);
    echo '<br>';  
?>