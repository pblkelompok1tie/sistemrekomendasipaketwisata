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
            <th>Nama</th>
            <th>Alamat</th>
            <th>Kontak</th>
        </tr>
        <?php
        $no = 1;
        foreach ($tic as $a) :
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $a['nama_tic']; ?></td>
                <td><?php echo $a['alamat_tic']; ?></td>
                <td><?php echo $a['kontak_tic']; ?></td>
            </tr>
        <?php endforeach; ?>

    </table>
</body>

</html>