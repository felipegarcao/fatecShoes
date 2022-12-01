<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
}

require_once('connection.php');

$query = "SELECT * FROM produto";

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<?php include('head.php'); ?>

<?php

$items = array(
  ['imagem' => 'https://d3ugyf2ht6aenh.cloudfront.net/stores/001/038/770/products/sem-titulo1101-5ccd645f548a14533b16302058014884-640-0.png', 'name' => 'Nike Air Force', 'price' => '200', 'estoque' => "3"],
  ['imagem' => 'https://cdn.shopify.com/s/files/1/0260/9669/7428/products/TamanhoPadrao_7_bf4ac557-e515-40bc-830a-ad7c2f4a6312_480x480@2x.png?v=1628290000', 'name' => 'Nike Air Max', 'price' => '250', 'estoque' => "3"],
  ['imagem' => 'https://i.pinimg.com/originals/f5/12/2f/f5122fca5a0f15a87e9ca5551295ecae.png', 'name' => 'Nike Shox', 'price' => '300', 'estoque' => "5"],
  ['imagem' => 'https://imgcentauro-a.akamaihd.net/900x900/96283451/tenis-adidas-breaknet-m-feminino-img.jpg', 'name' => 'Adidas Breaknet', 'price' => '200', 'estoque' => "3"],
  ['imagem' => 'https://static.polissport.com.br/public/polissport/imagens/produtos/tenis-adidas-lite-racer-3-0-35225.jpg', 'name' => 'Adidas Racer', 'price' => '250', 'estoque' => "2"],
  ['imagem' => 'https://i.pinimg.com/originals/34/f1/28/34f128eae3c6bdb1fc83349b1eb4ffe1.png', 'name' => 'Allstar', 'price' => '300', 'estoque' => "1"],
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
      foreach ($result as $key => $value) {
      ?>
        <li>
          <img src="<?php echo $value['descricao'] ?>" alt="" height="250" />
          <strong><?php echo $value['nome_produto'] ?></strong>
          <span>R$ <?php echo $value['valor'] ?></span>
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