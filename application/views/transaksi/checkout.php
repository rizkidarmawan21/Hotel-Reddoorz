<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOTA PEMBAYARAN </title>
    <style>
        .container {
            width: 90%;
            margin: 0 auto;
        }

        .main {
            margin-top: 50px;

        }


        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #848785;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="head">
            <table width="100%">
                <tr>
                    <td width="20%"> <img width="100%" src="https://images.tokopedia.net/img/cache/215-square/GAnVPX/2021/3/19/a02c1e0e-d498-4976-95a2-db215d732b00.png" alt=""> </td>
                    <td align="center">
                        <h2>NOTA PEMBAYARAN APOTIK NINDY</h2>
                    </td>
                </tr>
            </table>
            <hr />

            <div class="main">
                <table id="customers">
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                    <?php $total = 0 ; $i = 1; foreach($transaksi as $t) :?>
                    <tr>
                        <td><?= $i++?></td>
                        <td><?= $t['nama_obat'] ?></td>
                        <td>Rp. <?= number_format($t['harga'], 0, ',', '.') ?> / <?= $t['satuan'] ?></td>
                        <td><?= $t['jumlah_barang'] ?></td>
                        <td>Rp. <?= number_format($t['total'], 0, ',', '.') ?></td>
                    </tr>
                    <?php
                    $total += $t['total'];
                    endforeach ?>
                    <tr>
                        <td colspan="4" align="right" >Total :</td>
                        <td>Rp. <?= number_format($total, 0, ',', '.') ?></td>
                    </tr>

                </table>
            </div>
        </div>

    </div>
</body>
<script>
    window.print()
</script>

</html>