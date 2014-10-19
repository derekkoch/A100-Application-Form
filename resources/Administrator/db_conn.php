<?php
include "cred_user.php";

$dbh = null;

function dbconn(){
    try{

        $dbh = new PDO ('mysql:host='.HOST,USER,PASSWORD);
        $dbh->exec("use applications_db");
        return $dbh;

    }catch(PDOException $e){
        print "Error!: " . $e->getMessage() . "<br/>";
        $dbh=null;
    }
}

function dbclose(){
    $dbh=null;
}

?>