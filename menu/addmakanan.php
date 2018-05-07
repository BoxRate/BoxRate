
<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
	<link rel="stylesheet" type="text/css" href="menu.css">
</head>
<body>
   <header id="header">
        <h1>Edit Makanan</h1>
    </header>


	<div id="content">
    <form  id="form" method="post" action="server-makanan.php" enctype="multipart/form-data">
      <input type="hidden" name="size" value="1000000">
      <div>
        <label id="icon" for="file-input">
          <img src="addimage2.png">
        </label>
        <input id="file-input" type="file" name="image"><br>
        <input id="input-name" type="text" name="text" placeholder="Nama Makanan"><br>
        <input id="input-name" type="number" name="price" placeholder="Harga Rupiah">
      </div>
      <div>
        <input id='submit'  type="submit" name="upload" value ="upload image">
      </div>
    </form>
   <?php
         $db = mysqli_connect("localhost", "root", "", "boxrate");
         $sql= "SELECT * FROM menu WHERE ket='makanan'";
         $result = mysqli_query($db, $sql);
         echo "<form method='post' action='server-makanan.php'>";
           echo "<label for='delete'> <img id='img-delete' src='trash.png'></label>";
           echo "<label id='select-all' for='check-all'>Select All
                </label>";
         while ($row=mysqli_fetch_array($result)) {
            echo "<div id='img_div'>";
            echo "<img id='list-menu' src='images/".$row['image']."'>";
            echo "<p id='name' >".$row['description']."</p>";
            echo "<p id='price'> Harga Rp.<strong>".$row['price'].",-</strong></p>";
            echo "<input id='check' name='check[]' type='checkbox' value='".$row['id']."'>";
            echo "<input id='delete' onclick=\"return confirm('Are you sure delete this')\" type='submit' name='delete' value='delete'>";
            
            echo "</div>";
         }
          echo "<input id ='check-all' type='checkbox' onclick='selectAll(this.checked)'>";
         echo "</form>";
    ?>

		
	</div>

  <script type="text/javascript">
      function selectAll(isChecked) {
      var items=document.getElementsByName('check[]');
      if (isChecked) {
        for(var i=0; i<items.length; i++){
          if(items[i].type=='checkbox')
            items[i].checked=true;
        }
      } else {
        for(var i=0; i<items.length; i++){
          if(items[i].type=='checkbox')
            items[i].checked=false;
      }
        }
    }     
    </script>
</body>
</html>