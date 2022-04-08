<?php

error_reporting(E_ERROR | E_PARSE);

// Count total files
$countfiles = count($_FILES['files']['name']);

// Upload directory

if($_REQUEST['profile']){
   $upload_location = "../assets/profile/";
   $real_path = "assets/profile/";
}
else{
   $upload_location = "../assets/uploads/";
   $real_path = "assets/uploads/";
}
// To store uploaded files path
$files_arr = array();

// Loop all files
for($i = 0;$i < $countfiles;$i++){

   if(isset($_FILES['files']['name'][$i]) && $_FILES['files']['name'][$i] != ''){
      // File name
      $filename = $_FILES['files']['name'][$i];

      // Get extension
      $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

      // Valid image extension
      $valid_ext = array("png","jpeg","jpg");

      // Check extension
      if(in_array($ext, $valid_ext)){

         // File path
         $path = $upload_location.$filename;

         // Upload file
         if(move_uploaded_file($_FILES['files']['tmp_name'][$i],$path)){
            $files_arr[] = $real_path.$filename;
         }
      }
   }
}

echo json_encode($files_arr);
die;