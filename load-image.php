<?php
include 'onedoc1.php';
$imageNewCount = $_POST['imageNewCount'];


        $sql = "SELECT * FROM  images LIMIT $imageNewCount";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)){
                echo "<p>";
                echo $row[ 'image'];
                echo "<p>";
                echo $row[ 'text'];
                echo "</p>";
            }
        }
        ?>