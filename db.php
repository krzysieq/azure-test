<?php 
// DB connection info
//TODO: Update the values for $host, $user, $pwd, and $db
//using the values you retrieved earlier from the portal.
$host = "eu-cdbr-azure-west-b.cloudapp.net";
$user = "b0fad7066acd5d";
$pwd = "5861d6a2";
$db = "comp2013AoRruCPu";
// Connect to database.
try {
    $conn = new PDO( "mysql:host=$host;dbname=$db", $user, $pwd);
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch(Exception $e){
    die(var_dump($e));
}
?>