<?php
  include('qrlib.php');          

    // how to save PNG codes to server 
                                         
    $tempDir = EXAMPLE_TMP_SERVERPATH; 
     
    $codeContents = "HAPPY VALENTINE'S DAY. GO SEND YOUR MUM SOME FLOWERS "; 
    $fileName = '005_file_'.md5($codeContents).'.png'; 
     
    $pngAbsoluteFilePath = $tempDir.$fileName; 
    $urlRelativeFilePath = EXAMPLE_TMP_URLRELPATH.$fileName; 
 
                    $fileName = '005_file_'.md5($codeContents).'.png'; 
     
    $pngAbsoluteFilePath = $tempDir.$fileName; 
    $urlRelativeFilePath = EXAMPLE_TMP_URLRELPATH.$fileName; 
     
    // generating 
    if (!file_exists($pngAbsoluteFilePath)) { 
        QRcode::png($codeContents, $pngAbsoluteFilePath); 
 
    }
    // displaying 
    echo "<img src='$pngAbsoluteFilePath' />";
 
     
 ?>