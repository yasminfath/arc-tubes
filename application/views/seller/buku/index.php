<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Daftar Buku</title>
</head>

<body>
    <?php $this->load->view('navbar'); ?>
    <br>
    <div class="d-flex" id="wrapper">
        <div class="row">
            <div class="col">
            <div class="container-fluid">
            <h3 class="fs-3 mb-3"><a href="<?= base_url('petugas/tambah_buku') ?>"><i class="fas fa-plus"></i></a>
            &nbsp; Daftar Buku</h3></h3>
                <br>
                <table class="table bg-white rounded shadow-sm  table-hover">
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
                            <th scope="col"></th>
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
                                <td>'. $buku['kd_buku'] .'</td>
                                <td>'. $buku['judul_buku'] .'</td>
                                <td>'. $buku['penulis_buku'] .'</td>
                                <td>'. $buku['penerbit_buku'] .'</td>
                                <td>'. $buku['tahun_terbit'] .'</td>
                                <td>'. $buku['jumlah'] .'</td>
                                <td>
                                <form action="'. base_url('petugas/tambah_jumlah') .'" method="GET">
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
                                <a href="'. base_url('petugas/edit_buku?id_buku='. $buku['id_buku'] .'') . '"><i class="fas fa-edit"></i></a>
                                &nbsp;
                                <a href="'. base_url('petugas/hapus_buku?id_buku='. $buku['id_buku'] .'') . '"><i class="fas fa-trash"></i></a>
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
    <script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function() {
        el.classList.toggle("toggled");
    };
    </script>
</body>

</html>