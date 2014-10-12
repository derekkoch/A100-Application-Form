<?php
    include "db_conn.php";
    include "SQL_Statement.php";

    $dbh = dbconn();
    $dbh->exec("use applications_db");

            $dropdownSql = "SELECT name FROM cohorts WHERE cohort_is_active='1'";
            $results = $dbh->prepare($dropdownSql);
            $results->execute();
            $dropdownArray=$results->fetchAll(PDO::FETCH_ASSOC);

            echo "Size of Array is: ".sizeof($dropdownArray).'<br>';
            foreach($dropdownArray as $row){echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";}

?>


