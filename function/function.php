<?php


function FormatTgl($tanggal){

	$tgl = substr($tanggal, 8, 2);
	$bln = substr($tanggal, 5, 2);
	$thn = substr($tanggal, 0, 4);

	switch ($bln) {
		case '01':
			$bln = 'Januari';
			break;
		case '02':
			$bln = 'Februari';
			break;
		case '03':
			$bln = 'Maret';
			break;
		case '04':
			$bln = 'April';
			break;
		case '05':
			$bln = 'Mei';
			break;
		case '06':
			$bln = 'Juni';
			break;
		case '07':
			$bln = 'Juli';
			break;
		case '08':
			$bln = 'Agustus';
			break;
		case '09':
			$bln = 'September';
			break;
		case '10':
			$bln = 'Oktober';
			break;
		case '11':
			$bln = 'November';
			break;
		case '12':
			$bln = 'Desember';
			break;
		
		default:
			$bln = 'Error';
			break;

	}

	$newtanggal = $tgl.' '.$bln.' '.$thn;
	return $newtanggal;

}


function FormatJK($jk){

	if($jk == 'l'){
		$jenkel = 'Laki-laki';
	}else{
		$jenkel = 'Perempuan';
	}

	return $jenkel;

}


?>