<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>A100 Admin Page</title>
		<link href="public_html/css/bootstrap.css" rel="stylesheet">
		<link href="public_html/css/signin.css" rel="stylesheet">
		<link href="public_html/css/form.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,800italic,300italic,600italic,400,300,600,700,800|Montserrat:400,700' rel='stylesheet' type='text/css'>
    	<link href="public_html/css/font-awesome.min.css" rel="stylesheet">

	</head>

	<body>

		<div class="container-fluid">
			<div class="row">
				<h1>Admin Functionality</h1>
			</div>
		</div>

		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
					<?php include "admin/db_conn.php" ?>

					<?php include 'resources/select.php' ?>
				</div>
			</div>
		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="public_html/js/bootstrap.js"></script>

	</body>

</html>
