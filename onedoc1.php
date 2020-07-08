<!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <title>Получение одного документа </title>
     <link rel="stylesheet" href="style.css">
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
     <script>
         $(document).ready(function() {
             var imageCount = 1;
             $("button").click(function()){
                imageCount = imageCount + 1;
                 $("#images").load("load-image.php", {
                    imageNewCount: imageCount
                 });
             });
         });
</script>
    </head>
 <body>
     <div id="content">

            <?php include ("header.html")?>
             <?php
             $servername = "localhost"; // адрес сервера
             $username = "mysql"; // имя пользователя
             $password = "mysql"; // пароль
             $database = 'test';
             $conn = mysqli_connect($servername, $username, $password,  $database);
             //Connect to SQLiteDatabase
             $mysqli = new MySQLi($servername, $username, $password,  $database);
             if ($mysqli->connect_error){
               die("No". $mysqli->connect_error);
             } ?>
     </div>
     
     <div id= "images">
        <?php
        $sql = "SELECT * FROM  images LIMIT 1";
        $result = mysqli_query($conn, $sql);
        while (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)){
                echo "<p>";
                echo $row[ 'image'];
                echo "<p>";
                echo $row[ 'text'];
                echo "</p>";
            }
        }
        ?>
     </div>
     <button> Get more files</button>