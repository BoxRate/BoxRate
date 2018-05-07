 
<!DOCTYPE html>
<html>
<head>
    <title>menu</title>
    <link rel="stylesheet" type="text/css" href="menu.css">
</head>
<body>
    <header id="header">
        <h1>Menu Makanan</h1>
    </header>

    <div id="content">
    <?php
         $db = mysqli_connect("localhost", "root", "", "boxrate");
         $sql= "SELECT * FROM menu";
         $result = mysqli_query($db, $sql);
         while ($row=mysqli_fetch_array($result)) {
           echo "<div id='img_div'>";
            echo "<img id='list-menu'src='images/".$row['image']."'>";
            echo "<p id='name' >".$row['description']."</p>";
            echo "<p id='price'> Harga Rp.<strong>".$row['price'].",-</strong></p>";
           echo "</div>";
         }

    ?>
    </div>
    </body>
</html>

 