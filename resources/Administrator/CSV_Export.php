<?php

	include "AdminPage_SQL.php";
	include "../../admin/db_conn.php";

	try{
		$dbh = dbconn();
		$filename = 'Applicants.csv';
		$CSVFile = fopen('php://output', 'w'); 
		$applicationSql=$dbh->prepare(ExportCSVStatement());
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
				if($row['is_complete']){
					$row['is_complete'] = "Complete";
				} else {
					$row['is_complete'] = "Incomplete";
				}
				fputcsv($CSVFile, $row, ',');
			}
			header('Content-Type: application/octet-stream');
	    	header('Content-Disposition: attachement; filename="'.$filename.'";');
	    	header("Pragma: no-cache");
		}
	} catch(PDOException $e){
		echo "Connection Failed:  ".$e->getMessage();
	} finally {
		$dbh = null;
	}
?>