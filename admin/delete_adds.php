<?php
 require_once "object.php";
 $adds->set('id',$_GET['id']);
 $adds->remove();
 header('location:list_adds.php');
?>