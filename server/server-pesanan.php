 <?php 
 $db = mysqli_connect("localhost", "root", "", "boxrate");

 if (isset($_POST['Pesan'])) {
 	$idpesanan = mysqli_real_escape_string($db, $_POST['id-pesan']);
    $jumlah = mysqli_real_escape_string($db, $_POST['jumlah']);

    $query="UPDATE pesanan SET jumlah=(jumlah+'$jumlah') WHERE id_menu='$idpesanan'";

    mysqli_query($db, $query);

    $sql="SELECT MAX(p.jumlah) AS jumlah,m.ket FROM pesanan p, menu m WHERE p.id_menu=m.id GROUP BY m.ket";
    $result=mysqli_query($db, $sql);
    while ($row=mysqli_fetch_array($result)) {
    	$ket=(string) $row['ket'];
    	if (strcmp($ket,'makanan')==0)
    		$maksmakanan=(double) $row['jumlah'];
    	elseif (strcmp($ket,'minuman')==0)
    		$maksminuman=(double) $row['jumlah'];
    }


    $sql="SELECT * FROM pesanan p, menu m WHERE p.id_menu=m.id";
    $result=mysqli_query($db, $sql);
    while ($row=mysqli_fetch_array($result)) {
    	$pesanan=(int) $row['jumlah'];
    	$idmenu= (int) $row['id_menu'];
    	$ket=(string) $row['ket'];

    	if (strcmp($ket,'makanan')==0) {
    		$rating=number_format((($pesanan/$maksmakanan)*100),2);

    		$query="UPDATE menu SET rating='$rating' WHERE id='$idmenu' and ket='makanan'";
    	}
    	elseif (strcmp($ket,'minuman')==0) {
    		$rating=number_format((($pesanan/$maksminuman)*100),2);
    		$query="UPDATE menu SET rating='$rating' WHERE id='$idmenu' and ket='minuman'";
    	}
    	 mysqli_query($db, $query);
    }

 

    header('location: ../isi%20rating/input-pesanan.php');
}

?>