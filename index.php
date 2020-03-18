<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shifts</title>


    <!-- BOOTSTRAP -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>




    <!-- CSS -->
    <link rel="stylesheet" href="style/login.css">
    <link rel="stylesheet" href="style/main.css">



</head>
    <?php
        // rozpoczecie sesji
        session_start();
        
        // polaczenie z baza danych
        include("scripts/db.php");

        //inicjacja zmiennej błędu logowania
        if(!isset($_SESSION['login_error'])){
            $_SESSION['login_error'] = 0;
            $_SESSION['login_tried'] = 0;
        }

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
    <form method="POST" action="pages/scripts/take.php" id="take_form" name="take_form" style="display: none;">
        <input type="text" name="shift_id" id="shift_id"></input>
        <input type="text" name="taker_id" id="taker_id"></input>
    </form>
    <script>
        function take(id){
            document.getElementById('shift_id').value=id;
            document.getElementById('taker_id').value=<?php echo $_SESSION['id']; ?>;
            document.getElementById('take_form').submit();
        }
    </script>
</html>