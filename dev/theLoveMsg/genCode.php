<?php

include ('conn.php');

$share_link = uniqid();
$message = $_POST['message'];

//Prepare and bind the SQL statement
$stmt = $conn->prepare("INSERT INTO messages(id, msg, datacriado) VALUES ($share_link, $message, NOW())");
$stmt->bind_param("ss", $share_link, $message);

//Execute the SQL statement
$stmt->execute();

//Close the prepared statement and database connection
$stmt->close();
$conn->close();

?>