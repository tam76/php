<?php

$user = new Model_User_User;
$book = new Model_Books_Books;
session_start();
if(isset($_POST["btntest"])) {
    if(!isset($_SESSION[PREFIX."userid"])) {
        $book->SetError('Vui lòng đăng nhập');
    }else {
        $list=array();
        $bookcase= array();
        if(!empty($_SESSION[PREFIX."bookcase"])) {
            $bookcase = json_decode($_SESSION[PREFIX."bookcase"]);
            foreach($bookcase as $key => $data) {
                if($data->date < time()){
                    unset($bookcase[$key]);
                }else {
                    unset($bookcase[$key]);
                    $bookcase[] = $data;
                    $list[]=$data->id;
                }
            }
        }
        $sum = 0;
        for($i=1;$i<$_SESSION["stt"];$i++) {
            if(isset($_POST["id".$i]) && isset($_POST["txttg".$i]) && is_numeric($_POST["txttg".$i])) {
                $id = json_decode($_POST["id".$i]);
                $sl = $_POST["txttg".$i];
                $xml = simplexml_load_file('cache/' .$book->titlecate($id->cid). '.xml');
                $tp = $xml->TP;
                for($j=0;$j<$tp;$j++) {
                    $bookPage = $xml->PAGE[$j];
                    $bookSet = $bookPage->ITEM;
                    foreach ($bookSet as $bookitem){
                        if($bookitem[0]['id'] == $id->id) {
                            $title = $bookitem->TITLE;
                            $gia = $bookitem->COST;
                        }
                    }
                }
                if(in_array($id->id,$list)){
                    $book->SetError('Bạn đã mượn trùng cuốn '.$title);
                }elseif($sl > 9) {
                    $book->SetError('Sách đăng kí mượn không quá 9 tuần');
                    break;
                }else {
                    $sum = $sum + ($gia * $sl) ;
                    $item = array('id'=>$id->id,"date"=>time()+($sl*604800));
                    $array[] = $item;
                }
            }
        }
        if($sum > $_SESSION[PREFIX."property"]) {
            $book->SetError('Bạn không đủ tiền trong tài khoản');
        }elseif (!empty($array)) {
            $addbook = array_merge($bookcase,$array);
            $_SESSION[PREFIX."bookcase"] = json_encode($addbook);
            $_SESSION[PREFIX."property"] = $_SESSION[PREFIX."property"] - ($gia * $sl);
            if($user->BuyBook($_SESSION[PREFIX."bookcase"],$_SESSION[PREFIX."property"],$_SESSION[PREFIX."userid"])) {
                unset($_SESSION["nid"]);
                unset($_SESSION["stt"]);
            }
        }
    }
}
if(!isset($_SESSION['nid'])) {
    $cart = '';
}else {
    $cart = $_SESSION['nid'];
}
if(isset($_POST["newid"]) && !empty($_POST["newid"])) {
    if(!in_array($_POST["newid"],$cart)) {
        $array = json_decode($_POST["newid"]);
        if(is_numeric($array->cid) && is_numeric($array->id) && is_string($book->titlecate($array->cid))) {
            $xml = simplexml_load_file('cache/' .$book->titlecate($array->cid). '.xml');
            $tp = $xml->TP;
            for($i=0;$i<$tp;$i++) {
                $bookPage = $xml->PAGE[$i];
                $bookSet = $bookPage->ITEM;
                foreach ($bookSet as $bookitem){
                    if($bookitem[0]['id'] == $array->id) {
                        $_SESSION['nid'][]= $_POST["newid"];
                    }
                }
            }
        }
    }
}
if (isset($_POST["keys"]) && is_numeric($_POST["keys"])) {
    unset($_SESSION['nid'][$_POST["keys"]]);
}
include("view/account/cart/cart.php");
?>