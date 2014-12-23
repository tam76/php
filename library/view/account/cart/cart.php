<?php
// Gọi phần header của giao diện
include("templates/header.php");
$error = array(); 
$book->_CheckError($error);
echo ' <form name="fCart" action ="'.$_SERVER["REQUEST_URI"].'" method="post">';
$stt =1;
if(empty($cart)){
    echo 'Chưa có cuốn sách nào dc thêm';
} else {
    foreach($cart as $key=>$item){
        $data = json_decode($item);
        $xml = simplexml_load_file('cache/' .$book->titlecate($data->cid). '.xml');
        $tp = $xml->TP;
        for($i=0;$i<$tp;$i++) {
            $bookPage = $xml->PAGE[$i];
            $bookSet = $bookPage->ITEM;
            foreach ($bookSet as $bookitem){
                if($bookitem[0]['id'] == $data->id) {
                    $img = $bookitem->IMG;
                    $title = $bookitem->TITLE;
                    $gia = $bookitem->COST;
                }
            }
        }
        echo '
        <div class="news">
            <h1>' .$title. '</h1>
            <a href = "#" class="tip_trigger" title = "'.$title.'" ><img src="images/' .$img. '" title = "'.$title.'" alt = "'.$title.'" class="thumbs" />   
            <div class="tip" >
                <strong style="color:white;">'.$title.'</strong>
                <div class="bgtip"> 
                    <b>Thông tin sách:</b><br />
                    - Tác giả : '.$bookitem->AUTHOR.'<br />
        			- Nhà xuất bản : '.$bookitem->PUBLISHER.'<br />
        			- Năm xuất bản : '.$bookitem->DATE.'<br />
        			Có '.$bookitem->VOTES.' lượt bình chọn<br />
        			<div class="exemple4" data-average="'.$bookitem->SCORE.'" ></div>
                </div>
            </div>
            </a>
            <input type="hidden" name = "id'.$stt.'" value=\''.$item.'\' />
            <label class ="form_label">';
            if($gia==0) {
                echo "miễn phí";
            } else {
                echo $gia.'.000VNĐ/tuần';
            }echo
            '</label>
            <input type="text" maxlength="1" class = "soluong" name = "txttg'.$stt.'" value="1" />Tuần<br />
            <input type="hidden" name = "key" value="'.$key.'" />
            <a href="#" class="delbook">Xóa giỏ sách</a>
            <div class="clearfix"></div>
        </div>';
        $stt++;
    }
    echo '
    <script type="text/javascript">
    	$(document).ready(function(){
    		$(".exemple4").jRating({
        	  isDisabled : true
        	});
    	});
    </script>';
    $_SESSION["stt"]=$stt;
}
if(!empty($_SESSION['nid'])){
    echo '
    <input type="submit" name="btntest" value="Thêm sách" class="button" />';
}
echo '</form>';
// Gọi phần footer của giao diện
include("templates/footer.php");

?>