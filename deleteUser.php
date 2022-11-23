<?php

  if(isset($_GET['id'])) {
    $id = $_GET['id'];


  require_once('connection.php');

  $mysql_query = "DELETE FROM users WHERE id=$id";

  $result = $conn->query($mysql_query);

  if ($result === TRUE){
    echo "<script>alert('Usuario Removido com Sucesso!')</script>";
  } else {
    echo "<script>alert('Ocorreu um erro ao tentar remover')</script>";

  }

  // Connection Close
  mysqli_close($conn);

  header('Location: adm.php');

}
