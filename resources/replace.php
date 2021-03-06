<?php
    include "db_conn.php";

    $dbh=dbconn();

    $emailCheck = "123@gmail.com";
    $tempName = "John";

    $sqlStmt = "SELECT * FROM applications INNER JOIN users ON applications.applicant_id = user.user_id
        WHERE user.email = '$emailCheck'";

    $result = $dbh->prepare($sqlStmt);
    $result->execute();

    $row_count = sizeof($result);
    $results_contents =$result->fetchAll(PDO::FETCH_ASSOC);


    if($row_count > 1){
         echo "Someone has enrolled in: " .$cohortCheck . " with the provided email address already, thank you for your interest. ";
    }




$applicationSqlInsert = "NULL";







//needs to be modularized to read from DB
$tableInfo = array('applicants', 'identity', 'referrals','schedules', 'experiences', 'materials');
for($x=0; $x<count($tableInfo); $x++)
{
    $query = "SELECT * from " . $tableInfo[$x];
    $resut = $dbh->prepare($query);
    $result->execute();


    if ($result) {

        /* Get field information for all fields */
        $submitSqlTable = null;
        //Base string, will be formatted as input is entered
        $submitSqlField = "";
        $submitSqlRecord = "";
        $submitSql = "";
        $sqlFirst = 0;
        $replacePrimary=null;
        $replacePrimaryColumn=null;

        //start modifying content for insertion
        $replacePrimaryKey = array(); //is this needed



        while (sizeof($result) > 1) {
            //formatting Insert statement to add commas before all content excluding first entry
            if($sqlFirst!=0){
                $submitSqlField = $submitSqlField . ",";
                $submitSqlRecord = $submitSqlRecord . ",";
                            }

            //retrieves column name and table name
            $colName = $finfo->name;
            $submitSqlTable = $finfo->table;

            //file submission, checks if field names reference resume/cover letter !! not modularized  !!
            if($colName=="resume" || $colName=="cover_letter"){
                if ($_FILES[$colName]["error"] > 0) {
                    echo "Return Code: " . $_FILES[$colName]["error"] . "<br>";
                } else {
                    echo "Upload: " . $_FILES[$colName]["name"] . "<br>";
                    if (file_exists("upload/" . $_FILES[$colName]["name"])) {
                        echo $_FILES[$colName]["name"] . " already exists. ";
                    } else {
                        move_uploaded_file($_FILES[$colName]["tmp_name"],
                            "upload/" . $_FILES[$colName]["name"]);
                        $fileLoc= "Stored in: " . "upload/" . $_FILES[$colName]["name"];
                        //echo $fileLoc;
                    }
                }
            }

            if($submitSqltable!="applications"){
                    //first check if there is not submitted value, like for keys in a completed form
                if($_POST[$colName]==NULL){
                    //file submission as no submitted value sent via normal ways
                    //if object name is resume or cover letter write file path to DB
                    if($colName=="resume" || $colName=="cover_letter"){
                        if($sqlFirst==0){

                        }
                            if($submitSql!=""){
                                $submitSql = $submitSql." , ";
                            }

                        //updates into
                        if($fileLoc==""){
                            $old = $colName . "_old";
                            $submitSql = $submitSql . $colName . "='" . $_POST[$old] . "'";
                        }
                        else{
                            $submitSql = $submitSql . $colName . "='" . $fileLoc . "'";
                        }

                    }else
                    {
                        // writes a NULL value like for PK
                        if($sqlFirst==0){
                            $replacePrimaryColumn = $colName;
                            $replacePrimary = $dupContent[$colName];
                            $sqlFirst = $sqlFirst + 1;
                        }else{
                            //updates into
                            if($submitSql!=""){
                                $submitSql = $submitSql." , ";
                            }
                                $submitSql = $submitSql.$colName . "='" . $_POST[$colName] . "'";
                        //increment tracker so system knows to format with commas
                        $sqlFirst=$sqlFirst +1;
                        }
                    }
                }else
                //if POST content isn't null, write POST content with formatting into string for SQL insertion
                //updates into
                if($submitSql==""){
                    $submitSql = $submitSql . $colName . "='" . $_POST[$colName] . "'";
                }else{$submitSql = $submitSql . ", " . $colName . "='" . $_POST[$colName] . "'";}

            }
        }

        //sql for writing to DB
            //$submitSql code from insert malfunctioning
            $submitFinSql = "UPDATE `applications_db`.`" . $submitSqlTable . "` SET " . $submitSql
                . " WHERE " . $replacePrimaryColumn . "=" . $replacePrimary;
            //echo $submitSql;
            $newquery = $dbh->prepare($submitFinSql);

            if ($newquery->execute()){
                echo "Table updated successfully. \n";
            }else{
            echo "Error executing the final sql query: " . $submitFinSql . "\nError produced:  \n";
            }
            echo "</br>";

    echo "</br>";
    }
}

    if($_POST['submit'])
    {
        $status = 1;
    }elseif($_POST['save'])
    {
        $status = 0;
        $to = $email;
        $subject = "Thank you for your interest in Apprentice 100";
        $Message = "
        <html>
        <head>
        <title>HTML email</title>
        </head>
        <body>
        <p>Thank you for your continued interest in the Apprentice 100 program. </p>
        <p> We look forward to receiving your completed application. For your reference, your login credentials to our online webportal are</p>
        " . $email . "<br>
        " . $password . "<br>
        <p>We look forward to receiving your completed application</p>
        <p>Sincerely \nA100 Developers</p>
        </body>
        </html>";
    }

    $submitSql = "is_complete = '" . $status . "'";
    $submitFinSql = "UPDATE `applications_db`.`applications` SET " . $submitSql
        . " WHERE applications.application_id=".$dupContent['application_id'];
        //echo $submitFinSql;
    $finStmt = $dbh->prepare($submitFinSql);
    if ($finStmt->execute()){
        echo "Table updated successfully. \n";
    }else{
        echo "Error executing: " . $submitFinSql . "\nError produced:  \n";
    }
    echo "</br>";

//mysqli_free_result($result);



    dbclose($dbh);
?>

<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>A100 Application - Existing Applicant Submit-Save Page</title>

        <!-- Bootstrap -->
        <link href="../public_html/css/bootstrap.css" rel="stylesheet">

        <!-- Signin stylesheet -->
        <link href="../public_html/css/signin.css" rel="stylesheet">

        <!-- Custom CSS for Application Form -->
        <link href="../public_html/css/form.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,800italic,300italic,600italic,400,300,600,700,800|Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href="public_html/css/font-awesome.min.css" rel="stylesheet">

    </head>

    <body>

        <div class="container-fluid">

            <div class="row form">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bottomMargin">
                    <h4><a href="../index.php">Return to Application Form login</a></h4>
                    <h4><a href="http://www.indie-soft.com/a100">Return to A100 Program website</a></h4>
                </div>
            </div>

        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="public_html/js/bootstrap.js"></script>

    </body>

</html>