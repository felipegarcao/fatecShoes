<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
}

if (!isset($_SESSION['carrinho'])) {
  header("Location: index.php");
}


$subtotal = 0.0;
$total = array(0.0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="styles/styles.css">
  <title>Carrinho - FatecShoes</title>
</head>

<body>

  <div class="container-cart">
    <?php include('header.php'); ?>
    <table>
      <thead>
        <tr>
          <th></th>
          <th>PRODUTO</th>
          <th>QTD</th>
          <th>SUBTOTAL</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($_SESSION['carrinho'] as $key => $value) {
          array_push($total, $value['price'] * $value['quantidade']);
        ?>
          <tr>
            <td>
              <img src="<?php echo $value['imagem'] ?>" alt="" />
            </td>
            <td><span><?php echo $value['name'] ?></span></td>

            <td>
              <?php echo $value['quantidade'] ?>
            </td>
            <td>
              <?php $subtotal = $value['price'] * $value['quantidade'] ?>
              R$ <?php echo number_format($subtotal, 2, ",", ".") ?>
            </td>
            <td>
              <a href="?remover=<?php echo $key ?>">
                <svg fill="red" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="32px" height="32px">
                  <path d="M 10 2 L 9 3 L 4 3 L 4 5 L 5 5 L 5 20 C 5 20.522222 5.1913289 21.05461 5.5683594 21.431641 C 5.9453899 21.808671 6.4777778 22 7 22 L 17 22 C 17.522222 22 18.05461 21.808671 18.431641 21.431641 C 18.808671 21.05461 19 20.522222 19 20 L 19 5 L 20 5 L 20 3 L 15 3 L 14 2 L 10 2 z M 7 5 L 17 5 L 17 20 L 7 20 L 7 5 z M 9 7 L 9 18 L 11 18 L 11 7 L 9 7 z M 13 7 L 13 18 L 15 18 L 15 7 L 13 7 z" />
                </svg>
              </a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>

    <footer>
      <button type="button">Finalizar</button>
      <div class="total">
        <span>TOTAL</span>
        <strong>R$ <?php echo number_format(array_sum($total), 2, ",", ".") ?></strong>
      </div>
    </footer>

    <a class="button-float" href="index.php">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
        <rect width="30" height="30" fill="none" />
        <line x1="216" x2="40" y1="128" y2="128" fill="none" stroke="#7159c1" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" />
        <polyline fill="none" stroke="#7159c1" stroke-linecap="round" stroke-linejoin="round" stroke-width="24" points="112 56 40 128 112 200" />
      </svg>
    </a>


    <?php


    if (isset($_GET['remover'])) {
      // remover produto do carrinho
      $idProduto = (int) $_GET['remover'];
      if (isset($_SESSION['carrinho'][$idProduto])) {

        $_SESSION['carrinho'][$idProduto]['quantidade']--;

        if ($_SESSION['carrinho'][$idProduto]['quantidade'] < 1) {
          unset($_SESSION['carrinho'][$idProduto]);
        }
      }
    }


    ?>
  </div>
</body>

</html>