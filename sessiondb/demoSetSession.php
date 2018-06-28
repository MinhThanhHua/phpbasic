<?php
    function sess_open($sess_path, $sess_name) {
        print "Session opened.\n";
        print "Sess_path: $sess_path\n";
        print "Sess_name: $sess_name\n\n";
        return true;
    }

    /**
	* Chức năng funtion : đóng session
	* @return <boolean>
	*/
    function sess_close() {
        print "Session closed.\n";
        return true;
    }

    	/**
	* Chức năng funtion : đoc session
	* @param <string> $sess_id
	* @return <string>
	*/
    function sess_read($sess_id) {
        print "Session read.\n";
        print "Sess_ID: $sess_id\n";
        return '';
    }

    	/**
	* Chức năng funtion: viết function
	* @param <string> $sess_id
	* @param <string> $data
	
	* @return <boolean>
	* @throw <exception trả về>
	*
	*/
    function sess_write($sess_id, $data) {
        print "Session value written.\n";
        print "Sess_ID: $sess_id\n";
        print "Data: $data\n\n";
        return true;
    }

    
    	/**
	* Chức năng funtion: xóa session có id đươc truyền vào
	* @param <string> $sess_id
	
	* @return <boolean>
	*
	*/
    function sess_destroy($sess_id) {
        print "Session destroy called.\n";
        return true;
    }


    function sess_gc($sess_maxlifetime) {
        print "Session garbage collection called.\n";
        print "Sess_maxlifetime: $sess_maxlifetime\n";
        return true;
    }

    //viết lại hàm session trong php
    session_set_save_handler("sess_open", "sess_close", "sess_read", "sess_write", "sess_destroy", "sess_gc");
    session_start();
    $_SESSION['demo'] ='check';