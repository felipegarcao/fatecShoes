<?php
  session_start();
  
  require_once('connection.php');

  $query = "SELECT id,username,email FROM users WHERE id -+1 ORDER BY id;";

  $result = $conn->query($query);

  mysqli_close($conn); 

 

?>


<!DOCTYPE html>
<html lang="en">
<?php include('head.php') ?>
<body>



<div class="container-cart">
<?php include('header.php'); ?>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($result as $row) { ?>
      <tr>
        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['username'];?></td>
        <td><?php echo $row['email'];?></td>
        <td>
        <a href="deleteUser.php?id=<?php echo $row['id']; ?>">
            <button style="background: red; color: white;">Excluir</button>
          </a>
        </td>
      </tr>
      <?php } ?>
    </tbody>

  </table>
</div>
  
</body>
</html>