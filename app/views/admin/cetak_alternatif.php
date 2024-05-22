<?php 

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; Filename = Data-Calon-Penerima-PKH.xls");

$no = 1;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> DATA PESERTA UJIAN KENAIKAN TINGKAT SABUK HITAM</title>
</head>
<body>
      <table border= 1>
		<tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Club</th>
                  <?php for($i = 0; $i < $data['jumlahSub']; $i++): ?>    
                      <th scope="col"><?= ucwords($data['kriteria'][$i]['nama_kriteria']) ?></th>
                  <?php endfor ; ?>
		</tr>
		<?php for($i = 0; $i < count($data['alternatif']); $i++) : ?>
		<tr>
                  <td><?= $no++; ?></td>
                  <td><?= $data['alternatif'][$i]['nama'] ?></td>
                  <td><?= $data['alternatif'][$i]['club'] ?></td>
                  <?php for($j = 0; $j <$data['jumlahSub']; $j++) : ?>
                        <?php $namaKolom = str_replace(" ", "_",$data['kriteria'][$j]['nama_kriteria']) ?>
                        <?php $resultKolom = str_replace("_", " ", $data['alternatif'][$i][$namaKolom]) ?>
                        <td><?= $resultKolom ?></td>
                  <?php endfor; ?>
		</tr>
		<?php endfor; ?>
      </table>
</body>
</html>