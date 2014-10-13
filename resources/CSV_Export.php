<?php

	include "db_conn.php";
	include "SQL_Statement.php";

	try{
		$dbh = dbconn();
		$dbh->exec("use applications_db");
		$filename = 'Applicants.csv';
		$CSVFile = fopen('php://output', 'w'); 
		$applicationSql=$db->prepare(ExportCSVStatement());
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