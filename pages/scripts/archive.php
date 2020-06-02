<?php

include("../../scripts/db.php");

$shift_id = $_POST['archive_shift_id'];


$stmt = "UPDATE shifts SET archived = 1 WHERE ID = '".$shift_id."'";
$stmt= $conn->prepare($stmt);
$stmt->execute();
header("Location: ../../index.php");

