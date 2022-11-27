<?php

session_start();

if (isset($_POST['enviar'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $mensagem = $_POST['mensagem'];

  require_once('connection.php');

  $mysql_query = "INSERT INTO contato (name, email,mensagem) VALUES ('$name', '$email', '$mensagem')";

  $result = $conn->query($mysql_query);

  if ($result == TRUE) {
    echo "<script type='text/javascript'>alert('Mensagem Enviada com sucesso!');</script>";
  } else {
    echo "<script type='text/javascript'>alert('Erro ao enviar mensagem!');</script>";
  }

  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include('head.php'); ?>

<body>
  <section class="container-contato">
    <header>
      <h2>Contato</h2>

    </header>
    <article>
      <form autocomplete="off" method="POST" action="">
        <label>
          * Nome
          <input type="text" id="name" name="name" style="width: 500px; font-size: .75rem;" required />
        </label>
        <label>
          * Email
          <input type="text" id="email" name="email" type="text" style="width: 500px; font-size: .75rem;" required />
        </label>
        <label>
          * Mensagem
          <textarea type="text" id="mensagem" name="mensagem" required></textarea>
        </label>
        <input type="submit" name="enviar" class="btn btn-primary" value="Enviar Mensagem" style="width: 500px; margin: 20px auto;">
      </form>
    </article>
  </section>
  <button class="button-float" onclick="window.history.back()">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
        <rect width="30" height="30" fill="none" />
        <line x1="216" x2="40" y1="128" y2="128" fill="none" stroke="#7159c1" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" />
        <polyline fill="none" stroke="#7159c1" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" points="112 56 40 128 112 200" />
      </svg>
    </button>
</body>

</html>