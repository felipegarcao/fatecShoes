<?php
session_start();

require_once('connection.php');

if (isset($_POST['re_password'])) {
  $old_pass = $_POST['old_pass'];
  $new_pass = $_POST['new_pass'];
  $re_pass = $_POST['re_pass'];

  $username = $_SESSION['login'];
  $query = "SELECT  * from users where username='$username'";

  $result = $conn->query($query);

  $password_row = mysqli_fetch_array($result);
  $database_password = $password_row['senha'];

  if ($database_password == md5($old_pass)) {
    if ($new_pass == $re_pass) {
      $update_pwd = "UPDATE users set senha = md5('{$new_pass}') WHERE username='$username'";
      $update = $conn->query($update_pwd);
      echo "<script>alert('Senha alterado com sucesso!');</script>";
    } else {
      echo "<script>alert('sua senha nova e a confirmação não são iguais!'); </script>";
    }
  } else {
    echo "<script>alert('sua senha antiga esta incorreta');</script>";
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<?php include('head.php'); ?>

<style>
  .header-custom {
    max-width: 1020px;
    margin: 0 auto;
  }
</style>

<body>


  <div class="header-custom">
    <?php include('header.php'); ?>
  </div>

  <div id="formContent" style="margin: 0 auto;">
    <h2 class="active">Alterar Senha </h2>
    <!-- Login Form -->
    <div id="login" class="tab">
      <form method="POST" action="">

        <input type="password" id="password" class="third" name="old_pass" placeholder="Senha Antiga" required />
        <input type="password" id="password" class="third" name="new_pass" placeholder="Nova senha" required />
        <input type="password" id="password" class="third" name="re_pass" placeholder="Confirmar nova senha" required />
        <input type="submit" class="fourth" value="Alterar" name="re_password">
      </form>
    </div>
  </div>
  </div>
</body>

</html>