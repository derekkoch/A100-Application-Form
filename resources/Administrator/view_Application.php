<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>A100 Admin Page</title>
		<link href="../../public_html/css/bootstrap.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,800italic,300italic,600italic,400,300,600,700,800|Montserrat:400,700' rel='stylesheet' type='text/css'>
    	<link href="../../public_html/css/font-awesome.min.css" rel="stylesheet">

	</head>

	<body>
		<h2>A100 Applications-Admin</h2>
		<div class="container-fluid">

			<?php
				include "fieldreplace.php";
				include "ViewApplication_SQL.php";
				include "../../admin/db_conn.php";

				try{
					if(empty($_GET)) throw new Exception("No Application ID");
					$dbh = dbconn();
					$applicationSql=$dbh->prepare(getApplication());
					$applicationSql->bindValue(1, $_GET["application_id"], PDO::PARAM_INT);
					$applicationSql->execute();
					$Appresult = $applicationSql->fetchAll(PDO::FETCH_ASSOC);
					foreach ($Appresult[0] as $key => $value) {
						echo $key.": ".replaceField($key, $value)."<br/>"; 
					}

				} catch(PDOException $e){
					echo "Connection Failed:  ".$e->getMessage();
				} catch (Exception $e){
					echo $e->getMessage();
				} finally {
					$dbh=null;
				}

			?>
		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="../../public_html/js/bootstrap.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

	</body>

</html>
