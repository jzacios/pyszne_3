
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
if(isset($_POST['username'])){
    if($_POST['username'] == '' OR $_POST['password'] == '' OR $_POST['name'] == '' OR $_POST['surname'] == '' OR $_POST['email'] == ''){
        $_SESSION['reg_error'] = 1;
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
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
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
                            <?php
                            if(isset($_SESSION['reg_error'])){
                                if($_SESSION['reg_error'] == 1){
                                    echo "<div class='alert alert-warning' role='alert'>";
                                    echo "   Żadne pole nie może pozostać puste! ";
                                    echo "</div>";
                                }
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
    if($_SESSION['reg_error'] == 1){
        echo 'error';
        $_SESSION['reg_error'] = 0; //reset flagi
    }
    else{
        include("scripts/db.php");
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
        $stmt -> execute([$username,$password]);
        header("Location: index.php");
    }
}