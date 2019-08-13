<?php
require_once "object.php";
 $news->set('id',$_GET['id']);
 $news->remove();
 header('location:list_news.php');

?>