<?php

include("../../scripts/db.php");
session_start();

$sql = "INSERT INTO shifts(owner_id,date,shift_start,shift_end,lenght,week_number,year) VALUES(?,?,?,?,?,?,?)";
$stmt= $conn->prepare($sql);





$owner_id = $_SESSION['id'];
$date = $_POST['date'];
$shift_start = $_POST['shift_start'];
$shift_end = $_POST['shift_end'];
$lenght = ($shift_end - $shift_start)/2;
$week_number = date('W', strtotime($date));
$year = date('Y', strtotime($date));

$stmt->execute([$owner_id,$date,$shift_start,$shift_end,$lenght,$week_number,$year]);
header("Location: ../../index.php");