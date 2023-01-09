<?php
$this->load->library('session');
$role_akun = $this->session->userdata('role');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        html, body, section
{
    position: relative;
    height: 100%;
}
    </style>
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
                    <a class="nav-link" href="' . base_url('seller/buku') .'">Daftar Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="' . base_url('seller/pembelian') .'">Buku Yang Dibeli</a>
                </li>
                ';
            }
            else if($role_akun === "customer"){
            echo'
            <li class="nav-item">
                <a class="nav-link" href="' . base_url('customer/buku') .'">Daftar Buku</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="' . base_url('customer/buku_anda') .'">Riwayat Pembelian</a>
            </li>
            ';
            }
        ?>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('logout') ?>">Logout</a>
      </li>
    </ul>
  </div>
</nav>

</body>

</html>