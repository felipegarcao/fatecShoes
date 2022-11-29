<?php

if (isset($_POST['enviar'])) {
  $email = $_POST['email'];
  $username = $_POST['username'];
  $senha = $_POST['senha'];

  require_once('connection.php');

  if ($email != '' && $username != '' && $senha != '') {

    $verifyDuplic = "SELECT email FROM users WHERE email = '$email' OR username = '$username'";
    $verifyDuplicRaw = mysqli_query($conn, $verifyDuplic);


    if (mysqli_num_rows($verifyDuplicRaw) > 0) {
      echo "<script>alert('Email ou Username, Ja cadastrado!')</script>";
    } 
     else {
      $mysql_query = "INSERT INTO users (email, username, senha)
      VALUES ('{$email}', '{$username}', md5('$senha'))";

      $result = $conn->query($mysql_query);

      //Connection Close
      mysqli_close($conn);

      header("Location: login.php");
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<?php include('head.php'); ?>

<body id="body-login">
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <h2 class="active">Cadastro</h2>

      <div class="fadeIn first d-flex flex-column align-items-center">
        <img src="assets/jordan-logo.svg" width="200" height="200" id="icon" alt="User Icon" />
      </div>

      <div id="cadastro">
        <form autocomplete="off" method="POST" action="" autocomplete="off">
          <input type="text" id="email" class="fadeIn second" name="email" placeholder="email" required />
          <input type="text" id="username" class="fadeIn second" name="username" placeholder="Usuario" required />
          <input type="password" id="senha" class="fadeIn third" name="senha" placeholder="Senha" required />

          <input type="submit" name="enviar" class="fadeIn fourth" value="Cadastrar">
        </form>
      </div>
      <div id="formFooter">
        <a class="underlineHover" href="login.php">Ja Possui Conta?</a>
      </div>
    </div>
  </div>
</body>
</html>