<?php
session_start();

require_once('connection.php');


if ($_POST) {
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
    /* display: flex;
    align-items: center;
    justify-content: space-between; */
    
    max-width: 1020px;
    margin: 0 auto;
    /* margin-bottom: 100px; */
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

        <input type="password" id="password" class="third" name="password" placeholder="Nova senha" required />
        <input type="submit" class="fourth" value="Alterar">
      </form>
    </div>

  </div>
  </div>
</body>

</html>