<?php

function Create_Db(){
	$statement = "CREATE DATABASE applications_db";
	return $statement;
}

function Drop_DB1(){
	$statement = "DROP DATABASE applications_db";
	return $statement;
}

function Drop_DB2(){
	$statement = "DROP DATABASE forms_db";
	return $statement;
}

function populateTables(){
	$statement = array(
		"INSERT INTO `cohorts` (`cohort_id`, `cohort_name`, `cohort_decription`, `cohort_is_active`) VALUES
		(NULL, 'Cohort 0 - Fall 2013', NULL, '0'), (NULL, 'Cohort 1 - Winter 2013/2014', NULL, '0'),
		(NULL, 'Cohort 2 - Spring 2014', NULL, '0'), (NULL, 'Cohort 3 - Summer 2014', NULL, '1'),
		(NULL, 'Cohort 4 - Fall 2014', NULL, '1'), (NULL, 'Cohort 5 - Winter 2014/2015', NULL, '1'),
		(NULL, 'Cohort 6 - Spring 2015', NULL, '1'), (NULL, 'Cohort 7 - Summer 2015', NULL, '1'),
		(NULL, 'Cohort 8 - Fall 2015', NULL, '1'), (NULL, 'Cohort 9 - Winter 2015/2016', NULL, '1')
		",
		"INSERT INTO `schools` (`school_id`, `name`, `school_is_active`) VALUES
		(NULL, 'Southern Connecticut State University', '1'),
		(NULL, 'University of New Haven', '1'),
		(NULL, 'Yale University', '1'),
		(NULL, 'Quinnipiac University', '1'),
		(NULL, 'University of Connecticut', '1')
		",
		"INSERT INTO `sections` (`section_id`, `section_name`, `section_description`, `arrange`, `section_is_active`) VALUES
		(NULL, 'Identity', NULL, '1', '1'),
		(NULL, 'Personal Details', NULL, '2', '1'),
		(NULL, 'Referrals', 'How did you find out about this program?', '3', '1'),
		(NULL, 'Schedule Information', NULL, '4', '1'),
		(NULL, 'Technical Experience', NULL, '5', '1'),
		(NULL, 'Supplemental Materials', 'We ask for a resume, cover letter, and references from at least 2 people who can attest to your suitability to work as a software developer. If you don''t yet have a resume or cover letter, feel free to submit without them for now, but make sure to complete your application by e-mailing them to krishna@indie-soft.com within TWO days of your submission.', '6', '1')
		",
		"INSERT INTO `states` (`state_id`, `name`) VALUES
		(NULL, 'Alabama'),
		(NULL, 'Alaska'),
		(NULL, 'Arizona'),
		(NULL, 'Arkansas'),
		(NULL, 'California'),
		(NULL, 'Colorado'),
		(NULL, 'Connecticut'),
		(NULL, 'Delaware'),
		(NULL, 'District of Columbia'),
		(NULL, 'Florida'),
		(NULL, 'Georgia'),
		(NULL, 'Hawaii'),
		(NULL, 'Idaho'),
		(NULL, 'Illinois'),
		(NULL, 'Indiana'),
		(NULL, 'Iowa'),
		(NULL, 'Kansas'),
		(NULL, 'Kentucky'),
		(NULL, 'Louisiana'),
		(NULL, 'Maine'),
		(NULL, 'Maryland'),
		(NULL, 'Massachusetts'),
		(NULL, 'Michigan'),
		(NULL, 'Minnesota'),
		(NULL, 'Mississippi'),
		(NULL, 'Missouri'),
		(NULL, 'Montana'),
		(NULL, 'Nebraska'),
		(NULL, 'Nevada'),
		(NULL, 'New Hampshire'),
		(NULL, 'New Jersey'),
		(NULL, 'New Mexico'),
		(NULL, 'New York'),
		(NULL, 'North Carolina'),
		(NULL, 'North Dakota'),
		(NULL, 'Ohio'),
		(NULL, 'Oklahoma'),
		(NULL, 'Oregon'),
		(NULL, 'Pennsylvania'),
		(NULL, 'Rhode Island'),
		(NULL, 'South Carolina'),
		(NULL, 'South Dakota'),
		(NULL, 'Tennessee'),
		(NULL, 'Texas'),
		(NULL, 'Utah'),
		(NULL, 'Vermont'),
		(NULL, 'Virginia'),
		(NULL, 'Washington'),
		(NULL, 'West Virginia'),
		(NULL, 'Wisconsin'),
		(NULL, 'Wyoming')
		",
		"INSERT INTO `fields` (`field_id`, `field_name`, `field_description`, `pre_text`, `inside_text`, `post_text`, `section_id`, `inner_arrange`, `options_target`, `is_required`, `field_is_active`, `response_target`) VALUES
		(NULL, 'first_name', NULL, 'Name', NULL, 'First Name', '1', '1', NULL, '1', '1', 'identity'),
		(NULL, 'last_name', NULL, NULL, NULL, 'Last Name', '1', '1', NULL, '1', '1', 'identity'),
		(NULL, 'email', NULL, 'Email', 'Use the email address you check most frequently, as this will be how we notify you of acceptance into the program.', NULL, '1', '3', NULL, '1', '1', 'identity'),
		(NULL, 'password', NULL, 'Password', NULL, NULL, '1', '3', 'password', '1', '1', 'identity'),
		(NULL, 'school_id', NULL, 'Please list your most recent educational institution, your major, and the date of your graduation (or anticipated graduation).', 'Select School', 'School', '2', '1', 'schools', '1', '1', 'applicants'),
		(NULL, 'major', NULL, NULL, NULL, 'Major', '2', '1', NULL, '1', '1', 'applicants'),
		(NULL, 'graduation_date', NULL, NULL, '[Month], [Year]', 'Graduation Date', '2', '1', NULL, '1', '1', 'applicants'),
		(NULL, 'street_address', NULL, 'Address', NULL, 'Street Address', '2', '5', NULL, '1', '1', 'applicants'),
		(NULL, 'city', NULL, NULL, NULL, 'City', '2', '6', NULL, '1', '1', 'applicants'),
		(NULL, 'state', NULL, NULL, NULL, 'State', '2', '7', 'states', '1', '1', 'applicants'),
		(NULL, 'zipcode', NULL, NULL, NULL, 'Zip Code', '2', '8', NULL, '1', '1', 'applicants'),
		(NULL, 'phone_number', NULL, 'Mobile Phone', '(###) ###-####', NULL, '2', '9', NULL, '1', '1', 'applicants'),
		(NULL, 'linkedin', NULL, 'LinkedIn Profile', 'No LinkedIn profile? Write NONE', NULL, '2', '10', NULL, '1', '1', 'applicants'),
		(NULL, 'portfolio', NULL, 'Link to Online Portfolio of your work (e.g., GitHub, Bitbucket, Gitorious) or personal Website', 'No online portfolio? Write NONE', NULL, '2', '11', NULL, '1', '1', 'applicants'),
		(NULL, 'age_check', NULL, 'Are you 18 or older?', NULL, NULL, '2', '12', 'question_options', '1', '1', 'applicants'),
		(NULL, 'legal_status', NULL, 'I certify that I am a U.S. citizen, permanent resident, or a foreign national with authorization to work in the United States.', NULL, 'IMPORTANT: If you are a foreign student on an F-1 Visa or other student visa, please note it in the ADDITIONAL INFORMATION section at the bottom of the page. We are eager to work with international students on student visas of all types. Depending on your status, we can help counsel you on your pathway to an H1-B or similar visa type.', '2', '13', 'question_options', '1', '1', 'applicants'),
		(NULL, 'referral_1', NULL, NULL, NULL, NULL, '3', '1', 'question_options', '0', '1', 'referrals'),
		(NULL, 'referral_2', NULL, NULL, NULL, NULL, '3', '2', 'question_options', '0', '1', 'referrals'),
		(NULL, 'referral_3', NULL, NULL, NULL, NULL, '3', '3', 'question_options', '0', '1', 'referrals'),
		(NULL, 'referral_4', NULL, NULL, NULL, NULL, '3', '4', 'question_options', '0', '1', 'referrals'),
		(NULL, 'referral_5', NULL, NULL, NULL, NULL, '3', '5', 'question_options', '0', '1', 'referrals'),
		(NULL, 'referral_6', NULL, NULL, NULL, NULL, '3', '6', 'question_options', '0', '1', 'referrals'),
		(NULL, 'referral_7', NULL, NULL, NULL, NULL, '3', '7', 'question_options', '0', '1', 'referrals'),
		(NULL, 'referral_8', NULL, NULL, NULL, NULL, '3', '8', 'question_options', '0', '1', 'referrals'),
		(NULL, 'referral_9', NULL, NULL, NULL, NULL, '3', '9', 'question_options', '0', '1', 'referrals'),
		(NULL, 'referral_10', NULL, NULL, NULL, NULL, '3', '10', 'question_options', '0', '1', 'referrals'),
		(NULL, 'referral_11', NULL, NULL, NULL, NULL, '3', '11', 'question_options', '0', '1', 'referrals'),
		(NULL, 'weekly_hours', NULL, 'How many hours per week can you devote to A100 trainings and homework?', 'We expect at least a 10 hour per week commitment.', NULL, '4', '1', NULL, '1', '1', 'schedules'),
		(NULL, 'commitments', NULL, 'What are all of your unchangeable time commitments? Please include any classes you are taking, work schedules, vacations you plan to take, and important personal commitments, including both weekdays and WEEKENDS.', NULL, NULL, '4', '2', 'textarea', '1', '1', 'schedules'),
		(NULL, 'programming_option', NULL, 'How much programming experience do you have?', NULL, NULL, '5', '1', 'question_options', '1', '1', 'experiences'),
		(NULL, 'work_option', NULL, 'How much work experience do you have?', NULL, NULL, '5', '2', 'question_options', '1', '1', 'experiences'),
		(NULL, 'job_title', NULL, 'What was your last job title (or current, if you are still working there), and where?', NULL, NULL, '5', '3', NULL, '0', '1', 'experiences'),
		(NULL, 'front_end_experience', NULL, 'Explain your experience with front-end languages (HTML/CSS/JavaScript).', NULL, NULL, '5', '4', 'textarea', '1', '1', 'experiences'),
		(NULL, 'lamp_stack_experience', NULL, 'What is your experience relating to the LAMP (Linux, Apache, MySQL, PHP) application stack?', NULL, NULL, '5', '5', 'textarea', '1', '1', 'experiences'),
		(NULL, 'cms_experience', NULL, 'What is your experience with Content Management Systems (Drupal, Joomla, WordPress, etc.)?', NULL, NULL, '5', '6', 'textarea', '1', '1', 'experiences'),
		(NULL, 'mobile_experience', NULL, 'Explain your experience with mobile app development (Android, iOS, Windows Mobile).', NULL, NULL, '5', '7', 'textarea', '1', '1', 'experiences'),
		(NULL, 'other_experience', NULL, 'Other Relevant Experience', NULL, NULL, '5', '8', 'textarea', '0', '1', 'experiences'),
		(NULL, 'resume', NULL, 'Upload your resume with this filename format FIRSTNAME LASTNAME RESUME', NULL, 'We prefer PDF, ODF, or DOC.', '6', '1', 'file', '0', '1', 'materials'),
		(NULL, 'cover_letter', NULL, 'Upload a cover letter (250 words maximum) with this filename format: FIRSTNAME LASTNAME COVER LETTER', NULL, 'Your cover letter should address why you are applying for the A100 Program, why you would be a good candidate, and what got you interested in startups.', '6', '2', 'file', '0', '1', 'materials'),
		(NULL, 'reference_list', NULL, 'References', '(Example: Professor Jim Honeycutt, University of Northern Connecticut, honeycutt.j@unct.edu)', 'Please list the names of two people who can speak about your knowledge, experience, abilities, or skills. If you want a professor to be able to vouch for you, you must list them here, or by law, they cannot speak on your behalf.', '6', '3', 'textarea', '1', '1', 'materials'),
		(NULL, 'additional_info', NULL, 'Additional Information', NULL, 'Any other information you would like to include that you think might be helpful in considering your application', '6', '4', 'textarea', '0', '1', 'materials')
		",
		"INSERT INTO `question_options` (`q_option_id`, `field_name`, `option_name`, `option_description`, `input_type`, `arrange`, `option_is_active`) VALUES
		(NULL, 'age_check', 'Yes', NULL, 'radio', '1', '1'),
		(NULL, 'age_check', 'No', NULL, 'radio', '2', '1'),
		(NULL, 'legal_status', 'Yes', NULL, 'radio', '1', '1'),
		(NULL, 'legal_status', 'No', NULL, 'radio', '2', '1'),
		(NULL, 'referral_1', 'A100 Promo Video from Vimeo', NULL, 'checkbox', '1', '1'),
		(NULL, 'referral_2', 'A100 Program Manager', NULL, 'checkbox', '2', '1'),
		(NULL, 'referral_3', 'Career Fair', NULL, 'checkbox', '3', '1'),
		(NULL, 'referral_4', 'Information Session', NULL, 'checkbox', '4', '1'),
		(NULL, 'referral_5', 'Radio/TV Ad', NULL, 'checkbox', '5', '1'),
		(NULL, 'referral_6', 'Search Engine', NULL, 'checkbox', '6', '1'),
		(NULL, 'referral_7', 'On-Campus Flyer', NULL, 'checkbox', '7', '1'),
		(NULL, 'referral_8', 'Fellow Student', NULL, '', '8', '1'),
		(NULL, 'referral_9', 'Professor/Teacher at my University/School', NULL, '', '9', '1'),
		(NULL, 'referral_10', 'Member of the Independent Software Team', NULL, 'checkbox', '10', '1'),
		(NULL, 'referral_11', 'Other:', NULL, '', '11', '1'),
		(NULL, 'programming_option', 'None', NULL, 'radio', '1', '1'),
		(NULL, 'programming_option', 'I have taken >2 courses that use the same programming language.', NULL, 'radio', '2', '1'),
		(NULL, 'programming_option', 'I have built several projects on my own time, not for school.', NULL, 'radio', '3', '1'),
		(NULL, 'programming_option', 'I have little formal training in programming, but have taught myself the essentials and have worked on personal projects.', NULL, 'radio', '4', '1'),
		(NULL, 'work_option', 'None', NULL, 'radio', '1', '1'),
		(NULL, 'work_option', 'At least one full-time job in an office setting.', NULL, 'radio', '2', '1'),
		(NULL, 'work_option', 'At least one part-time job in an office setting.', NULL, 'radio', '3', '1'),
		(NULL, 'work_option', 'At least one part-time job of any other kind (retail, Starbucks, construction, etc.).', NULL, 'radio', '4', '1')
		" ,
		"INSERT INTO `roles` (`role_id`, `role_name`) VALUES
		('1', 'user'),
		('2', 'admin'),
		('3', 'restricted user'),
		('4', 'restricted admin')
		"
	);
	return $statement;
}

