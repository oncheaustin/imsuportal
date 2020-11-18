<?php 
include('qrlib.php');      
$para= urldecode($_GET['p']);    
   QRcode::png("$para");
  
 ?>