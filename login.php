<?php
session_start();

if (isset($_SESSION['login'])) {
    header("Location: index.php");
}

if (isset($_POST['enviar'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    require_once('connection.php');
    
    $query = "SELECT * from users where username = '{$username}' and senha = md5('{$password}')";

    $result = $conn->query($query);

    $VERIFY_AUTHENTICATED = $row = mysqli_fetch_array($result);
    if ($VERIFY_AUTHENTICATED) {
        $_SESSION['login'] = $username;
        header('Location: index.php');
        echo "<script>alert('Logado com sucesso!');</script>";
        exit();
    } else {
        echo "<script>alert('usuario ou senha incorretos!')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include('head.php'); ?>

<body id="body-login">
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <h2 class="active">Login </h2>
            <!-- Logo -->
            <div class="fadeIn first">
                <img src="assets/jordan-logo.svg" width="200" height="200" id="icon" alt="User Icon" />
            </div>
            <!-- Login Form -->
            <div id="login" class="tab">
                <form method="POST" action="">
                    <input type="text" id="username" class="fadeIn second" name="username" placeholder="usuario" required />
                    <input type="password" id="password" class="fadeIn third" name="password" placeholder="senha" required />
                    <input type="submit" name="enviar" class="fadeIn fourth" value="Logar">
                </form>
            </div>
            <div id="formFooter">
                <a class="underlineHover" href="cadastro.php">Não possui conta?</a>
            </div>
        </div>
    </div>


</body>

</html>