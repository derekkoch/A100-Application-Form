<?php
    include "db_conn.php";
    include "SQL_Statement.php";

    $dbh = dbconn();

    $dropSql = $dbh->prepare(Drop_DB1());
    $dropSql->execute();
    $dropSql = $dbh->prepare(Drop_DB2());
    $dropSql->execute();
    $dropSql = $dbh->prepare(Create_Db());
    $dropSql->execute();

    $dbh->exec("use applications_db");

    $addTableSQL = Recreate_DB();
    foreach($addTableSQL as $stmt){
        try{

                    $run = $dbh->prepare($stmt);
                    $run->execute();

        }catch(PDOException $e){
                    echo "Error executing: " . $stmt . "\nError produced: " . $e . "\n";
        }
    }

    $populateDB = populateTables();
    $counter =0;
    foreach($populateDB as $stmt){
        try{

                    $run = $dbh->prepare($stmt);
                    $run->execute();
                    echo $counter."<br>";
                    echo $stmt."<br>";
                    $counter++;


        }catch(PDOException $e){
                    echo "Error executing: " . $stmt . "\nError produced: " . $e . "\n";
        }
    }
?>
