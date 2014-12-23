<?php

class Model_User_User extends Database{
    protected $userid;
    protected $username;
    protected $password;
    protected $level;
    protected $info;
    
    function _CheckUser($username) {
        global $username_exclude_chars;
        if (empty($username)) {
            $this->SetError('Vui lòng nhập username');
            return false;
        }
        if(strlen($username)<USER_MIN_LEN) {
            $this->SetError('Tên đăng nhập quá ngắn');
            return false;
        }
        foreach($username_exclude_chars as $item) {
            if (strpos($username, $item) !== false) {
                $this->setError('Username không hợp lệ');
                return false;
            }
        }
        return true;
    }
    function SetUser($username) {
        if($this->_CheckUser($username)) {
            $this->username=$username;
        }
    }
    function GetUser() {
        return $this->username;
    }
    function SetPass($password) {
        if(!empty($password)) {
            $this->password= md5($password);
        } else {
            $this->SetError('Vui lòng nhập mật khẩu');
        }
    }
    function GetPass() {
        return $this->password;
    }
    function SetLevel($level) {
        $this->level= $level;
    }
    function GetLevel() {
        return $this->level;
    }
    function SetInfo($info) {
        $this->info= $info;
    }
    function GetInfo() {
        return $this->info;
    }
    function CheckLogin($username,$password) {
        $this->SetUser($username);
        $this->SetPass($password);
        if(!empty($this->error)) {
            return false;
        }else {
            $sql='select * from user where username="' .$this->username. '" and password="' .$this->password. '"';
            $this->_query($sql);
            if($this->_numrow()==0) {
                $this->SetError('Sai thông tin đăng nhập');
                return false;
            } else {
                $data=$this->_fecth();
                $_SESSION[PREFIX."username"] = $data["username"];
                $_SESSION[PREFIX."userid"] = $data["userid"];
                $_SESSION[PREFIX."level"] = $data["level"];
                $_SESSION[PREFIX."myinfo"] = $data["info"];
                $_SESSION[PREFIX."bookcase"] = $data["bookcase"];
                $_SESSION[PREFIX."property"] = $data["property"];
                return true;
            }
        }
    }
    function UserLisr() {
        $sql='select * from user order by userid DESC';
        $this->_query($sql);
        if($this->_numrow()==0) {
            return false;
        } else {
            $data=array();
            while($row=$this->_fecth()) {
                $data[]=$row;
            }
            return $data;
        }
    }
    function _checkExistsUser() {
        $sql='select userid from user where username ="'.$this->username.'"';
        $this->_query($sql);
        if($this->_numrow() == 0) {
            return false;
        } else {
            return true;
        }
    }
    function AddUser($username, $password, $confirmPass, $info, $level = 3) {
        $this->SetUser($username);
        $this->SetPass($password);
        if($password != $confirmPass) {
            $this->SetError('2 ô mật khẩu ko giống nhau');
        }
        $this->SetInfo($info);
        $this->SetLevel($level);
        if(!empty($this->error)) {
            return false;
        }else {
            if($this->_checkExistsUser()) {
                $this->SetError("Đã tồn tại tài khoản");
                return false;
            }else {
                $sql = "insert into user(username, password, level, info) values('".$this->username."', '".$this->password."',".$this->level.", '".$this->info."')";
                $this->_query($sql);
                return true;
            }
        }
    }
    function _LayTTDT($userid) {
        if(is_numeric($userid)) {
            $sql = 'select * from user where userid = '.$userid;
            $this->_query($sql);
            $data = $this->_fecth();
            $this->userid = $data["userid"];
            $this->username = $data["username"];
            $this->level = $data["level"];
            $this->password = $data["password"];
            $this->info = $data["info"];
            return true;
        }
        return false;
        
    }
    function _EditMySeft () {
        if($_SESSION[PREFIX."userid"] != $this->userid) {
            return false;
        } else {
            return true;
        }
        
    }
    function _getPermission($action) {
        if(is_null($this->userid) && is_null($this->level)) {
            return false;
        }else {
            switch($action) {
                case  "del":{
                    if(($this->userid == 2) || ($_SESSION[PREFIX."userid"] != 2 && $this->level == 1) || ($_SESSION[PREFIX."level"] == 2)) {
                        return false;
                    } else {
                        return true;
                    }
                }
                case "edit": {
                    if($_SESSION[PREFIX."userid"] != 2 && ($this->userid == 2 || ($this->level == 1 && !$this->_EditMySeft()))||($_SESSION[PREFIX."level"] == 2 && !$this->_EditMySeft())) {
                        return false;
                    } else {
                        return true;
                    }
                }
                default:
                    return false;
            }
        }
    }
    
    function DelUser($userid) {
        if(!$this->_LayTTDT($userid) || !$this->_getPermission("del")) {
            return false;
        }else {
            $sql = 'delete from user where userid =' .$userid;
            $this->_query($sql);
            return true;
        }
    }
    function UpdateUser($password, $confirmPass, $level, $info, $userid) {
        if(!empty($password)) {
            $this->SetPass($password);
        }
        if($password != $confirmPass) {
            $this->SetError('2 ô mật khẩu ko giống nhau');
        }
        if(!empty($level)) {
            $this->SetLevel($level);
        }
        if(!empty($info)) {
            $this->SetInfo($info);
        }
        if(!empty($this->error)) {
            return false;
        }else {
            $sql = "update user set password = '" . $this->password ."' ,level = " .$this->level. ", info = '" .$this->info. "' where userid =" .$userid;
            $this->_query($sql);
            return true;
        }
    }
    function BuyBook($bookcase,$property,$userid) {
        $sql = "update user set bookcase = '" . $bookcase ."' ,property = " .$property. " where userid =" .$userid;
        $this->_query($sql);
        return true;
    }
    function CheckOut($property,$userid) {
        $sql = "update user set property = " .$property. " where userid =" .$userid;
        $this->_query($sql);
        return true;
    }
}

?>
