<?php

Class Model_Category_Category extends Database{
    protected $cateid;
    protected $cate_title;
    
    function _CheckTitle($cate_title) {
        if(empty($cate_title)) {
            $this->SetError('Vui lòng nhập tên danh mục');
            return false;
        }
        return true;
    }
    function SetTitle($cate_title) {
        if($this->_CheckTitle($cate_title)) {
            $this->cate_title = addslashes($cate_title);
        }
        
    }
    function GetTitle() {
        return $this->cate_title;
    }
    function CateList() {
        $sql = "select * from category order by cateid DESC";
        $this->_query($sql);
        if($this->_numrow() == 0) {
            return false;
        }else{
            $data = array();
            while($row = $this->_fecth()){
                $data[] = $row;
            }
            return $data;
        }
    }
    function _checkExistsTitle() {
        $sql = 'select * from category where cate_title = "' .$this->cate_title. '"';
        $this->_query($sql);
        if($this->_numrow() == 0) {
            return false;
        }
        return true;
    }
    function AddCategory ($cate_title) {
        $this->SetTitle($cate_title);
        $error = $this->GetError();
        if(!empty($error)) {
            return false;
        }else {
            if($this->_checkExistsTitle()){
                $this->SetError("Đã tồn tại tên danh mục");
                return false;
            }else {
                $sql = 'insert into category(cate_title) values("' .$this->cate_title. '")';
                $this->_query($sql);
                return true;
            }
        }
    }
    function DelCategory($cateid) {
        $sql = 'delete from category where cateid = '.$cateid;
        $this->_query($sql);
        return true;
    }
    function UpdateCategory($cate_title, $cateid) {
        if(!empty($cate_title)) {
            $this->SetTitle($cate_title);
        }
        $error = $this->GetError();
        if(!empty($error)) {
            return false;
        }else {
            if($this->_checkExistsTitle()){
                $this->SetError("Đã tồn tại tên danh mục");
                return false;
            }else {
                $sql = 'update category set cate_title = "' .$this->cate_title. '" where cateid = '.$cateid;
                $this->_query($sql);
                return true;
            }
        }
    }
    function InfoCategory($cateid) {
        $sql = 'select * from category where cateid = '.$cateid;
        $this->_query($sql);
        $data = array();
        while($row = $this->_fecth()) {
            $data[] = $row;
        }
        return $data;
    }
    function CountNews($cateid) {
        $sql = "select * from books where cateid =".$cateid;
        $this->_query($sql);
        $cb=$this->_numrow();
        echo ' ( có '.$cb.' cuốn sách )';
    }
}
?>