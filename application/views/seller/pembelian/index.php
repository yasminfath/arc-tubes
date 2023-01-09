<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Daftar Pembelian</title>
</head>

<body>
    <?php $this->load->view('navbar'); ?>
    <br>
    <div class="d-flex" id="wrapper">
        <div class="row">
            <div class="col">
            <div class="container-fluid">
            <h3 class="fs-3 mb-3">Sirkulasi Buku</h3>
                <table class="table bg-white rounded shadow-sm  table-hover">
                    <thead>
                        <tr>
                            <th scope="col" width="50">Nomor</th>
                            <th scope="col">Username Pembeli</th>
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
                                <td>'. $buku['email'] .'</td>
                                <td>'. $buku['kd_buku'] .'</td>
                                <td>'. $buku['judul_buku'] .'</td>
                                <td>'. $buku['tanggal_beli'] .'</td>
                                <td>'. $buku['tanggal_konfirmasi_beli'] .'</td>
                                <td>'. $buku['tanggal_dikirim'] .'</td>
                                <td>'. $buku['estimasi_sampai'] .'</td>
                                <td>'. $buku['tanggal_sampai'] .'</td>
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function() {
        el.classList.toggle("toggled");
    };
    </script>
</body>

</html>