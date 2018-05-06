
<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
	<link rel="stylesheet" type="text/css" href="menu.css">
</head>
<body>
   <header id="header">
        <h1>Edit Menu</h1>
    </header>


	<div id="content">
    <form  id="form" method="post" action="server.php" enctype="multipart/form-data">
      <input type="hidden" name="size" value="1000000">
      <div>
        <label id="icon" for="file-input">
          <img src="addimage2.png">
        </label>
        <input id="file-input" type="file" name="image"><br>
        <input id="input-name" type="text" name="text" placeholder="Masukan Nama Makanan"><br>
        <input id="input-name" type="number" name="price" placeholder="Masukan Harga Rupiah">
      </div>
      <div>
        <input id='submit'  type="submit" name="upload" value ="upload image">
      </div>
    </form>
   <?php
         $db = mysqli_connect("localhost", "root", "", "boxrate");
         $sql= "SELECT * FROM menu";
         $result = mysqli_query($db, $sql);
         while ($row=mysqli_fetch_array($result)) {
           echo "<label for='delete'> <img id='img-delete' src='trash.png'></label>";
           echo "<div id='img_div'>";
            echo "<img id='list-menu' src='images/".$row['image']."'>";
            echo "<p id='name' >".$row['description']."</p>";
            echo "<p id='price'> Harga Rp.<strong>".$row['price'].",-</strong></p>";
            echo "<form method='post' action='server.php'>";
            
            echo "<input id='check' name='check' type='checkbox' value='".$row['id']."'>";
            echo "<input id='delete' onclick=\"return confirm('Are you sure delete this')\" type='submit' name='delete' value='delete'>";
            echo "</form>";
           echo "</div>";
         }

    ?>

		
	</div>
</body>
</html>