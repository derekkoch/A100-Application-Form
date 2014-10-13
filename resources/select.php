<?php

	include "SQL_Statement.php";
	include "./admin/db_conn.php";

	try{

		$dbh = dbconn();

		$applicationSql=$dbh->prepare(AdminTableSQL());
		$applicationSql->execute();
		$result = $applicationSql->fetchAll(PDO::FETCH_ASSOC);
		$header = true;
		echo "<table border='1'>";
		if(empty($result)){
			throw new Exception("<p>No applications in database.</p>");
		}
		foreach ($result as $row) {
			if($header){
				echo "<tr>";
				$ColumnFields = array_unique(array_keys($row));
				foreach($ColumnFields as $field){
					echo "<th>".$field."</th>";
				}
				echo "</tr>";
				$header = false;
			}
			echo "<tr>";
			$ValueField = $row;
			foreach($ValueField as $Column => $Value){
				if($Column == 'is_complete'){
					if($Value){
						echo "<td>Complete</td>";
					} else {
						echo "<td>Incomplete</td>";
					}
				} else {
					echo "<td>".$Value."</td>";
				}
			}
		}
	} catch(PDOException $e){
		echo "Connection Failed:  ".$e->getMessage();
	} catch (Exception $e){
		echo $e->getMessage();
	} finally {
		$db = null;
	}
?>