 <?php 
 $db = mysqli_connect("localhost", "root", "", "boxrate");

 if (isset($_POST['Pesan'])) {
 	$idpesanan = mysqli_real_escape_string($db, $_POST['id-pesan']);
    $jumlah = mysqli_real_escape_string($db, $_POST['jumlah']);

    $query="UPDATE pesanan SET jumlah=(jumlah+'$jumlah') WHERE id_menu='$idpesanan'";

    mysqli_query($db, $query);

     $sql="SELECT * FROM pesanan WHERE jumlah=(SELECT MAX(jumlah) FROM pesanan)";
    $result=mysqli_query($db, $sql);
    while ($row=mysqli_fetch_array($result)) {
    	$maksimal=(double) $row['jumlah'];
    }

    $sql="SELECT * FROM pesanan";
    $result=mysqli_query($db, $sql);
    while ($row=mysqli_fetch_array($result)) {
    	$pesanan=(int) $row['jumlah'];
    	$idmenu= (int) $row['id_menu'];
    	$query="UPDATE menu SET rating=(('$pesanan'/'$maksimal')*100) WHERE id='$idmenu'";
    	 mysqli_query($db, $query);
    }

 

    header('location: ../isi%20rating/input-pesanan.php');
}

?>