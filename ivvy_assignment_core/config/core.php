<?php
$base_url = "http://localhost:8088/ivvy_assignment_core/";
// page given in URL parameter, default page is one
$page = isset($_GET['page']) ? $_GET['page'] : 1; 
 
// set number of records per page
$records_per_page = 5;
 
// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;
?>