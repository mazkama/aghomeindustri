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


<section class="bg-success py-5">
    <div class="container">
        <div class="row align-items-center py-5">
            <div class="col-md-8 text-white">
                <h1>Tentang Kami</h1>
                <p>
                Selamat datang di AG Home Industri, tempat di mana kreativitas dan keberlanjutan bertemu. Kami adalah institusi yang berdedikasi untuk menciptakan kotak sanggan berkualitas tinggi dengan menggunakan barang-barang bekas yang ramah lingkungan. Setiap produk kami adalah hasil dari transformasi bahan bekas menjadi karya yang indah dan fungsional, menunjukkan komitmen kami terhadap lingkungan sekaligus menawarkan solusi kemasan yang elegan dan berkualitas. Di AGHome Industri, kami percaya bahwa dengan inovasi dan tanggung jawab, kita dapat menciptakan produk yang tidak hanya memuaskan kebutuhan Anda, tetapi juga menjaga kelestarian bumi kita.
                Terima kasih telah mendukung usaha kami untuk masa depan yang lebih hijau.
                </p>
            </div>
            <div class="col-md-4">
                <img src="assets/img/about-hero.svg" alt="About Hero">
            </div>
        </div>
    </div>
</section>
<!-- Close Banner -->

<!-- Start Section -->
<section class="container py-5">
    <div class="row text-center pt-5 pb-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Lokasi Kami</h1>
        </div>
    </div>
    <div id="map"></div>
</section>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNZX0h1SRdB8fX3XinFB3IUgE-EUYFlwE&callback=initMap" async defer></script>
<script>
    function initMap() {
        var agHomeIndustri = {lat: -7.922441222027728, lng: 112.13016053775894};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: agHomeIndustri
        });
        var marker = new google.maps.Marker({
            position: agHomeIndustri,
            map: map
        });
    }
</script>
<style>
    #map {
        height: 500px;  /* Tinggi peta, bisa disesuaikan */
        width: 100%;    /* Lebar peta, bisa disesuaikan */
    }
</style>
<!-- End Section -->

<!-- Start Brands -->
<!--End Brands-->



@endsection