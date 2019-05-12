<html>
<head>
</head>
<body>
  <table>
    <thead>
      <th>ID</th>
      <th>email</th>
      <th>pass</th>

    </thead>
    <tbody>


      <?php
      include('connection.php');
      $result= mysqli_query($con,"select * from userinfo")
      or die(mysqli_error($con));
      while($row=mysqli_fetch_array($result))
      {
        $id=$row['Id'];
        $id1=$row['email'];
        $id2=$row['password'];

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
