<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Daftar Pembelian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="style.css"> -->
</head>

<body>
    <?php $this->load->view('navbar'); ?>
    <div class="row">
        <div class="col">
            <div class="container-fluid">
            <br>
            <h3 class="fs-3 mb-3">Buku Anda</h3>
                <table class="table table-striped table-hover">
                    <thead>
                         <tr>
                            <th scope="col" width="50">Nomor</th>
                            <th scope="col">Username Pembeli</th>
                            <th scope="col">Kode Buku</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Tanggal Pembelian</th>
                            <th scope="col">Konfirmasi Pembelian</th>
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
                                    <th scope="row">'. $nomor .'</th>
                                    <td>'. $buku['email'] .'</td>
                                    <td>'. $buku['kd_buku'] .'</td>
                                    <td>'. $buku['judul_buku'] .'</td>
                                    <td>'. $buku['tanggal_beli'] .'</td>';
                                    if($buku['tanggal_konfirmasi_beli'] === NULL){
                                        echo'
                                        <form action="'. base_url('seller/konfirm_beli') .'" method="get">
                                            <input type="hidden" name="id_beli" value ="'. $buku['id_beli'] .'">
                                            <input type="hidden" name="id_buku" value ="'. $buku['id_buku'] .'">
                                            <td><input type="submit" value="Konfirmasi" class="btn btn-primary btn-sm"><td>
                                        </form>
                                        <td> </td>
                                        <td> </td>
                                        ';
                                    }
                                    else{
                                        echo'
                                        <td>'. $buku['tanggal_konfirmasi_beli'] .'</td>';
                                        if($buku['tanggal_dikirim'] === NULL){
                                            echo'
                                            <form action="'. base_url('seller/kirim_barang') .'" method="get">
                                                <input type="hidden" name="id_beli" value ="'. $buku['id_beli'] .'">
                                                <td><input type="submit" value="Kirim Barang" class="btn btn-primary btn-sm"><td>
                                            </form>
                                            <td> </td>
                                            ';
                                        }
                                        else{
                                            echo'
                                            <td>'. $buku['tanggal_dikirim'] .'</td>
                                            <td>'. $buku['estimasi_sampai'] .'</td>
                                            ';
                                            if($buku['tanggal_sampai'] === NULL){
                                                echo'
                                                <form action="'. base_url('seller/barang_sampai') .'" method="get">
                                                    <input type="hidden" name="id_beli" value ="'. $buku['id_beli'] .'">
                                                    <td><input type="submit" value="Barang Sampai" class="btn btn-primary btn-sm"><td>
                                                </form>
                                                ';
                                            }
                                            else{
                                                echo'
                                                    <td>'. $buku['tanggal_sampai'] .'</td>
                                                ';
                                            }
                                        }
                                    }
                                    echo'
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
    integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
</script>