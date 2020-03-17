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
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md col-md-12" value="Zaloguj">
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