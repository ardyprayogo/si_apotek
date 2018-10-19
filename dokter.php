<?php

include_once('header.php');

?>


<div class="container">

	<div class="my-5">
		<h1 class="display-3 text-center">
			<i class="fa fa-user-o"></i>
			Daftar Dokter
		</h1>
		<table class="table table-hover mt-5 text-center text-capitalize">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Spesialis</th>
					<th>Telp</th>
				</tr>
			</thead>

<?php
include_once('class/config.php');
$conn = new Koneksi();
$koneksi = $conn->GetKoneksi();


include_once('class/dokter.php');

$dokter = new Dokter($koneksi);

$result = $dokter->ReadAll();
$no = 1;
while($row = $result->fetch_assoc()){
?>

			<tbody>
				<tr>
					<td><?=$no?></td>
					<td><?=$row['nama_dokter']?></td>
					<td><?=$row['alamat']?></td>
					<td><?=$row['spesialis']?></td>
					<td><?=$row['telp']?></td>
				</tr>
			</tbody>

<?php

$no++;
}

?>
	
		</table>

	</div>
</div>



<?php

include_once('footer.php');

?>