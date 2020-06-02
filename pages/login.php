<?php
if($_SESSION['login_tried'] == 1){ //sprawdzanie czy była próba logowania
    if($_SESSION['login_error'] == 0){ //skrypt rusza tylko jesli nie wykryto bledu
            if(!isset($_POST['username']) || trim($_POST['username'] == '')){
                $_SESSION['login_error'] = 1;
                // pole 'username' jest puste 
            }else if(!isset($_POST['password']) || trim($_POST['password'] == '')){
                $_SESSION['login_error'] = 2;
                // pole 'password' jest puste
            }else{
                // pola nie sa puste, sprawdzanie danych
                $username = $_POST['username'];
                $password = $_POST['password'];
                $stmt = $conn->prepare("SELECT PASSWORD FROM passwords WHERE ID = '".$username."'"); //pobranie hasła z bazy danych
                $stmt->execute();
                if($stmt->rowCount() == 0){
                    $_SESSION['login_error'] = 3; //loginu nie ma w bazie danych
                }
                $db_password = $stmt->fetch();
                if($db_password){
                    if(!password_verify($password, $db_password['PASSWORD'])){
                        $_SESSION['login_error'] = 4;
                        echo $db_password['PASSWORD'];
                    }else{
                        $stmt = $conn->prepare("SELECT NAME, SURNAME, EMAIL, NUMBER, PRIVILEGE FROM users WHERE ID = '".$username."'"); // pobranie danych użytkownika
                        $stmt->execute();
                        if($stmt->rowCount() == 1){
                            $user = $stmt->fetch();
                            $_SESSION['id'] = $username;
                            $_SESSION['name'] = $user['NAME'];
                            $_SESSION['surname'] = $user['SURNAME'];
                            $_SESSION['email'] = $user['EMAIL'];
                            $_SESSION['number'] = $user['NUMBER'];
                            $_SESSION['login_status'] = $user['PRIVILEGE'];
                            header("Location: index.php");
                        }
                    }
                }
                

        }
    }
}
?>



<body id="login_body">
    <div id="login">
        <div class="container mt-5">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6 mt-5">
                    <div id="login-box" class="col-md-12 mt-5">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Logowanie</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md col-md-12" value="Zaloguj">
                            </div>
                            <div class="form-group">
                                <a href="rejestracja.php"><span class="btn btn-info btn-md col-md-12">Rejestracja</span></a>
                            </div>
                            <?php
                            $_SESSION['login_tried'] = 1; // próba się odbyła, ustawienie flagi
                            if($_SESSION['login_error'] == 1){
                                echo "<div class='alert alert-warning' role='alert'>";
                                echo "   Pole 'login' nie może być puste! ";
                                echo "</div>";
                            }
                            if($_SESSION['login_error'] == 2){
                                echo "<div class='alert alert-warning' role='alert'>";
                                echo "   Pole 'hasło' nie może być puste! ";
                                echo "</div>";
                                }
                            if($_SESSION['login_error'] == 3){
                                echo "<div class='alert alert-warning' role='alert'>";
                                echo "Do podanego loginu nie jest przypisane żadne konto! ";
                                echo "</div>";
                            }
                            if($_SESSION['login_error'] == 4){
                                echo "<div class='alert alert-warning' role='alert'>";
                                echo "Podane hasło jest błędne! ";
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
$_SESSION['login_error'] = 0;
// reset błędu logowania

?>