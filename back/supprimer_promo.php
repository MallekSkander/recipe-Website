<?php
     include '../Controllers/PromoC.php' ;
     require_once '../Models/Promo.php';

if (isset($_GET["id"]))
{
$id=$_GET['id'];
 $promoc=new PromotionC() ;
 $promoc->deletePromotion($id);
 header('location:gestion_promo.php');
}