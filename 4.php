<html>

<head>
  <title>Получение одного документа </title>
  <link rel="stylesheet" href="style.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
</head>

<body>


  <?php include("header.html") ?>

  <?php
  $servername = "localhost"; // адрес сервера
  $username = "mysql"; // имя пользователя
  $password = "mysql"; // пароль
  $database = 'test';
  $conn = mysqli_connect($servername, $username, $password,  $database);
  //Connect to SQLiteDatabase
  $mysqli = new MySQLi($servername, $username, $password,  $database);
  if ($mysqli->connect_error) {
    die("No" . $mysqli->connect_error);
  }


  ?>
  <tr>
    <form action="<?php echo htmlspecialchars(trim($_SERVER['PHP_SELF'])); ?>" method="POST">


      <table border="2" style="border-collapse:collapse">
        <tr>
          <td>Name</td>
          <td><input type="text" name="id" /> </td>
          <td> <input type="submit" name="search" value="Search" /></td>
        </tr>
      </table>
    </form>
    <?php
    if (isset($_POST['search'])) {
      $id = $_POST['id'];
      if (is_numeric($id)) {

        $table = 'images';
        $cmd = "SELECT * FROM $table WHERE ID=$id";
        $result = $conn->query($cmd);
        if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
    ?>
          <td>Name</td>
          <td><?php echo $row['id']; ?></td>
          <table border="2">
            <tr>
              <td>Name</td>
              <td><?php echo $row['id']; ?></td>
              <td><img src="<?php echo $row['dir']; ?> " width='40%'></td>
            </tr>
      <?php
        } else {
          echo "There is no record with this name";
        }
      } else {
        echo "Please enter a numeric ";
      }
    }
      ?>

</body>

</html>