<html>
<head>
	<title>Gallery</title>
<style type="text/css">
  .image{
   margin: 5px;
    border: 1px solid #ccc;
    float: left;
    width: 300px;
    height: 250px;
} 

.image:hover {
    border: 1px solid #777;
}

.image image {
    width: 100%;
    height: auto;
}

.desc {
    padding: 15px;
    text-align: center;
}
</style>

</head>

<body>
	
		<?php
           $db = mysqli_connect("localhost", "root", "", "boxrate");
           $sql= "SELECT * FROM menu WHERE ket='makanan'";
           $result = mysqli_query($db, $sql);
           while ($row=mysqli_fetch_array($result)) {
           		echo "<img class='image' src='images/makanan/".$row['image']."'>";

           }

           $sql= "SELECT * FROM menu WHERE ket='minuman'";
           $result = mysqli_query($db, $sql);
           while ($row=mysqli_fetch_array($result)) {
              echo "<img class='image' src='images/minuman/".$row['image']."'>";
           }

           ?>
	</table>
</body>
</html>