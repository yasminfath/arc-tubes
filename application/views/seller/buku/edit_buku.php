<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sistem Perpustakaan</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <?php $this->load->view('navbar'); ?>
        <div class="row">
            <div class="col">
            <div class="container-fluid">
            <h3 class="fs-4 mb-3">Edit Data Buku</h3>
                <form action="<?= base_url('seller/submit_edit_buku') ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group mb-3">
                        <label class="col-1 col-form-label">Kode Buku</label>
                        <input type="text" name="kd_buku" placeholder="" value="<?= $data_buku['kd_buku'] ?>" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-1 col-form-label">Judul Buku</label>
                        <input type="text" name="judul_buku" placeholder="" value="<?= $data_buku['judul_buku'] ?>" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-1 col-form-label">Kategori Buku (satu kata, dalam bahasa Inggris)</label>
                        <input type="text" name="kategori_buku" placeholder="" value="<?= $data_buku['kategori_buku'] ?>" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-1 col-form-label">Nama Penulis</label>
                        <input type="text" name="penulis_buku" placeholder="" value="<?= $data_buku['penulis_buku'] ?>" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-1 col-form-label">Nama Penerbit</label>
                        <input type="text" name="penerbit_buku" placeholder="" value="<?= $data_buku['penerbit_buku'] ?>" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-1 col-form-label">Tahun Terbit</label>
                        <input type="text" name="tahun_terbit" placeholder="" value="<?= $data_buku['tahun_terbit'] ?>" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="col-1 col-form-label">Jumlah Buku</label>
                        <input type="text" name="jumlah" placeholder="" value="<?= $data_buku['jumlah'] ?>" class="form-control" required>
                    </div><br>
                    <input type="hidden" name="id_buku" value="<?= $data_buku['id_buku'] ?>">
                    <button type="submit" class="btn btn-success col-1"
                            name="simpan">Simpan</button>
                </form>
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