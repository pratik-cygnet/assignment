<?php
include_once "header.php";
// core.php holds pagination variables
include_once 'config/core.php';
 
include_once 'objects/user.php';
 
$user = new User($db);
 
// query users
$stmt = $user->readAll($page, $from_record_num, $records_per_page);
 
$page_url = "index.php?";
 
// count total rows - used for pagination
$total_rows=$user->countAll();
 
// read_template.php controls how the user list will be rendered
include_once "read_template.php";
 
// footer.php holds our javascript and closing html tags
include_once "footer.php";
?>