function Recreate_DB(){
	$statement = array(
		"CREATE TABLE roles(
			role_id TINYINT(1) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			role_name VARCHAR(45) NOT NULL
			)",

		"CREATE TABLE users(
			user_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			first_name VARCHAR(30),
			last_name VARCHAR(30),
			email VARCHAR(50) NOT NULL,
			password VARCHAR(50) NOT NULL,
			role_id TINYINT(1) UNSIGNED,
			FOREIGN KEY (role_id) REFERENCES roles(role_id)
			)",

		"CREATE TABLE applicants(
			applicant_id INT  NOT NULL AUTO_INCREMENT PRIMARY KEY,
			user_id INT NOT NULL,
			school_name VARCHAR(150),
			major VARCHAR(50),
			graduation_date VARCHAR(30),
			street_address VARCHAR(100),
			city VARCHAR(50),
			state VARCHAR(20),
			zipcode CHAR(10),
			phone_number VARCHAR(15),
			linkedin VARCHAR(50),
			portfolio VARCHAR (50),
			age_check INT UNSIGNED,
			legal_status INT UNSIGNED,
     		FOREIGN KEY (user_id) REFERENCES users(user_id)
			)",

		"CREATE TABLE referrals(
			referral_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			referral_1 INT UNSIGNED,
			referral_2 INT UNSIGNED,
			referral_3 INT UNSIGNED,
			referral_4 INT UNSIGNED,
			referral_5 INT UNSIGNED,
			referral_6 INT UNSIGNED,
			referral_7 INT UNSIGNED,
			referral_8 VARCHAR(100),
			referral_9 VARCHAR(100),
			referral_10 INT UNSIGNED,
			referral_11 VARCHAR(100)
			)",

		"CREATE TABLE schedules(
			schedule_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			weekly_hours TINYINT UNSIGNED,
			commitments TEXT
			)",

		"CREATE TABLE experiences(
			experience_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			programming_option INT UNSIGNED,
			work_option INT UNSIGNED,
			job_title VARCHAR(100),
			front_end_experience TEXT,
			lamp_stack_experience TEXT,
			mobile_experience TEXT,
			cms_experience TEXT,
			other_experience TEXT
			)",

		"CREATE TABLE materials(
			material_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			resume BLOB,
			cover_letter BLOB,
			reference_list TEXT,
			additional_info TEXT
			)",

		"CREATE TABLE sections(
			section_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			section_name VARCHAR(50) NOT NULL,
			section_description TEXT,
			arrange TINYINT UNSIGNED NOT NULL,
			section_is_active BOOLEAN NOT NULL
			)",

		"CREATE TABLE states(
			state_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			name VARCHAR(50) NOT NULL
			)",

		"CREATE TABLE schools(
			school_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			name VARCHAR(50) NOT NULL,
			school_is_active BOOLEAN NOT NULL
			)",


		"CREATE TABLE question_options(
			q_option_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			field_name VARCHAR(150) NOT NULL,
			option_name VARCHAR(150) NOT NULL,
			option_description TEXT,
			input_type VARCHAR(30),
			arrange TINYINT UNSIGNED NOT NULL,
			option_is_active BOOLEAN NOT NULL
			)",

		"CREATE TABLE fields(
			field_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			field_name VARCHAR(50) NOT NULL,
			field_description TEXT,
			pre_text TEXT,
			inside_text TEXT,
			post_text TEXT,
			section_id INT UNSIGNED NOT NULL,
			inner_arrange TINYINT UNSIGNED NOT NULL,
			options_target VARCHAR(30),
			is_required BOOLEAN NOT NULL,
			field_is_active BOOLEAN NOT NULL,
			response_target VARCHAR(30) NOT NULL,
    		FOREIGN KEY (section_id) REFERENCES sections(section_id)
			)",

		"CREATE TABLE applications(
			application_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			applicant_id INT NOT NULL,
			referral_id INT UNSIGNED NOT NULL,
			schedule_id INT UNSIGNED NOT NULL,
			experience_id INT UNSIGNED NOT NULL,
			material_id INT UNSIGNED NOT NULL,
			is_complete BOOLEAN NOT NULL,
			submit_timestamp DATETIME,
    		FOREIGN KEY (applicant_id) REFERENCES applicants(applicant_id),
    		FOREIGN KEY (referral_id) REFERENCES referrals(referral_id),
    		FOREIGN KEY (schedule_id) REFERENCES schedules(schedule_id),
    		FOREIGN KEY (experience_id) REFERENCES experiences(experience_id),
    		FOREIGN KEY (material_id) REFERENCES materials(material_id)
			)"
		);
	return $statement;
}


