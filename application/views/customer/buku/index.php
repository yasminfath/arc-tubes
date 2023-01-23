<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Katalog Buku</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/daftar_buku-style.css'); ?> " type="text/css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <?php $this->load->view('navbar'); ?>

    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://source.unsplash.com/1600x400/?book,store" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/1600x400/?book,store" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/1600x400/?book,store" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>
    <div class="container">
        <h2 class="text-center my-3"> DAFTAR BUKU </h2>
        <div class="row">
            <?php 
                foreach($data_buku as $buku){
                    echo '
                    <div class="col-md-4 my-2">
                    <div class="card">
                    <img src="https://source.unsplash.com/500x400/?,book,'.$buku['kategori_buku'].'"class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">'.$buku['judul_buku'].'</h5>
                        <p class="card-text"> </p>
                        <form action="'. base_url('customer/beli') .'" method="get">
                            <input type="hidden" name="id_buku" value ="'. $buku['id_buku'] .'">
                            <td><input type="submit" value="Beli Buku" class="btn btn-primary data-bs-toggle="modal" data-bs-target="#exampleModal" ><td>
                        </form>
                    </div>
                    </div>
                    </div>';
                }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>

</body>

</html>