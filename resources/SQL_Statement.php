<?php
	
	function ExportCSVStatement() {
		$statement = "SELECT * FROM applications   
		INNER JOIN applicants ON applications.applicant_id=applicants.applicant_id 
		INNER JOIN identity ON applications.identity_id=identity.identity_id
		INNER JOIN referrals ON applications.referral_id=referrals.referral_id
		INNER JOIN schedules ON applications.schedule_id=schedules.schedule_id
		INNER JOIN experiences ON applications.experience_id=experiences.experience_id
		INNER JOIN materials ON applications.material_id=materials.material_id";

		return $statement;
	}

?>