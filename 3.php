<html>

<head>
  <title>Получение списка документов </title>
  <link rel="stylesheet" href="style.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <style type="text/css">
    #content {
      width: 50%;
      margin: 10px auto;
      border: 1px solid #cbcbcb;
    }
    form {
      width: 50%;      
      margin: 2em auto 2em;
    }
    #img_div {
      width: 80%;
    }
    #img_div:after {
      clear: both;
    }
    img {
      float: left;
      margin: 5px;
      width: 300px;
    }
  </style>
</head>

<body>


  <?php include("header.html");
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

  if (isset($_GET['order'])) {
    $order = $_GET['order'];
  } else {
    $order = 'image';
  }

  if (isset($_GET['sort'])) {
    $sort = $_GET['sort'];
  } else {
    $sort = 'ASC';
  }

  $table = 'images';
  $cmd = "SELECT * FROM $table ORDER BY $order $sort ";
  $result = $conn->query($cmd);

  if ($result->num_rows > 0) {
  ?>
    <tr>
      <form method="GET">
        <?php
        $sort =='DESC' ? $sort = 'ASC' : $sort = 'DESC';
        echo "
        <table border ='2'>
         <tr>
          <th><a href='?order=image&&sort=$sort'>Sorting by name</a></th>
          <th><a href='?order=created&&sort=$sort'>Sorting by creation date</a></th>
        </tr>";

        while ($row = $result->fetch_assoc()) {
          echo "<div id='img_div'>";
        ?>
          <div>

    <tr>

      <td> <img src="<?php echo $row["dir"]; ?>" width='30%'>
        <div> <?php echo  " </div> </td>";

              echo "<tr> <td>  <br> <img_div>" . $row["image"] . "</img_div>";
              echo "</td>  <br> ";
              echo "<td> <img_div>" . $row["created"] . "</img_div>";
              echo "</td> </tr>";
            }
            echo "</div> </table>";
              ?>
      </td>
      </div>
    <?php

  } else {
    echo "No";
  } ?>

    </form>

</body>
</html>