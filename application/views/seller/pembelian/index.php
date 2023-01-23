<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transaksi</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/tabel-style.css'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <?php $this->load->view('navbar'); ?>
    <div class="row">
        <div class="col">
            <div class="container-fluid">
                <br>
                <h3 class="fs-3 mb-3">DAFTAR TRANSAKSI</h3>
                <br>
                <table class="table bg-white rounded shadow-sm table-hover">
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
                                    <td><span class="badge text-bg-light">'. $buku['email'] .'</span></td>
                                    <td><span class="badge text-bg-light">'. $buku['kd_buku'] .'</span></td>
                                    <td><span class="badge text-bg-light">'. $buku['judul_buku'] .'</span></td>
                                    <td><span class="badge text-bg-light">'. $buku['tanggal_beli'] .'</span></td>';
                                    if($buku['tanggal_konfirmasi_beli'] === NULL){
                                        echo'
                                        <form action="'. base_url('seller/konfirm_beli') .'" method="get">
                                            <input type="hidden" name="id_beli" value ="'. $buku['id_beli'] .'">
                                            <input type="hidden" name="id_buku" value ="'. $buku['id_buku'] .'">
                                            <td><input type="submit" value="Konfirmasi" class="btn btn-warning btn-sm"><td>
                                        </form>
                                        <td> </td>
                                        <td> </td>
                                        ';
                                    }
                                    else{
                                        echo'
                                        <td><span class="badge text-bg-light">'. $buku['tanggal_konfirmasi_beli'] .'</span></td>';
                                        if($buku['tanggal_dikirim'] === NULL){
                                            echo'
                                            <form action="'. base_url('seller/kirim_barang') .'" method="get">
                                                <input type="hidden" name="id_beli" value ="'. $buku['id_beli'] .'">
                                                <td><input type="submit" value="Kirim Barang" class="btn btn-warning btn-sm"><td>
                                            </form>
                                            <td> </td>
                                            ';
                                        }
                                        else{
                                            echo'
                                            <td><span class="badge text-bg-light">'. $buku['tanggal_dikirim'] .'</span></td>
                                            <td><span class="badge text-bg-light">'. $buku['estimasi_sampai'] .'</span></td>
                                            ';
                                            if($buku['tanggal_sampai'] === NULL){
                                                echo'
                                                <form action="'. base_url('seller/barang_sampai') .'" method="get">
                                                    <input type="hidden" name="id_beli" value ="'. $buku['id_beli'] .'">
                                                    <td><input type="submit" value="Barang Sampai" class="btn btn-warning btn-sm"><td>
                                                </form>
                                                ';
                                            }
                                            else{
                                                echo'
                                                    <td><span class="badge text-bg-light">'. $buku['tanggal_sampai'] .'</span></td>
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