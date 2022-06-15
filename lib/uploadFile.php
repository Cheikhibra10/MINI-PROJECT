<?php

function to_uploads(array $files):bool{
     
      
   $uploadfile = UPLOAD_DIR . basename($files['fileToUpload']['name']);
   if (move_uploaded_file($files['fileToUpload']['tmp_name'], $uploadfile)) {
       return true;

   }else{
       return false;
   }
    
  
}


