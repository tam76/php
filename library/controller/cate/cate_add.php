<?php 

$cate= new Model_Category_Category;
// Kiểm tra quyền admin
require('lib/check_manager.php');
// Sau khi nhấn nút btnCateAdd
if (isset($_POST["btnCateAdd"])) {
    if($cate->AddCategory($_POST["txtCate"])) {
        link('cache/'.$cate->noneUniAlias($cate->GetTitle()).'.xml','cache/'.$cate->noneUniAlias($cate->GetTitle()).'.xml');
        header("location: index.php?module=cate&action=list");
        exit();
    }
}
require('view/cate/cate_add.php');

?>