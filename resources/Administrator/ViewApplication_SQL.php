<?php

	function getApplication(){
		$SQL = "SELECT users.user_id, users.first_name, users.last_name, users.email, applicants.major, 
		applicants.school_id, applicants.graduation_date, applicants.street_address, applicants.city, applicants.state_id,
		applicants.zipcode, applicants.phone_number, applicants.linkedin, applicants.portfolio, applicants.age_check,
		applicants.legal_status, schedules.weekly_hours, schedules.commitments, experiences.programming_option,
		experiences.work_option, experiences.job_title, experiences.front_end_experience, experiences.lamp_stack_experience,
		experiences.mobile_experience, experiences.cms_experience, experiences.other_experience, 
		referrals.referral_1, referrals.referral_2, referrals.referral_3, referrals.referral_4, referrals.referral_5,
		referrals.referral_6, referrals.referral_7, referrals.referral_8, referrals.referral_9, referrals.referral_10,
		referrals.referral_11,
		materials.additional_info,
		applications.is_complete
		FROM applications
		INNER JOIN applicants ON applications.applicant_id=applicants.applicant_id
		INNER JOIN users ON applicants.user_id=users.user_id
		INNER JOIN referrals ON applications.referral_id=referrals.referral_id
		INNER JOIN schedules ON applications.schedule_id=schedules.schedule_id
		INNER JOIN experiences ON applications.experience_id=experiences.experience_id
		INNER JOIN materials ON applications.material_id=materials.material_id
		WHERE applications.applicant_id= ?";

		return $SQL;
	}

	function retrieveFields(){
		$SQL = "SELECT q_option_id, field_name, option_name FROM question_options";

		return $SQL;
	}

?>