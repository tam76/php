<?php


class Model_Books_Books extends NoneUni{
    protected $bookid;
    protected $title;
    protected $url;
    protected $cost;
    protected $img;
    protected $author;
    protected $publisher;
    protected $date;
    protected $public;
    protected $cateid;
    protected $userid;
    protected $total_rate;
    protected $views_rate;
    protected $diem;
    function SetTitle($title) {
        if(!empty($title)) {
            $this->title = addslashes($title);
        }else {
            $this->SetError('Vui lòng nhập tiêu đề');
        }
    }
    function GetTitle() {
        return ($this->title);
    }
    function _GetExt($name) {
        $dotPos = strpos($name,'.');
        $fileExt = strtolower(substr($name,$dotPos+1));
        return $fileExt;
    }
    function _CheckUrl($url) {
        global $accept_file;
        if(empty($url)) {
           $this->SetError('Vui lòng chọn sách');
           return false;
        }elseif(!in_array($this->_GetExt($url),$accept_file)) {
            $this->SetError('Bạn không được phép upload loại file này');
            return false;
        }
        return true;
    }
    function SetUrl($url) {
        if($this->_CheckUrl($url)) {
            $this->url = $this->noneUniAlias($this->GetTitle(),true).'.pdf';
        }
    }
    function GetUrl() {
        return $this->url;
    }
    function SetCost($cost) {
        if(is_numeric($cost)) {
            $this->cost = $cost;
        }else {
            $this->SetError('Giá viết bằng số');
        }
    }
    function GetCost() {
        return $this->cost;
    }
    function _CheckImg($img) {
        global $accept_img;
        if(!in_array($this->_GetExt($img),$accept_img)) {
            $this->SetError('Bạn không được phép upload loại file này');
            return false;
        }
        return true;
    }
    function SetImg($img) {
        if(empty($img)){
            $this->img = 'default.jpg';
        } elseif($this->_CheckImg($img)) {
            $this->img = $this->noneUniAlias($this->GetTitle(),true).'.jpg';
        }
    }
    function GetImg() {
        return $this->img;
    }
    function SetAuthor($author) {
            $this->author = addslashes($author);
    }
    function GetAuthor() {
        return $this->author;
    }
    function SetPublisher($publisher) {
            $this->publisher = addslashes($publisher);
    }
    function GetPublisher() {
        return $this->publisher;
    }
    function SetDate($date) {
        if(is_numeric($date)) {
            $this->date = $date;
        }else {
            $this->SetError('Năm viết bằng số');
        }
    }
    function GetDate() {
        return $this->date;
    }
    function SetPublic($public) {
        $this->public = $public;
    }
    function GetPublic() {
        return $this->public;
    }
    function SetCateid($cateid) {
        if($cateid != "none") {
            $this->cateid = $cateid;
        }else {
            $this->SetError('Vui lòng chọn danh mục');
        }
    }
    function GetCateid() {
        return $this->cateid;
    }
    function SetUserid($userid) {
        $this->userid = $userid;
    }
    function GetUserid() {
        return $this->userid;
    }
    function GetTotal() {
        return $this->total_rate;
    }
    function GetView() {
        return $this->views_rate;
    }
    function GetDiem() {
        return $this->diem;
    }
    function BookList() {
        $sql = 'select bookid, book_title, author, publisher, cate_title, username, book_public, book_date from books, category, user where books.cateid=category.cateid and books.userid=user.userid order by bookid DESC';
        $this->_query($sql);
        if($this->_numrow() == 0) {
            return false;
        }else {
            $data = array();
            while($row = $this->_fecth()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    function SelectCate($cateid) {
        $sql_cate = 'select * from category';
        $this->_query($sql_cate);
        while ($data_cate = $this->_fecth()) {
            echo '<option value="' .$data_cate["cateid"]. '"';
            if (isset($cateid) && $cateid == $data_cate["cateid"]) {
                echo ' selected="selected"';
            } else {
                if ($this->GetCateid() == $data_cate["cateid"]) {
                    echo ' selected="selected"';
                }
            }
            echo '>' .$data_cate["cate_title"]. '</option>';
        }
    }
    function Addbook($title, $img, $url, $author, $publisher, $date, $public, $cateid, $userid, $cost=0) {
        $this->SetTitle($title);
        $this->SetImg($img);
        $this->SetUrl($url);
        $this->SetCost($cost);
        $this->SetAuthor($author);
        $this->SetPublisher($publisher);
        $this->SetDate($date);
        $this->SetPublic($public);
        $this->SetCateid($cateid);
        $this->SetUserid($userid);
        $error = $this->GetError();
        if(!empty($error)) {
            return false;
        }else {
            $sql = 'insert into books(book_title, author, publisher, book_url, cost, book_img, book_date, book_public, userid, cateid) values("' .$this->GetTitle(). '", "' .$this->GetAuthor(). '", "' .$this->GetPublisher(). '", "' .$this->GetUrl(). '", ' .$this->GetCost(). ', "' .$this->GetImg(). '", ' .$this->GetDate(). ', "' .$this->GetPublic(). '", ' .$this->GetUserid(). ', ' .$this->GetCateid(). ')';
            $this->_query($sql);
            return true;
        }
    }
    function Infobook($bookid) {
        if(is_numeric($bookid)) {
            $sql = 'select *,round((total_rate/views_rate),0) as diem from books where bookid ='.$bookid;
            $this->_query($sql);
            $data = $this->_fecth();
            $this->bookid = $data["bookid"];
            $this->title = $data["book_title"];
            $this->img = $data["book_img"];
            $this->cost = $data["cost"];
            $this->url = $data['book_url'];
            $this->date = $data["book_date"];
            $this->author = $data["author"];
            $this->publisher = $data["publisher"];
            $this->public = $data["book_public"];
            $this->cateid = $data["cateid"];
            $this->total_rate = $data["total_rate"];
            $this->views_rate = $data["views_rate"];
            $this->diem = $data["diem"];
            return true;
        }
        return false;
    }
    function Delbook($bookid) {
        if(!$this->Infobook($bookid)) {
            return false;
        }else {
            $sql = 'delete from books where bookid ='.$bookid;
            $this->_query($sql);
            unlink('file/'.$this->url);
            if($this->img != 'default.jpg') {
                unlink('images/'.$this->img);
            }
            return true;
        }
    }
    function Updatebooks($title, $img, $url, $author, $publisher, $date, $cateid, $public, $bookid) {
        $this->SetTitle($title);
        if($this->img != 'default.jpg') {
            unlink('images/'.$this->img);
        }
        $this->SetImg($img);
        if(!empty($url)) {
            unlink('file/'.$this->url);
            $this->SetUrl($url);
        }
        $this->SetAuthor($author);
        $this->SetPublisher($publisher);
        $this->SetDate($date);
        $this->SetPublic($public);
        $this->SetCateid($cateid);
        if(!empty($this->error)) {
            return false;
        }else {
            if(empty($this->img)) {
                move_uploaded_file($_FILES["txtUrl"]["tmp_name"], 'file/'.$this->GetUrl());
            }else {
                move_uploaded_file($_FILES["txtImg"]["tmp_name"], 'images/'.$this->GetImg());
                move_uploaded_file($_FILES["txtUrl"]["tmp_name"], 'file/'.$this->GetUrl());
            }
            $sql = 'update books set book_title = "' .$this->title. '" , book_img = "' .$this->img. '" , book_url = "' .$this->url. '" , author = "' .$this->author. '", publisher = "' .$this->publisher. '", book_date = "' .$this->date. '", book_public = "' .$this->public. '", cateid = ' .$this->cateid. ' where bookid ='.$bookid;
            $this->_query($sql);
            return true;
        }
    }
    function titlecate($cateid) {
        global $limit;
        $sql_cate = 'SELECT cate_title FROM category WHERE cateid = ' .$cateid;
        $this->_query($sql_cate);
        if(!$this->_numrow()){
            return false;
        }else {
            $item = $this->_fecth();
            return $this->noneUniAlias($item['cate_title'],true);
        }
    }
    function CateXML($cateid) {
        global $limit;
        $sql_cate = 'SELECT cate_title FROM category WHERE cateid = ' .$cateid;
        $this->_query($sql_cate);
        $item = $this->_fecth();
        $sql = 'SELECT *,round((total_rate/views_rate),0) as diem FROM books WHERE book_public="Y" and cateid = ' .$cateid .' ORDER BY bookid DESC';
        $this->_query($sql);
        $this->WriteXLM($this->noneUniAlias($item['cate_title'],true),$limit);
    }
    function Checkid($id) {
        global $home_limit;
        $sql = 'SELECT bookid FROM books WHERE book_public="Y" ORDER BY bookid DESC LIMIT 0, '.$home_limit;
        $this->_query($sql);
        while($item = $this->_fecth()) {
            if($item['bookid'] == $id) {
                $this->HomeXML();
                break;
            }
        }
    }
    function HomeXML() {
        global $home_limit;
        $sql = 'SELECT *,round((total_rate/views_rate),0) as diem FROM books WHERE book_public="Y" ORDER BY bookid DESC LIMIT 0, '.$home_limit;
        $this->_query($sql);
        $this->WriteXLM('home',$home_limit);
    }
    function WriteXLM($file,$limit) {
        $xml = new DOMDocument('1.0', 'utf-8');
        $book = $xml->createElement('BOOK');
        $xml->appendChild($book);
        $page = $xml->createElement('PAGE');
        $book->appendChild($page);
        $stt = 0;
        while($data = $this->_fecth()) {
            if($stt%$limit == 0 && $stt != 0){
                $page = $xml->createElement('PAGE');
                $book->appendChild($page);
            }
            $item = $xml->createElement('ITEM');
            $page->appendChild($item);
            $id = $xml->createAttribute('id');
            $item->appendChild($id);
            $id_val = $xml->createTextNode($data["bookid"]);
            $id->appendChild($id_val);
            $cid = $xml->createAttribute('cid');
            $item->appendChild($cid);
            $cid_val = $xml->createTextNode($data["cateid"]);
            $cid->appendChild($cid_val);
            
            
            $title = $xml->createElement('TITLE');
            $item->appendChild($title);
            $title_val = $xml->createTextNode(htmlspecialchars($data["book_title"]));
            $title->appendChild($title_val);
            
            $img = $xml->createElement('IMG');
            $item->appendChild($img);
            $img_val = $xml->createTextNode($data["book_img"]);
            $img->appendChild($img_val);
            
            $cost = $xml->createElement('COST');
            $item->appendChild($cost);
            $cost_val = $xml->createTextNode($data["cost"]);
            $cost->appendChild($cost_val);
            
            if(empty($data["author"])) {
                $tam = 'Không xác định';
            } else {
                $tam = htmlspecialchars($data["author"]);
            }
            $author = $xml->createElement('AUTHOR');
            $item->appendChild($author);
            $author_val = $xml->createTextNode($tam);
            $author->appendChild($author_val);
            
            if(empty($data["publisher"])) {
                $tam = 'Không xác định';
            } else {
                $tam = htmlspecialchars($data["publisher"]);
            }
            $publisher = $xml->createElement('PUBLISHER');
            $item->appendChild($publisher);
            $publisher_val = $xml->createTextNode($tam);
            $publisher->appendChild($publisher_val);
            
            if(empty($data["book_date"])) {
                $tam = 'Không xác định';
            } else {
                $tam = $data["book_date"];
            }
            $date = $xml->createElement('DATE');
            $item->appendChild($date);
            $date_val = $xml->createTextNode($tam);
            $date->appendChild($date_val);
            
            if(empty($data["diem"])) {
                $tam = 0;
            } else {
                $tam = $data["diem"];
            }
            $score = $xml->createElement('SCORE');
            $item->appendChild($score);
            $score_val = $xml->createTextNode($tam);
            $score->appendChild($score_val);
            
            $votes = $xml->createElement('VOTES');
            $item->appendChild($votes);
            $votes_val = $xml->createTextNode($data["views_rate"]);
            $votes->appendChild($votes_val);
            $stt++;
        }
        
        if($file != 'home') {
            $tp = ceil($stt/$limit);
            $total_page = $xml->createElement('TP');
            $book->appendChild($total_page);
            $total_page_val = $xml->createTextNode($tp);
            $total_page->appendChild($total_page_val);
        }
        
        $xml->formatOutput = true;
        $xml->save('cache/' .$file. '.xml');
    }
    function Rating($rate, $id) {
        if($this->Infobook($id)) {
            $sql = 'UPDATE books SET total_rate = '.($this->GetTotal()+$rate).', views_rate = '. ($this->GetView()+1) .' WHERE bookid = '.$id;
            $this->_query($sql);
            return true;
        }
    }
    function SearchBook ($order) {
        $sql = 'SELECT * FROM books WHERE book_public="Y" and book_title like "%'.$order.'%"';
        $this->_query($sql);
        if(!$this->_numrow()){
            return false;
        }else {
            while($data = $this->_fecth()) {
                $item[] = $data;
            }
            return $item;
        }
    }
}
?>