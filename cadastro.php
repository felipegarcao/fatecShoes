<?php

if (isset($_POST['enviar'])) {
  $email = $_POST['email'];
  $username = $_POST['username'];
  $senha = $_POST['senha'];



  require_once('connection.php');

  $mysql_query = "INSERT INTO users (email, username, senha)
                              VALUES ('{$email}', '{$username}', md5('$senha'))";

  $result = $conn->query($mysql_query);


	//Connection Close
	mysqli_close($conn);

	header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles/login.css">
  <link rel="stylesheet" href="styles/styles.css">
  <title>Cadastro</title>
</head>

<body id="body-login">
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <h2 class="active">Cadastro</h2>

      <div class="fadeIn first d-flex flex-column">
        <img src="assets/jordan-logo.svg" width="200" height="200" id="icon" alt="User Icon" />
      </div>

      <div id="cadastro">
        <form autocomplete="off" method="POST" action="" autocomplete="off">
        <input type="text" id="email"  class="fadeIn second" name="email" placeholder="email" required />
          <input type="text" id="username"  class="fadeIn second" name="username" placeholder="Usuario" required />
   
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