function populatePostArray(){
	$statement= Array (
		[first_name] => Paul
		[last_name] => Burinda
		[email] => paul.burinda@gmail.com
		[password] => password
		[school_id] => Southern Connecticut State University
		[major] => Computer Science
		[graduation_date] => January 2015
		[cohort_name] => Cohort 6 - Spring 2015
		[street_address] => 1123123
		[city] => West Haven
		[state] => Connecticut
		[zipcode] => 06516
		[phone_number] => 1234567890
		[linkedin] => NONE
		[portfolio] => NONE
		[age_check] => 1
		[legal_status] => 3
		[referral_1] => 5
		[referral_2] => 6
		[referral_3] => 7
		[referral_4] => 8
		[referral_5] => 9
		[referral_6] => 10
		[referral_7] => 11
		[referral_8] => Bob
		[referral_9] => Fischer
		[referral_10] => 14
		[referral_11] => Krishna
		[weekly_hours] => 15
		[commitments] => Unavailable Saturday
		[programming_option] => 17
		[work_option] => 22
		[job_title] => Mr. Awesome
		[front_end_experience] => Built Webpage
		[lamp_stack_experience] => Building form
		[cms_experience] => None
		[mobile_experience] => Very little
		[other_experience] => Hire me for relevant info
		[reference_list] => Joe Smith
		[additional_info] => Do it!
		[submit] => submit )


}
?>