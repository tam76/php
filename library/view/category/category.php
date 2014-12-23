<?php
session_start();
// Gọi phần header của giao diện
require("templates/header.php");
$error = array(); 
$book->_CheckError($error);
// Lấy tất cả các bản tin
if(isset($xml)) {
    $bookPage = $xml->PAGE[$page];
    if(empty($bookPage)) {
        $book->SetError('Danh mục hiện đang trống');
    }else {
        $bookSet = $bookPage->ITEM;
        $tp = $xml->TP;
        foreach ($bookSet as $bookitem) {
            // Nếu những tin nằm trong đoạn cần show thì mới show
            //$nid = $newsitem["nid"];
            $bid = $bookitem[0]['id'];
            $cid = $bookitem[0]['cid'];
            $title = $bookitem->TITLE[0];
            $img = $bookitem->IMG[0];
            $gia = $bookitem->COST;
            $data = array('id'=> "$bid","cid"=>"$cid");
            $json = json_encode($data);
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
                <label class ="form_label">';
                if($gia==0) {
                    echo "miễn phí";
                } else {
                    echo $gia.'.000VNĐ/tuần';
                }echo
                '</label>
                <input type="hidden" class="info" value=\''.$json.'\' />
                <a href="#" class="addbook">Thêm giỏ sách</a>
                <div class="clearfix"></div>
            </div>';
        }
        echo '
        <script type="text/javascript">
        	$(document).ready(function(){
        		$(".exemple4").jRating({
            	  isDisabled : true
            	});
        	});
        </script>';
        $paging->renderNavBar($pagePerSegment, 'danh-muc/' .$id. '-' .$CSDL->noneUniAlias($cate_title, true), null, $tp);
        echo $paging->getNavBar();
    }
}

// Thanh phân trang

//echo $paging->PageList($_GET['page'],$tp,$_GET['id']);

// Gọi phần footer của giao diện
require("templates/footer.php");

?>