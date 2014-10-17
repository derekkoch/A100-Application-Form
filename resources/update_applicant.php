<html>
 <head><title>PHP Test</title></head>
 <body>
<?php
	echo '<p>A100 Application Form</p>';
	// select.php Script to execute from index.php to view the contents of test_db.Apprentices2
	include "db_conn.php";

	//Create connection
	$con = dbconn();

	//get variable
	$email = $_POST["emailLogin"];
	$password =$_POST["passwordLogin"];

	$result = $dbh->prepare("Select * From users where email =".$email);
	$row = mysqli_fetch_assoc($result);
	 // var_dump($row);// This echo clause is for debug.
	if ($row) {//If finding the user record exists, next step judge the password is whether correct or not.

		// var_dump($res);// This echo clause is for debug.
		// echo "in if";// This echo clause is for debug.
		if ($row['password']==sha1($password)) {
			// Password is correct.
			// echo "Password is correct";// This echo clause is for debug.
			if ($row['status']==1) {

				echo "<div>This application has been submitted already and is no longer available for editting.";
				echo "<table border='1'>//show the user's information derectly
					<tr>
					<th>PID</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Password</th>
					<th>status</th>
					</tr>";
				echo "<tr>";
				echo "<td>" . $row['PID'] . "</td>";
				echo "<td>" . $row['fName'] . "</td>";
				echo "<td>" . $row['lName'] . "</td>";
				echo "<td>" . $row['email'] . "</td>";
				echo "<td>" . 'Not visibale' . "</td>";
				if($row['status']==0){
					echo"<td>incomplete</td>";
					}elseif($row['status']==1){
						echo "<td>complete</td>";
					}
				echo "</tr>";
				mysqli_close($con);
				echo '<p><a href="../index.php">Click here to go to gateway</a></p>';
				echo "<p><a href=\"select.php?email=$email\">Click here to view table</a></p>";

			}else{
				// echo "status doen't complete";
				echo '<form action="replace.php" method="post">';
				echo "Name:<br>";
				echo "First Name: <input type='text' name='fName' value='" . $row['fName'] . "'>";
				echo "Last Name: <input type='text' name='lName' value='" . $row['lName'] . "'>";
				echo "<br>credentials: <br>";
				echo "email: <input type='text' name='email' value='" . $row['email'] . "'>";
				echo "password: <input type='password' name='password' value='". $row['password'] . "'>";
				echo '</form>';
			}
		}else{
			header("Location: ../index.php?errno=2");
			exit();
			// echo "<br/>Password is uncorrect, please log in with a valid email address and password";// This echo clause is for debug.
		}
	}else{
		header("Location: ../index.php?errno=1");
		exit();
		// echo "<br/>No Such User exists, please log in with a valid email address and password";// This echo clause is for debug.
	}

	include 'select.php';// This echo clause is for debug.
?>

 </body>
</html>
