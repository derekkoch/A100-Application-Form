<?php

	function replaceField($key, $value){

		try{
			$dbh = dbconn();
			$fields=$dbh->prepare(retrieveFields());
			$fields->execute();
			$fieldresult = $fields->fetchAll(PDO::FETCH_ASSOC);

			foreach ($fieldresult as $row) {
				if($row["field_name"]=== $key && $row["q_option_id"] === $value){
					return $row["option_name"];
				}
			}

		} catch(PDOException $e){
			echo "Connection Failed:  ".$e->getMessage();
		} catch (Exception $e){
			echo $e->getMessage();
		} finally {
			$dbh=null;
		}

		return $value;
	}
?>