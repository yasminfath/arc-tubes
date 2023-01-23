<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi Anda</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/tabel-style.css'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

</head>

<body>
    <?php $this->load->view('navbar'); ?>
    <br>
        <div class="row">
            <div class="col">
                <div class="container-fluid">
                    <h3 class="fs-3 mb-3">RIWAYAT TRANSAKSI ANDA</h3>
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">Nomor</th>
                                    <th scope="col">Kode Buku</th>
                                    <th scope="col">Judul Buku</th>
                                    <th scope="col">Tanggal Pembelian</th>
                                    <th scope="col">Tanggal Konfirmasi Pembelian</th>
                                    <th scope="col">Tanggal Barang Dikirim</th>
                                    <th scope="col">Estimasi Sampai</th>
                                    <th scope="col">Penerimaan Barang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $nomor = 1;
                                foreach($buku_anda as $buku)
                                {
                                    echo'
                                    <tr>
                                    <form action="'. base_url('customer/sampai') .'" method="get">
                                        <th scope="row">'. $nomor .'</th>
                                        <td><span class="badge text-bg-light">'. $buku['kd_buku'] .'</span></td>
                                        <td><span class="badge text-bg-light">'. $buku['judul_buku'] .'</span></td>
                                        <td><span class="badge text-bg-light">'. $buku['tanggal_beli'] .'</span></td>
                                    ';
                                    if($buku['tanggal_konfirmasi_beli'] === NULL){
                                        echo'<td> <span class="badge text-bg-secondary">Pembelian belum dikonfirmasi</span> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                        ';
                                    }
                                    else{
                                        echo'<td><span class="badge text-bg-light">'. $buku['tanggal_konfirmasi_beli'] .'</span></td>';
                                        if($buku['tanggal_dikirim'] === NULL){
                                            echo'<td>  <span class="badge text-bg-info">Buku pesanan sedang disiapkan</span> </td>
                                                <td> </td>
                                                <td> </td>
                                                ';
                                            }
                                            else{
                                                echo'<td><span class="badge text-bg-light">'. $buku['tanggal_dikirim'] .'</span></td>
                                                <td><span class="badge text-bg-light">'. $buku['estimasi_sampai'] .'</span></td>
                                                ';
                                                if($buku['tanggal_sampai'] !== NULL){
                                                    echo'<td><span class="badge text-bg-light">'. $buku['tanggal_sampai'] .'</span></td>';
                                                }
                                                else{
                                                    echo'<td><span class="badge text-bg-success"> Buku pesanan sedang diantar. </span></td>';
                                                }
                                                echo'<td> </td>';
                                        }
                                    }
                                    echo'
                                    </form>
                                </tr>
                                ';
                                $nomor++;
                                }
                                ?>
                            </tbody>
                        </table>
                </div>
            </div>
    </div>
    </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>