 <?php 
 $db = mysqli_connect("localhost", "root", "", "boxrate");

 if (isset($_POST['Pesan'])) {
 	$idpesanan = mysqli_real_escape_string($db, $_POST['id-pesan']);
    $jumlah = mysqli_real_escape_string($db, $_POST['jumlah']);

    $query="UPDATE pesanan SET jumlah=(jumlah+'$jumlah') WHERE id_menu='$idpesanan'";

    mysqli_query($db, $query);

    header('location: ../isi%20rating/input-pesanan.php');
}

?>