<?php

include "dbcon.php";

$deleteQuery = "DELETE FROM messages WHERE dateSent < DATE_SUB(NOW(), INTERVAL 24 HOUR)";

if ($conn->query($deleteQuery) === TRUE) {
    echo "Messages older than 24 hours have been deleted.";
} else {
    echo "Error deleting messages: " . $conn->error;
}

$conn->close();



?>