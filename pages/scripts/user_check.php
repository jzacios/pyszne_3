<?php
if($_SESSION['login_status'] != 1){
    header("Location: ../../index.php");
}