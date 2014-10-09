<?php

	include "cred_int.php";
	include "SQL_Statement.php";

	try{
		$db = new PDO("mysql:dbname=".DB_APP_DATABASE.";host=".DB_HOST, DB_USERNAME, DB_PASSWORD);
		$filename = 'Applicants.csv';
		$CSVFile = fopen('php://output', 'w'); 
		$applicationSql=$db->prepare(ExportCSVSql());
		$applicationSql->execute();
		$result = $applicationSql->fetchAll(PDO::FETCH_ASSOC);
		$header = true;
		if(!empty(result)){
			foreach ($result as $row) {
				if($header){
					$ColumnFields = array_unique(array_keys($row));
					fputcsv($CSVFile, $ColumnFields, ',');
					$header = false;
				}
				fputcsv($CSVFile, $row, ',');
			}
			$db = null;
			header('Content-Type: application/csv');
	    	header('Content-Disposition: attachement; filename="'.$filename.'";');
		}
	} catch(PDOException $e){
		echo "Connection Failed:  ".$e->getMessage();
	}
?>