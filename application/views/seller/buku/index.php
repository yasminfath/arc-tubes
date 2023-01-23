<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
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
            <h3 class="fs-3 mb-3"><a href="<?= base_url('seller/tambah_buku') ?>"><i class="fas fa-plus" style="color:green"></i></a>
            &nbsp; DAFTAR BUKU</h3></h3>
                <br>
                <table class="table bg-white rounded shadow-sm table-hover">
                    <thead>
                         <tr>
                            <th scope="col" width="50">Nomor</th>
                            <th scope="col">Kode Buku</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Nama Penulis</th>
                            <th scope="col">Nama Penerbit</th>
                            <th scope="col">Tahun Terbit</th>
                            <th scope="col">Jumlah Stok</th>
                            <th scope="col">Tambah Stok</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $nomor = 1;
                        foreach($data_buku as $buku)
                        {
                            echo'
                            <tr>
                                <th scope="row">'. $nomor .'</th>
                                <td><span class="badge text-bg-light">'. $buku['kd_buku'] .'</span></td>
                                <td><span class="badge text-bg-light">'. $buku['judul_buku'] .'</span></td>
                                <td><span class="badge text-bg-light">'. $buku['penulis_buku'] .'</span></td>
                                <td><span class="badge text-bg-light">'. $buku['penerbit_buku'] .'</span></td>
                                <td><span class="badge text-bg-light">'. $buku['tahun_terbit'] .'</span></td>
                                <td><span class="badge text-bg-light">'. $buku['jumlah'] .'</td>
                                <td>
                                <form action="'. base_url('seller/tambah_jumlah') .'" method="GET">
                                    <select class="form-select form-select-sm" name="jumlah_baru" required>
                                    ';
                                        echo '<option value=""></option>';
                                        for($x=1;$x<=20;$x++){
                                            echo '<option value="'. $x .'">'. $x .'</option>';
                                        }
                                    echo'
                                    </select>
                                    </td>
                                    <input type="hidden" name="id_buku" value ="'. $buku['id_buku'] .'">
                                    <td><input type="submit" value="Tambah" class="btn btn-primary btn-sm"><td>
                                </form>
                                <td>
                                <a href="'. base_url('seller/edit_buku?id_buku='. $buku['id_buku'] .'') . '"><i class="fas fa-edit" style="color:#adaf08"></i></a>
                                &nbsp;
                                <a href="'. base_url('seller/hapus_buku?id_buku='. $buku['id_buku'] .'') . '"><i class="fas fa-trash" style="color:red"></i></a>
                                </td>
                                </tr>
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
</body>

</html>