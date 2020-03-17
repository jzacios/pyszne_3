<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shifts</title>
</head>
<body>
    <?php
        // rozpoczecie sesji
        session_start();
        
        // na podstawie statusu logowania system decyduje którą stronę wyświetlić
        if(!isset($_SESSION['login_status'])){
            $_SESSION['login_status'] = 0;
        }
        if($_SESSION['login_status'] == 0){
            include("pages/login.php");
        }else if($_SESSION['login_status'] == 1){
            include("pages/main.php");
        }else if($_SESSION['login_status'] == 2){
            include("pages/admin.php");
        }else include("pages/unexpected_error.php");

    ?>


</body>
</html>