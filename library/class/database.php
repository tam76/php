<?php

class Database {
    protected $error = array();
    protected $conn;
    protected $query;
    public function connect () {
        $this->conn=mysql_connect(HOST_NAME,HOST_USER,HOST_PASS);
        mysql_select_db(DB_NAME,$this->conn);
        mysql_set_charset('utf8',$this->conn);
    }
    function _query($sql) {
        if(!is_null($this->conn)) {
            $this->query=mysql_query($sql,$this->conn);
        }
    }
    function _numrow() {
        if(!is_null($this->query)) {
            return mysql_num_rows($this->query);
        }else {
            return false;
        }
    }
    function _fecth() {
        if(!is_null($this->query)) {
            return mysql_fetch_assoc($this->query);
        }else {
            return false;
        }
    }
    function __construct() {
        $this->connect();
    }
    function SetError($error) {
        $this->error[] = $error;
    }
    function GetError() {
        return $this->error;
    }
    function _CheckError() {
        if (!empty($this->error)) {
            echo '<div class="error_msg"> <ul>';
            foreach($this->error as $loi) {
                echo '<li>' .$loi. '</li>';
            }
                echo '</ul></div>';
            return false;
        }
        return true;
    }
}

?>