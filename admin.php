<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>A100 Admin Page</title>
		<link href="public_html/css/bootstrap.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,800italic,300italic,600italic,400,300,600,700,800|Montserrat:400,700' rel='stylesheet' type='text/css'>
    	<link href="public_html/css/font-awesome.min.css" rel="stylesheet">

	</head>

	<body>
		<h2>A100 Applications-Admin</h2>
		<form action="resources/Administrator/CSV_Export.php" method="post" name="export_excel">
			<div class="control-group">
				<div class="controls">
					<button type="submit" id="export" name="export" class="btn btn-primary button-loading" data-loading-text="Loading...">Export to CSV</button>
				</div>
			</div>
		</form>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead id="AppHeader">
				</thead>
				<tbody id="AppBody">
				</tbody>
			</table>
		</div>
		<div class>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="public_html/js/bootstrap.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="public_html/js/adminTable.js" type="text/javascript"></script>

	</body>

</html>
