
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
session_start();
include("scripts/db.php");

// Ustawianie flag na 0
$_SESSION['reg_error_empty'] = 0;
$_SESSION['reg_error_multiplelog'] = 0;
$_SESSION['reg_error_passhort'] = 0;
$_SESSION['reg_error_passrepeat'] = 0;

if(isset($_POST['username'])){
    if($_POST['username'] == '' OR $_POST['password'] == '' OR $_POST['name'] == '' OR $_POST['surname'] == '' OR $_POST['email'] == ''){
        $_SESSION['reg_error_empty'] = 1;
    }
    $username = $_POST['username'];
    if($username != ''){
        $sql = "SELECT * FROM users WHERE ID = '".$username."'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $_SESSION['reg_error_multiplelog'] = 1;
        }
    }
    $password = $_POST['password'];
    if(strlen($password)<6){
        $_SESSION['reg_error_passhort'] = 1;
    }
    $password2 = $_POST['password_repeat'];
    if($password != $password2){
        $_SESSION['reg_error_passrepeat'] = 1;
    }
}
?>
<body id="register_body">
    <div id="register">
        <div class="container mt-5">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6 mt-5">
                    <div id="login-box" class="col-md-12 mt-5">
                        <form id="register-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Rejestracja</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Nazwa użytkownika:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Hasło:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password_repeat" class="text-info">Powtórz hasło:</label><br>
                                <input type="password" name="password_repeat" id="password_repeat" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="name" class="text-info">Imię:</label><br>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="surname" class="text-info">Nazwisko:</label><br>
                                <input type="text" name="surname" id="surname" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md col-md-12" value="Zarejestruj">
                            </div>
                            <div class="form-group">
                                <a href="reset.php"><span class="btn btn-info btn-md col-md-12"> <- Wróć</span></a>
                            </div>
                            <?php
                                if($_SESSION['reg_error_empty'] == 1){
                                    echo "<div class='alert alert-warning' role='alert'>";
                                    echo "   Żadne pole nie może pozostać puste! ";
                                    echo "</div>";
                                }
                                if($_SESSION['reg_error_multiplelog'] == 1){
                                    echo "<div class='alert alert-warning' role='alert'>";
                                    echo "   Podany login już istnieje w bazie danych! ";
                                    echo "</div>";
                                }
                                if($_SESSION['reg_error_passhort'] == 1){
                                    echo "<div class='alert alert-warning' role='alert'>";
                                    echo "   Podane hasło jest zbyt krótkie! ";
                                    echo "</div>";
                                }
                                if($_SESSION['reg_error_passrepeat'] == 1){
                                    echo "<div class='alert alert-warning' role='alert'>";
                                    echo "   Hasła nie są takie same! ";
                                    echo "</div>";
                                }
                            ?>                 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
if($_POST){
    if($_SESSION['reg_error_empty'] == 1 OR $_SESSION['reg_error_multiplelog'] == 1 OR $_SESSION['reg_error_passhort'] == 1 OR $_SESSION['reg_error_passrepeat'] == 1){
        $_SESSION['reg_error_empty'] = 0; //reset flag
        $_SESSION['reg_error_multiplelog'] = 0;
        $_SESSION['reg_error_passhort'] = 0;
        $_SESSION['reg_error_passrepeat'] = 0;
    }
    else{
        $username = $_POST['username'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $sql = "INSERT INTO users(EMAIL,ID,NAME,NUMBER,PRIVILEGE,SURNAME) VALUES(?,?,?,0,1,?)";
        $stmt = $conn->prepare($sql);
        $stmt -> execute([$email,$username,$name,$surname]);
        $sql = "INSERT INTO passwords VALUES(?,?)";
        $stmt = $conn->prepare($sql);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt -> execute([$username,$password]);
        header("Location: reset.php");
    }
}