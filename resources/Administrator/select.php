<?php

	include "AdminPage_SQL.php";
	include "../../admin/db_conn.php";

	try{
		$dbh = dbconn();
		$applicationSql=$dbh->prepare(AdminTableSQL());
		$applicationSql->execute();
		$result = $applicationSql->fetchAll(PDO::FETCH_ASSOC);
		if(empty($result)){
			throw new Exception("<p>No applications in database.</p>");
		}
		echo json_encode($result, JSON_PRETTY_PRINT);

	} catch(PDOException $e){
		echo "Connection Failed:  ".$e->getMessage();
	} catch (Exception $e){
		echo $e->getMessage();
	} finally {
		$dbh=null;
	}
?>