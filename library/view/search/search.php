<?php
// Gọi phần header của giao diện
require("templates/header.php");
$error = array();
if ($book->_CheckError($error)) {
    foreach($book->SearchBook($search) as $item) {
        $id = $item['bookid'];
        $cid = $item['cateid'];
        $tam = array('id'=> "$id","cid"=>"$cid");
        $json = json_encode($tam);
        echo '
        <div class="news">
            <h1>' .htmlspecialchars($item['book_title']). '</h1>
            <img src="images/' .$item['book_img']. '" class="thumbs" />
            <label class ="form_label">';
            if($item['cost']==0) {
                echo "miễn phí";
            } else {
                echo $item['cost'].'.000VNĐ/tuần';
            }echo
            '</label>
            <input type="hidden" class="info" value=\''.$json.'\' />
            <a href="#" class="addbook">Thêm giỏ sách</a>
            <div class="clearfix"></div>
        </div>';
    }
}
// Gọi phần footer của giao diện
require("templates/footer.php");

?>