<?php
if(isset($_POST['action']))
{
    require('config.php');
	if(htmlentities($_POST['action'], ENT_QUOTES, 'UTF-8') == 'rating' && is_numeric($_POST['idBox']) && is_numeric($_POST['rate']) && $_POST['rate'] <=20)
	{
		$id = intval($_POST['idBox']);
		$rate = floatval($_POST['rate']);
        $book = new Model_Books_Books;
        $book->Rating($rate,$id);
	}
}
?>