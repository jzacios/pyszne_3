<?php

include("../../scripts/db.php");

$shift_id = $_POST['shift_id'];
$taker_id = $_POST['taker_id'];

$stmt = "SELECT owner_id FROM shifts WHERE ID = '".$shift_id."'";
$owner_id = $conn->query($stmt)->fetch();
$owner_id = $owner_id['owner_id'];

$stmt = "UPDATE shifts SET taken = 1, taker_id = '".$taker_id."' WHERE ID = '".$shift_id."'";
$stmt= $conn->prepare($stmt);
$stmt->execute();

header("Location: ../../index.php");

