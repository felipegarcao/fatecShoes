<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include('head.php'); ?>

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
    <div style="width: 340px;">
      <label style="color: #fff;">
        * Procurar
        <input type="text" />
      </label>
    </div>
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
      } else {
        die("Voce não pode adicionar um item que não existe.");
      }
    }
    ?>
  </div>
  <?php include('rodape.php') ?>
</body>

</html>