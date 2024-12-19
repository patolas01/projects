<?php

$sqlUp ="UPDATE utilizador SET coins= '$coins' WHERE user='$username'";
//echo "alert('".$coins."');";
if ($con->query($sqlUp) === TRUE) {
  //echo "alert('Record updated successfully');";
  
}
else{
   //echo "alert('Error updating record: " . $con->error . "');";
}

$con->close();
header('index.php');
?> 