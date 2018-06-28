<?php 
$db = mysqli_connect("localhost", "root", "123456", "phpuser");

        //mở session
        function sess_open($sess_path, $sess_name)
        {
            return true;
        }
            /**
        * Chức năng funtion : đóng session
        * @return <boolean>
        */
        function sess_close()
        {
            return true;
        }
        /**
        * Chức năng funtion : đoc session
        * @param <string> $sess_id
        * @return <string>
        */
        function sess_read($sess_id)
        {
            global $db;

            $result = mysqli_query($db, "select Data FROM sessions WHERE SessionID = '$sess_id';");
            if (!mysqli_num_rows($result)) {
                $CurrentTime = time();
                mysqli_query($db, "insert INTO sessions (SessionID, DateTouched) VALUES ('$sess_id', $CurrentTime);");
                return '';
            } else {
                $CurrentTime = time();
                extract(mysqli_fetch_array($result), EXTR_PREFIX_ALL, 'sess');
                mysqli_query($db, "update sessions SET DateTouched = $CurrentTime WHERE SessionID = '$sess_id';");
                return $sess_Data;
            }
        }

            	/**
        * Chức năng funtion: viết function
        * @param <string> $sess_id
        * @param <string> $data
        
        * @return <boolean>
        * @throw <exception trả về>
        *
        */
        function sess_write($sess_id, $data)
        {
            global $db;

            $CurrentTime = time();
            mysqli_query($db, "update sessions SET Data = '$data', DateTouched = $CurrentTime WHERE SessionID = '$sess_id';");
            return true;
        }

        /**
        * Chức năng funtion: xóa session có id đươc truyền vào
        * @param <string> $sess_id
        
        * @return <boolean>
        *
        */
        function sess_destroy($sess_id)
        {
            global $db;
            mysqli_query($db, "delete FROM sessions WHERE SessionID = '$sess_id';");
            return true;
        }

        function sess_gc($sess_maxlifetime)
        {
            global $db;
            $CurrentTime = time();
            mysqli_query($db, "delete FROM sessions WHERE DateTouched + $sess_maxlifetime < $CurrentTime;");
            return true;
        }
        session_set_save_handler("sess_open", "sess_close", "sess_read", "sess_write", "sess_destroy", "sess_gc");
        session_start();
        