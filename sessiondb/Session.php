<?php 
$db = mysqli_connect("localhost", "root", "123456", "phpuser");

        //mở session
        function sess_open($sess_path, $sess_name)
        {
            return true;
        }
        //đóng session
        function sess_close()
        {
            return true;
        }
        //nhận id, kiểm tra id trong db, thêm id, data nếu chưa có
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

        //nhận id và data, cập nhật lại data với id tương ứng,
        function sess_write($sess_id, $data)
        {
            global $db;

            $CurrentTime = time();
            mysqli_query($db, "update sessions SET Data = '$data', DateTouched = $CurrentTime WHERE SessionID = '$sess_id';");
            return true;
        }

        //xóa session trong db với id tương ứng
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
        