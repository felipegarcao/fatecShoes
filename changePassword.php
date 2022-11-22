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
      echo "<script>alert('Update Sucessfully');</script>";
    } else {
      echo "<script>alert('Your new and Retype Password is not match'); </script>";
    }
  } else {
    echo "<script>alert('Your old password is wrong');</script>";
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="styles/styles.css">
  <link rel="stylesheet" href="styles/login.css">
  <title>Alterar Senha</title>
</head>

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