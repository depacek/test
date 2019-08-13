<?php
require_once "object.php";
 $comment->set('id',$_GET['id']);
 $comment->remove();
 header('location:comment.php');

?>