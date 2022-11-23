<?php
$qtdeCar = 0;

if (!isset($_SESSION['carrinho'])) {
  $qtdeCar = 0;
} else {
  $qtdeCar = count($_SESSION['carrinho']);
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Header</title>
</head>

<body>
  <header>
    <a href="index.php">
      <h2>FatecShoes</h2>
    </a>

    <div style="display: flex; align-items: center;">
      <a class="carrinho" href="carrinho.php">
        <div>
          <strong>Meu Carrinho</strong>
       <span><?php echo $qtdeCar ?> item</span>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" height="48" width="48">
          <path d="m24 19.3-2.1-2.1 3.7-3.7h-9.1v-3h9.1l-3.7-3.7L24 4.7l7.3 7.3ZM14.5 44q-1.5 0-2.55-1.05-1.05-1.05-1.05-2.55 0-1.5 1.05-2.55Q13 36.8 14.5 36.8q1.5 0 2.55 1.05 1.05 1.05 1.05 2.55 0 1.5-1.05 2.55Q16 44 14.5 44Zm20.2 0q-1.5 0-2.55-1.05-1.05-1.05-1.05-2.55 0-1.5 1.05-2.55 1.05-1.05 2.55-1.05 1.5 0 2.55 1.05 1.05 1.05 1.05 2.55 0 1.5-1.05 2.55Q36.2 44 34.7 44ZM3.1 7V4h5.8l8.5 18.2h14.4l8-14h3.35l-8.1 15.15q-.55.95-1.425 1.525t-1.925.575H16.55l-2.8 5.2H38.3v3H14.2q-1.9 0-2.875-1.5-.975-1.5-.125-3.05l3.2-5.9L7 7Z" />
        </svg>
      </a>

    </div>

    <a class="profile" data-container="body" data-toggle="popover" data-placement="bottom" role="button" data-html="true" data-content="
      <div class='d-flex flex-column'>
        <a href='compras.php'>Compras</a>
        <a href='carrinho.php'>Meu Carrinho</a>
        <a href='changePassword.php'>Alterar Senha</a>
        <a class='text-danger' href='deslogar.php'>Sair</a>
      </div>
      ">
      <img width="30" height="30" src="assets/profile.svg" alt="" />
      <span><?php echo $_SESSION['login'] ?></span>
    </a>


  </header>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script>
    $(function() {
      $('[data-toggle="popover"]').popover()
    })
  </script>
</body>

</html>