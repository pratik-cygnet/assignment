<?php
error_reporting(-1);
ini_set('display_errors', 1);
// get database connection
include_once 'config/database.php';

$database = new Database();
$db = $database->getConnection();

?>
<!DOCTYPE html>
<html>
	<head>
		<title>IVvy Assignment</title>
			<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css">
			<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	</head>

<body>
<div class="container">

		<div class="row">
		    <div class="col-lg-12 margin-tb">					
		        <div class="pull-left">
		            <h2>IVvy Assignment</h2>
		        </div>