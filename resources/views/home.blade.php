@extends('layouts.master')
@section('title', 'AG Home Industri')
@section('content')
<!-- Modal -->
<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="w-100 pt-1 mb-5 text-right">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="get" class="modal-content modal-body border-0 p-0">
            <div class="input-group mb-2">
                <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                <button type="submit" class="input-group-text bg-success text-light">
                    <i class="fa fa-fw fa-search text-white"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Start Banner Hero -->
<div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="assets/images/produk/images.jpeg" alt="" style="margin-left:100px;width: 400px; height: 350px;">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left align-self-center">
                            <h1 class="h1 text-success"><b>AG Home</b> Industri</h1>
                            <h3 class="h2">Kami Menghadirkan Konsep Kreatif dan Ramah Lingkungan</h3>
                            <p>
                                AG Home Industri adalah bisnis parsel yang menggunakan barang bekas untuk menciptakan produk unik dan ramah lingkungan. Kami menghadirkan hadiah-hadiah berkualitas tinggi dengan konsep kreatif yang mendukung upaya pelestarian lingkungan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="assets/images/produk/images (2).jpeg" alt="" style="margin-left:100px;width: 400px; height: 350px;">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1 text-success">Solusi Praktis Dan Elegan Untuk Kebutuhan Anda.</h1>
                            <h3 class="h2">Menjadikannya pilihan sempurna untuk acara apapun.</h3>
                            <p>
                            Percayakan kebutuhan kemasan nasi Anda pada AG Home Industri,
                            karena kami mengutamakan <strong>kualitas</strong> dan <strong>kepuasan pelanggan.</strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="assets/images/produk/images (1).jpeg" alt="" style="margin-left:100px;width: 400px; height: 350px;">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1 text-success">Untuk Momen Spesial Dalam Hidup Anda.</h1>
                            <h3 class="h2">Desain menawan dan material berkualitas menambah kesan istimewa pada pernikahan Anda.</h3>
                            <p>
                            Jadikan setiap detail pernikahan Anda sempurna dengan produk unggulan dari AGHome Industri, pilihan terbaik untuk hantaran seserahan Anda.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
        <i class="fas fa-chevron-left"></i>
    </a>
    <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
        <i class="fas fa-chevron-right"></i>
    </a>
</div>
<!-- End Banner Hero -->

<!-- Start Categories of The Month -->
<section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Kategori</h1>
            <p>
                Jelajahi beragam parsel dengan desain kreatif dan inovatif yang cocok sebagai hadiah untuk berbagai kesempatan.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-4 p-5 mt-3 d-flex flex-column align-items-center">
            <a href="#">
                <img src="assets/images/produk/images (4).jpeg" class="rounded-circle img-fluid border" style="width: 200px; height: 200px;">
            </a>
            <h5 class="text-center mt-3 mb-3">Kotak Sanggan</h5>
            <p class="text-center mt-auto"><a class="btn btn-success">Go Shop</a></p>
        </div>
        <div class="col-12 col-md-4 p-5 mt-3 d-flex flex-column align-items-center">
            <a href="#">
                <img src="assets/images/produk/images (5).jpeg" class="rounded-circle img-fluid border" style="width: 200px; height: 200px;">
            </a>
            <h2 class="h5 text-center mt-3 mb-3">Kotak Hadiah</h2>
            <p class="text-center mt-auto"><a class="btn btn-success">Go Shop</a></p>
        </div>
        <div class="col-12 col-md-4 p-5 mt-3 d-flex flex-column align-items-center">
            <a href="#">
                <img src="assets/images/produk/images (3).jpeg" class="rounded-circle img-fluid border" style="width: 200px; height: 200px;">
            </a>
            <h2 class="h5 text-center mt-3 mb-3">Kotak Parsel</h2>
            <p class="text-center mt-auto"><a class="btn btn-success">Go Shop</a></p>
        </div>
    </div>
</section>

<!-- End Categories of The Month -->

<!-- Start Featured Product -->
<section class="bg-light">
    <div class="container py-5">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Best Seller</h1>
                <p>
                    Produk-produk yang paling diminati oleh pelanggan kami karena kreatifitasnya yang luar biasa dan dampak lingkungannya yang positif.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 mb-4">
                <div class="card h-100">
                    <a href="shop-single.html">
                        <img src="assets/images/produk/images (1).jpeg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                            </li>
                            <li class="text-muted text-right">Rp 45.000</li>
                        </ul>
                        <a href="shop-single.html" class="h2 text-decoration-none text-dark">Kotak Kado</a>
                        <p class="card-text">
                            Kotak kado kami, dibuat dengan teliti dan bahan berkualitas, menggambarkan perhatian dan keistimewaan dengan selera anda.
                        </p>
                        <p class="text-muted">Reviews (24)</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="card h-100">
                    <a href="shop-single.html">
                        <img src="assets/images/produk/images (2).jpeg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                            </li>
                            <li class="text-muted text-right">Rp 130.000</li>
                        </ul>
                        <a href="shop-single.html" class="h2 text-decoration-none text-dark">Kotak Kue Tart</a>
                        <p class="card-text">
                            Solusi praktis dan elegan untuk menyajikan kue tart dengan tampilan yang rapi dan menarik. Menjaga kelembapan dan kelezatan kue tart.
                        </p>
                        <p class="text-muted">Reviews (48)</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="card h-100">
                    <a href="shop-single.html">
                        <img src="assets/images/produk/download.jpeg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                            </li>
                            <li class="text-muted text-right">Rp 150.000</li>
                        </ul>
                        <a href="shop-single.html" class="h2 text-decoration-none text-dark">Kotak Seserahan</a>
                        <p class="card-text">
                            Pilihan sempurna untuk menyimpan dan menghias perhiasan ter istimewa yang khusus untuk anda.
                        </p>
                        <p class="text-muted">Reviews (74)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Featured Product -->

@endsection