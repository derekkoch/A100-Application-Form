<?php

	include "cred_int.php";

	$appCon = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_APP_DATABASE);

	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$applicationSql="SELECT * FROM applications   
	INNER JOIN applicants ON applications.applicant_id=applicants.applicant_id 
	INNER JOIN identity ON applications.identity_id=identity.identity_id
	INNER JOIN referrals ON applications.referral_id=referrals.referral_id
	INNER JOIN schedules ON applications.schedule_id=schedules.schedule_id
	INNER JOIN experiences ON applications.experience_id=experiences.experience_id
	INNER JOIN materials ON applications.material_id=materials.material_id";

	$result = mysqli_query($appCon, $applicationSql);
   
	$filename = 'Applicants.csv';
	$CSVFile = fopen('php://output', 'w'); 

	$fieldArray=array();
	while($applicationField = mysqli_fetch_field($result))
	{
		$fName = $applicationField->name;
		array_push($fieldArray, $fName);
	}

	$UniqueField = array_unique($fieldArray);
    // loop over the input array
    fputcsv($CSVFile, $UniqueField, ',');
    foreach ($result as $line) { 
        // generate csv lines from the inner arrays
        fputcsv($CSVFile, $line, ','); 
    }
	header('Content-Type: application/csv');
    header('Content-Disposition: attachement; filename="'.$filename.'";');

	mysqli_close($con);

?>