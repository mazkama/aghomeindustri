<header>
    <!-- Start Top Nav -->
    <!-- <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:aghomeindustri@gmail.com">aghomeindustri@gmail.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="https://wa.me/+6285707771515">0857-0777-1515</a>
                </div>
                <div>
                    <a class="text-light" href="https://web.facebook.com/profile.php?id=100085361591145" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/ag_home_industri" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://wa.me/+6285707771515" target="_blank"><i class="fab fa-whatsapp fa-sm fa-fw me-2"></i></a>
                </div>
            </div>
        </div>
    </nav> -->
    <!-- Close Top Nav -->

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">


            <div class="navbar-brand text-success logo h1 align-self-center" style="display: flex; flex-direction: column; ">
                <span style="margin-bottom: -10px;">AG HOME</span>
                <span style="margin-top: -10px;" class="h1 text-success">Industri</span>
            </div>


            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('beranda') }}">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/tentang">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/belanja">Belanja</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/pemesanan">Pemesanan</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="{{ url('/keranjang') }}">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
            
                    </a>
                    <a id="iconmenu" class="nav-icon position-relative text-decoration-none" onclick="toggleSettings()">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        <!-- Card -->
                        <div id="settingsCard" class="card" style="display: none; position: absolute; top: 50px; right: 0; z-index: 999;">
                            <div class="card-body">
                                <!-- Settings List -->
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item" id="settingsItem" onmouseover="changeColor(this)" onmouseout="resetColor(this)" onclick="openSettings()" style="color:#000000">
                                        <div style="display: flex; align-items: center;">
                                            <i class="fa fa-fw fa-cog text-dark mr-2"></i>
                                            <span>Settings</span>
                                        </div>
                                    </li>
                                    <li class="list-group-item" id="logoutBtn" onmouseover="changeColor(this)" onmouseout="resetColor(this)" onclick="logout()" style="color:#000000">
                                        <div style="display: flex; align-items: center;">
                                            <i class="fa fa-fw fa-sign-out-alt text-dark mr-2"></i>
                                            <span>Logout</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->
</header>

<script>
 function toggleSettings() {
        const settingsCard = document.getElementById('settingsCard');
        if (settingsCard.style.display === 'none' || settingsCard.style.display === '') {
            settingsCard.style.display = 'block';
        } else {
            settingsCard.style.display = 'none';
        }
    }
    function changeColor(item) {
        item.getElementsByTagName("span")[0].style.color = '#59AB6E'; // Mengubah warna teks menu yang diarahkan
    }

    function resetColor(item) {
        item.getElementsByTagName("span")[0].style.color = '#000000'; // Mengembalikan warna teks ke warna aslinya saat kursor tidak mengarah
    }

    function openSettings() {
        // Lakukan sesuatu ketika tombol Settings diklik
        const form = document.createElement('form');
        form.method = 'GET';
        form.action = "{{ route('customer.profile') }}";
        form.innerHTML = `@csrf`;
        document.body.appendChild(form);
        form.submit();
        console.log("Settings clicked");
    }

    function logout() {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = "{{ route('logout') }}";
        form.innerHTML = `@csrf`;
        document.body.appendChild(form);
        form.submit();
        console.log("Logout clicked");
    }

</script>

<style>
    #iconmenu {
        cursor: pointer;
    }

    #settingsItem, #logoutBtn {
        cursor: pointer;
    }

    #settingsItem span, #logoutBtn span {
        cursor: pointer;
    }
</style>

