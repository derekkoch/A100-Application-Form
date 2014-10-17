<?php
    include "db_conn.php";

    $dbh = dbconn();
    $dbh->exec("use applications_db");

         /*   $dropdownSql = "SELECT name FROM cohorts WHERE cohort_is_active='1'";
            $results = $dbh->prepare($dropdownSql);
            $results->execute();
            $dropdownArray=$results->fetchAll(PDO::FETCH_ASSOC);

            echo "Size of Array is: ".sizeof($dropdownArray).'<br>';
            foreach($dropdownArray as $row){echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";}*/

            $sqlStmt = "SELECT field_name, is_required FROM fields";
            $results_array = $dbh->prepare($sqlStmt);
            $results_array ->execute();
            $results_contents =$results_array->fetchAll(PDO::FETCH_ASSOC);

            echo $sqlStmt.'<br>';
            echo "size of result_array: ".sizeof($results_array).'<br>';
            //print_r($results_contents).'<br>';


            foreach($results_contents as $row){
            if($row["is_required"]==1)
             {echo "YES";}
            else {echo "NOOOO".'<br>';echo "<a href='../index.php'>Click Back</a>";
                exit;}
            }


?>

<?php
/*
    include "AdminPage_SQL.php";
    include "../admin/db_conn.php";

    try{
        $dbh = dbconn();
        $applicationSql=$dbh->prepare(AdminTableSQL());
        $applicationSql->execute();
        $result = $applicationSql->fetchAll(PDO::FETCH_ASSOC);
        $header = true;
        echo "<table border='1'>";
        if(empty($result)){
            throw new Exception("<p>No applications in database.</p>");
        }
        foreach ($result as $row) {
            if($header){
                echo "<tr>";
                $ColumnFields = array_unique(array_keys($row));
                foreach($ColumnFields as $field){
                    echo "<th>".$field."</th>";
                }
                echo "</tr>";
                $header = false;
            }
            echo "<tr>";
            $ValueField = $row;
            foreach($ValueField as $Column => $Value){
                if($Column == 'is_complete'){
                    if($Value){
                        echo "<td>Complete</td>";
                    } else {
                        echo "<td>Incomplete</td>";
                    }
                } else {
                    echo "<td>".$Value."</td>";
                }
            }
        }
    } catch(PDOException $e){
        echo "Connection Failed:  ".$e->getMessage();
    } catch (Exception $e){
        echo $e->getMessage();
    } finally {
        $dbh=null;
    }*/
?>