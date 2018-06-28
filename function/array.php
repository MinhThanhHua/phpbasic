<?php
       /**
    * Chức năng funtion: 3 cách cộng mảng trong php
    
	*   @return <mảng arr[]>
	*/
    function demo() 
    {
        $arr = ['a' => 4,'b' => 5,'c' => 5];
        $arr0 = ['a' => 1,'e' => 2,'f' => 3];
        $a = $arr + $arr0;
        $b = array_merge($arr, $arr0);
        $b = array_merge_recursive($arr, $arr0);
        var_dump($a);
        echo '<br>';
        var_dump($b);
    }

    /**
    * Chức năng funtion: xuất câu chào
	*   @param <string> $name
    *   @param <int> $age 
    
	*   @return <string>
	*/
    function helloWorld($name, $age)
    {
        echo 'Xin chào tôi tên là: ' . $name . ' ' . $age . ' tuổi<br>';
    }


    /*Chức năng funtion: demo hàm array_map

    * @return: gọi tới hàm helloWorld
    */
    function demo1()
    {
        $name = ['a'=> 'Phúc','b'=> 'Lộc', 'Thọ'];
        $age = [1900, 2000, 3000];
        array_map('helloWorld', $name, $age);
    }

    /**
    * Chức năng funtion: xuất câu chào
	*   @param <string> $value
    *   @param <string> $key
    
	*   @return <string>
	*/
    function info($value, $key)
    {
        echo "Ông $key tên là: $value";
    }
    
    //chạy thử hàm arr walk
    function demo2()
    {
        $name = ['a'=> 'Phúc','b'=> 'Lộc','c' => 'Thọ'];
        array_walk($name, 'info');
    }

    //demo();
    //demo1();
    demo2();
?>