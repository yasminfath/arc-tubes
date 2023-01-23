<?php
$this->load->library('session');
$role_akun = $this->session->userdata('role');
?>

<!DOCTYPE html>
<html lang="en">

<head>
 </head>

<body>
<nav class="navbar navbar-fixed-top navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <?php
            if($role_akun === "seller"){
                echo'
                <li class="nav-item">
                <a class="nav-link" href="' . base_url('seller/buku') .'">DAFTAR BUKU</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="' . base_url('seller/pembelian') .'">DAFTAR TRANSAKSI</a>
                </li>
                ';
              }
              else if($role_akun === "customer"){
                echo'
                <li class="nav-item">
                <a class="nav-link" href="' . base_url('customer/buku') .'">KATALOG BUKU</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="' . base_url('customer/buku_anda') .'">RIWAYAT TRANSAKSI</a>
                </li>
                ';
              }
              ?>
                </ul>
              </div>
              <h3 class="nav-title"><a href="<?= base_url('logout') ?>"">Log Out</a></h3>
      </nav>
</body>

</html>