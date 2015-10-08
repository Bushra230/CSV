<?php
session_start();
include('basic.php');
$allowedExts = array("jpg", "jpeg", "gif", "png","csv");
//$extension = end(explode(".", $_FILES["uploadedfile"]["name"]));

if ((($_FILES["uploadedfile"]["type"] == "image/gif")
|| ($_FILES["uploadedfile"]["type"] == "image/jpeg")
|| ($_FILES["uploadedfile"]["type"] == "image/png")
|| ($_FILES["uploadedfile"]["type"] == "image/csv")
|| ($_FILES["uploadedfile"]["type"] == "image/pjpeg"))
&& in_array($extension, $allowedExts))
{       
if ($_FILES["uploadedfile"]["error"] > 0)
  {
  echo "Error: " . $_FILES["uploadedfile"]["error"] . "<br />";
  }
else
  {
  echo "Upload: " . $_FILES["uploadedfile"]["name"] . "<br />";
  echo "Type: " . $_FILES["uploadedfile"]["type"] . "<br />";
  echo "Size: " . ($_FILES["uploadedfile"]["size"] / 1024) . " Kb<br />";
  echo "Stored in: " . $_FILES["uploadedfile"]["tmp_name"];
  }
  
}
$target_path = "uploads/";

$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
 $trget_file=$_FILES['uploadedfile']['name'];
 $target_filetmp= explode(".csv",$trget_file);
 //print_r($target_filetmp[0]);
 $target_file = $target_filetmp[0];
if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    //echo "The file ".  basename( $_FILES['uploadedfile']['name']). 
    //" has been uploaded";
    csvFileread($target_file);
   
} else{
    echo "There was an error uploading the file, please try again!";
}
?>
<?php
session_destroy();
header('Location: http://localhost/csvtest/index.php?success=CSV file upload successfully');
?> 