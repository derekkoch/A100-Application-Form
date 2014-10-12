<?php
include "cred_admin.php";

$dbh = null;

function dbconn(){
    try{

        //build connection
        $dbh = new PDO ('mysql:host='.HOST,USER,PASSWORD);
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