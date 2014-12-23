<?php

include("templates/header.php");
$book->_CheckError();
$list=array();
$bookcase= array();
if(!empty($_SESSION[PREFIX."bookcase"])) {
    $bookcase = json_decode($_SESSION[PREFIX."bookcase"]);
    foreach($bookcase as $key => $data) {
        $book->Infobook($data->id);
        $tg = $data->date - time();
        $tuan = floor($tg/604800);
        $ngay = ceil(($tg%604800)/86400);
        echo '
        <div class="news">
            <a href="'.$_SERVER["PHP_SELF"].'?module=book&id='.$data->id.'"><h1>' .htmlspecialchars($book->GetTitle()). '</h1>
            <img src="images/' .$book->GetImg(). '" class="thumbs" /></a>
            <label class ="form_label">';
            if($tuan < 1 ) {
                echo "còn " .abs($ngay). " ngày";
            } else {
                echo "còn " .$tuan. " tuần, " .$ngay. " ngày";
            }echo
            '</label>';
            echo '
            <div class="exemple">
            	<div class="basic" data-average="';
                if($book->GetDiem() == 0) {
                    echo 0;
                }else {
                    echo $book->GetDiem();
                }
                echo '" data-id="'.$data->id.'"></div>
                <label class ="form_label">Có '.$book->GetView().' lượt bình chọn</label>
            </div>
            <div class="clearfix"></div>
        </div>';
    }
    echo '
	<script type="text/javascript">
		$(document).ready(function(){
			$(".basic").jRating();
		});
	</script>';
}else {
    echo ('Bạn chưa có cuốn sách nào trong tủ sách');
}
include("templates/footer.php");

?>