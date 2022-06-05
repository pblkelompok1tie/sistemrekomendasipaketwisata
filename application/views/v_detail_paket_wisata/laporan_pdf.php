<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Paket Wisata</title>
</head>

<body>

    <h3 style="text-align:center;">Data Paket Wisata</h3>
    <br>
    <br>
    <br>
    <table>
        <tr>
            <th>Id Paket Wisata</th>
            <th>Id Admin</th>
            <th>Id Penginapan</th>
            <th>Id Tempat Makan</th>
            <th>Id Tic</th>
            <th>Nama Paket Wisata</th>
            <th>Deskripsi Paket Wisata</th>
            <th>Harga Paket Wisata</th>
            <th>Rating Paket Wisata</th>
            <th>Durasi Paket Wisata</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($paket_wisata as $p) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $p['id_admin']; ?></td>
                <td><?= $p['id_penginapan']; ?></td>
                <td><?= $p['id_tempat_makan']; ?></td>
                <td><?= $p['id_tic']; ?></td>
                <td><?= $p['nama_paket_wisata']; ?></td>
                <td><?= $p['deskripsi_paket_wisata']; ?></td>
                <td><?= $p['harga_paket_wisata']; ?></td>
                <td><?= $p['rating_paket_wisata']; ?></td>
                <td><?= $p['durasi_paket_wisata']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>