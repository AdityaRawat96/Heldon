<html>
<head>
</head>
<body>
  <table>
    <thead>
      <th>ID</th>
      <th>name</th>
      <th>image</th>

    </thead>
    <tbody>


      <?php
      include('connection.php');
      $result= mysqli_query($con,"select * from users")
      or die(mysqli_error($con));
      while($row=mysqli_fetch_array($result))
      {
        $id=$row['Id'];
        $id1=$row['name'];
        $id2=$row['image'];

        ?>
        <tr>
          <td><?php echo $id; ?></td>
          <td><?php echo $id1; ?></td>
          <td><?php echo $id2; ?></td>

        </tr>
        <?php
      }
      ?>
    </tbody>
  </table>
</body>
</html>
