<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
}

// $qtdeCar = 0;

// if (!isset($_SESSION['carrinho'])) {
//   $qtdeCar = 0;
// } else {
//   $qtdeCar = count($_SESSION['carrinho']);
// };
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
  <title>Inicio - FatecShoes</title>
</head>

<?php

$items = array(
  ['imagem' => 'assets/nike-airforce.webp', 'name' => 'Air Force', 'price' => '200', 'estoque' => "3"],
  ['imagem' => 'assets/nike-airforce.webp', 'name' => 'Double Air Force', 'price' => '250', 'estoque' => "3"],
  ['imagem' => 'assets/nike-airforce.webp', 'name' => 'Air Force', 'price' => '300', 'estoque' => "5"],
  ['imagem' => 'assets/nike-airforce.webp', 'name' => 'Air Force', 'price' => '200', 'estoque' => "3"],
  ['imagem' => 'assets/nike-airforce.webp', 'name' => 'Double Air Force', 'price' => '250', 'estoque' => "2"],
  ['imagem' => 'assets/nike-airforce.webp', 'name' => 'Air Force', 'price' => '300', 'estoque' => "1"],
)
?>

<body>
  <div class="container-home">
    <?php include('header.php'); ?>
    <ul>
      <?php
      foreach ($items as $key => $value) {
      ?>
        <li>
          <img src="<?php echo $value['imagem'] ?>" alt="" />
          <strong><?php echo $value['name'] ?></strong>
          <span>R$ <?php echo $value['price'] ?></span>
          <button>
            <a href="?adicionar=<?php echo $key ?>" style="display: flex; align-items: center; gap: 20px; color: #fff; text-decoration: none">
              <div>
                <?php echo $value['estoque'] ?>
              </div>
              <span>ADICIONAR AO CARRINHO</span>
            </a>
          </button>
        </li>
      <?php
      }
      ?>
    </ul>

    <?php
    if (isset($_GET['adicionar'])) {
      //vamos adicionar ao carrinho
      $idProduto = (int) $_GET['adicionar'];
      if (isset($items[$idProduto])) {
        if (isset($_SESSION['carrinho'][$idProduto])) {
          $_SESSION['carrinho'][$idProduto]['quantidade']++;
          $_SESSION['carrinho'][$idProduto]['estoque']++;
        } else {
          $_SESSION['carrinho'][$idProduto] = array('quantidade' => 1, 'name' => $items[$idProduto]['name'], 'price' => $items[$idProduto]['price'], 'imagem' => $items[$idProduto]['imagem']);
        }
        // echo '<script>alert("Adicionado ao carrinho !")</script>';
      } else {
        die("Voce não pode adicionar um item que não existe.");
      }
    }
    ?>
    <div class="d-flex align-items-center justify-content-center">
      <ol>
        <li class="page-item disabled" style="background: transparent;">
          <a class="page-link" href="#" aria-label="Anterior">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Anterior</span>
          </a>
        </li>
        <li class="page-item active" style="background: transparent;"><a class="page-link" href="#">1</a></li>

        <li class="page-item disabled" style="background: transparent;">
          <a class="page-link" href="#" aria-label="Proxima">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Proxima</span>
          </a>
        </li>
      </ol>
    </div>
  </div>

</body>

</html>