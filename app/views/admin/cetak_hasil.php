<?php 

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; Filename = Hasil-Perangkingan-Penerima-PKH.xls");

$rank = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border=1>
        <tr>
            <th scope="col">Rank</th>
            <th scope="col">Nama</th>
            <th scope="col">Club</th>
            <th scope="col">Nilai Preferensi</th>
            <th scope="col">No. Urut</th>
        </tr>
            <?php for($i = 0; $i < count($data['hasil']); $i++) : ?>
                <tr>
                    <td><?= $rank++; ?></td>
                    <td><?= $data['hasil'][$i]['nama'] ?></td>
                    <td><?= $data['hasil'][$i]['club'] ?></td>
                    <td>
                                <?php $output = number_format($data['hasil'][$i]['nilai'], 7, '.', '');  ?>
                                <?= $output; ?>
                            </td>
                            <td><?= $data['hasil'][$i]['no_urut'] ?></td>
                </tr>
            <?php endfor; ?>
    </table>
</body>
</html>