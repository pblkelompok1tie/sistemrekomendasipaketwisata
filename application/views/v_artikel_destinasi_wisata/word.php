<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #3c3c3c;
            padding: 3px 8px;

        }

        a {
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }
    </style>

    <?php
    header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment;Filename=Absen.doc");
    ?>

    <!-- <td> <img src="<?php echo base_url(); ?>assets/img/logo/kab_madiun.png" width="90" height="90"></td> -->
    <td>
        <center>
            <font size="4"><b>DINAS PARIWISATA PEMUDA DAN OLAHRAGA</b></font><br>
            <font size="2"></font><br>
            <font size="2"><i>Jl. Raya Tiron No.87, Tiron, Kec. Madiun, Madiun, Jawa Timur 63151, Indonesia</i></font>
        </center>
    </td>
    <br></br>
    <table border="1" align="center">

        <tr>
            <th>No</th>
            <th>Nama Destinasi Wisata</th>
            <th>Alamat Destinasi Wisata</th>
            <th>Deskripsi Destinasi Wisata</th>
            <th>Harga Tiket Masuk</th>
            <th>Jam Operasional</th>
            <th>Foto</th>
        </tr>
        <?php
        $no = 1;
        foreach ($artikel_destinasi_wisata as $p) :
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $p['nama_destinasi_wisata']; ?></td>
                <td><?php echo $p['alamat_destinasi_wisata']; ?></td>
                <td><?php echo $p['deskripsi_destinasi_wisata']; ?></td>
                <td><?php echo $p['tiket_masuk']; ?></td>
                <td><?php echo $p['jam_operational']; ?></td>
                <td>
                    <img src="<?php echo base_url(); ?>assets/img/artikel_destinasi_wisata/<?= $p['foto_destinasi_wisata']; ?>" width="100" height="100">
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
</body>

</html>