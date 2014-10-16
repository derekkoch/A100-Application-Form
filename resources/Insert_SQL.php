<?php
	function findDupSQL(){
		$statement = "SELECT users.email, applications.is_complete
		FROM applications 
		INNER JOIN applicants ON applications.applicant_id = applicants.applicant_id
		INNER JOIN users ON applicants.user_id = users.user_id 
	 	WHERE users.email=:email  AND applications.is_complete = TRUE";

	 	return $statement;
	}

	function getReqFields(){
		$statement = "SELECT field_name FROM fields WHERE is_required = TRUE";

	 	return $statement;
	}
?>