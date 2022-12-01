<?php
session_start();

$subtotal = 0.0;
?>

<!DOCTYPE html>
<html lang="en">
<?php include('head.php'); ?>

<body>
  <div class="container-cart">
    <?php include('header.php'); ?>
    <h2>Compras</h2>
    <table>
      <thead>
        <tr>
          <th></th>
          <th>NOME</th>
          <th>QUANTIDADE</th>
          <th>VALOR PAGO</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($_SESSION['compras'] as $key => $value) {
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
          </tr>
        <?php } ?>

      </tbody>
    </table>
  </div>
</body>

</html>