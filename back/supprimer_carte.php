<?php
     include '../Controllers/CarteC.php' ;
     require_once '../Models/Carte.php';

if (isset($_GET["id"]))
{
$id=$_GET['id'];
 $carte=new CarteC() ;
 $carte->deletecarte($id);
 header('location:gestion_carte.php');
}