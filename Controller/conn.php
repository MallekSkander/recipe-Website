<?php
$host = "localhost";
$dbase = "dmak";
$user = "root";
$pd = "";

try{
    $dbb = new PDO('mysql:host='.$host.';dbname='.$dbase, $user, $pd);
    $dbb->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
    echo 'Unable to Connect';
    echo $e->getMessage();
    exit;

}

?>