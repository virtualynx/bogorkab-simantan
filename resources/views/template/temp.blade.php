 <!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>SIMANTAN |  {{ $title }}</title>

        <!-- CSS FILES -->        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap" rel="stylesheet">
                        
        <link href="{{ asset('theme') }}/css/bootstrap.min.css" rel="stylesheet">

        <link href="{{ asset('theme') }}/css/bootstrap-icons.css" rel="stylesheet">

        <link href="{{ asset('theme') }}/css/templatemo-topic-listing.css" rel="stylesheet">      

        {{-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
        <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
         --}}
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

        <!-- Include the Font Awesome CSS for the school icon -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        {{-- {!! RecaptchaV3::initJs() !!} --}}

        <style>
            /* Example of custom styles for the Places Autocomplete input box */
            .pac-target-input {
            /* Add your custom styles here */
                margin-top: 0.5rem;
                width: 300px;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
                font-size: 16px;
            }

            /* Example of custom styles for the dropdown suggestions */
            .pac-container {
            /* Add your custom styles here */
                background-color: #fff;
                border: 1px solid #ccc;
                max-height: 200px;
                overflow-y: auto;
                font-size: 14px;
            }

        </style>

        @stack('head_stacks') <!-- For CSS / JS stacks -->
    </head>
    
    <body id="top">
        <!-- Toast Container -->
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div id="successToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header bg-success text-white">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    <strong class="me-auto">Sukses</strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('success') }}
                </div>
            </div>
            <div id="errorToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header bg-danger text-white">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    <strong class="me-auto">Error</strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('error') }}
                </div>
            </div>
        </div>
        <script>
            @if(session('success'))
                document.addEventListener('DOMContentLoaded', function() {
                    var successToast = new bootstrap.Toast(document.getElementById('successToast'));
                    successToast.show();
                });
            @endif
            @if(session('error'))
                document.addEventListener('DOMContentLoaded', function() {
                    var errorToast = new bootstrap.Toast(document.getElementById('errorToast'));
                    errorToast.show();
                });
            @endif
        </script>

        <main>
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <div class="d-flex justify-content-between w-100">
                        <a class="navbar-brand" href="{{ route('/') }}">
                            <!-- <i class="bi-back"></i> -->
                            <img src="{{URL::asset('/img/simantan-logo.png')}}" alt="logo" height="100" width="100">
                        </a>
        
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
        
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('/') }}">Beranda</a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                        Sarpas PAUD
                                    </a>
                                    <ul class="dropdown-menu">
                                        {{-- <li><a class="dropdown-item" href="{{ route('sarpas.tk') }}">Sarpas TK</a></li>
                                        <li><a class="dropdown-item" href="{{ route('sarpas.kb') }}">Sarpas KB</a></li>
                                        <li><a class="dropdown-item" href="{{ route('sarpas.sps') }}">Sarpas SPS</a></li> --}}
                                        <li><a class="dropdown-item" href="{{ url('/sarpas/paud_view?spm=SPM_TK') }}">Sarpas TK</a></li>
                                        <li><a class="dropdown-item" href="{{ url('/sarpas/paud_view?spm=SPM_KB') }}">Sarpas KB</a></li>
                                        <li><a class="dropdown-item" href="{{ url('/sarpas/paud_view?spm=SPM_SPS') }}">Sarpas SPS</a></li>
                                    </ul>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                        Sarpas Dasar
                                    </a>
                                    <ul class="dropdown-menu">
                                        {{-- <li><a class="dropdown-item" href="{{ url('/sarpas/sd') }}">Sarpas SD Test</a></li> --}}
                                        <li><a class="dropdown-item" href="{{ url('/sarpas/dasar_view?spm=SPM_SD') }}">Sarpas SD</a></li>
                                        <li><a class="dropdown-item" href="{{ url('/sarpas/dasar_view?spm=SPM_SMP') }}">Sarpas SMP</a></li>
                                    </ul>
                                </li>
        
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/statistics_') }}">Statistik_</a>
                                    {{-- <a class="nav-link" href="{{ url('/statistics') }}">Statistik</a> --}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- ===============================================-->
            <!--    Content-->
            <!-- ===============================================-->
            @yield('content')
            <!-- ===============================================-->
            <!--    End Content-->
            <!-- ===============================================-->
            {{-- <footer class="site-footer section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 col-12 mb-4 pb-2">
                            <a class="navbar-brand mb-2" href="index.html">
                                <i class="bi-back"></i>
                                <span>Topic</span>
                            </a>
                        </div>

                        <div class="col-lg-3 col-md-4 col-6">
                            <h6 class="site-footer-title mb-3">Resources</h6>

                            <ul class="site-footer-links">
                                <li class="site-footer-link-item">
                                    <a href="#" class="site-footer-link">Home</a>
                                </li>

                                <li class="site-footer-link-item">
                                    <a href="#" class="site-footer-link">How it works</a>
                                </li>

                                <li class="site-footer-link-item">
                                    <a href="#" class="site-footer-link">FAQs</a>
                                </li>

                                <li class="site-footer-link-item">
                                    <a href="#" class="site-footer-link">Contact</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-3 col-md-4 col-6 mb-4 mb-lg-0">
                            <h6 class="site-footer-title mb-3">Information</h6>

                            <p class="text-white d-flex mb-1">
                                <a href="tel: 305-240-9671" class="site-footer-link">
                                    305-240-9671
                                </a>
                            </p>

                            <p class="text-white d-flex">
                                <a href="mailto:info@company.com" class="site-footer-link">
                                    info@company.com
                                </a>
                            </p>
                        </div>

                        <div class="col-lg-3 col-md-4 col-12 mt-4 mt-lg-0 ms-auto">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                English</button>

                                <ul class="dropdown-menu">
                                    <li><button class="dropdown-item" type="button">Thai</button></li>

                                    <li><button class="dropdown-item" type="button">Myanmar</button></li>

                                    <li><button class="dropdown-item" type="button">Arabic</button></li>
                                </ul>
                            </div>

                            <p class="copyright-text mt-lg-5 mt-4">Copyright © 2048 Topic Listing Center. All rights reserved.
                            <br><br>Design: <a rel="nofollow" href="https://templatemo.com" target="_blank">TemplateMo</a> Distribution <a href="https://themewagon.com">ThemeWagon</a></p>
                            
                        </div>

                    </div>
                </div>
            </footer> --}}
            
            <footer class="site-footer section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 col-12 mb-4 pb-2">
                            <a class="navbar-brand mb-2" href="index.html">
                                <i class="bi-back"></i>
                                <span>Kecamatan Ciomas</span>
                            </a>
                        </div>

                        <div class="col-lg-3 col-md-4 col-6">
                            {{-- <h6 class="site-footer-title mb-3">Resources</h6>

                            <ul class="site-footer-links">
                                <li class="site-footer-link-item">
                                    <a href="#" class="site-footer-link">Home</a>
                                </li>

                                <li class="site-footer-link-item">
                                    <a href="#" class="site-footer-link">How it works</a>
                                </li>

                                <li class="site-footer-link-item">
                                    <a href="#" class="site-footer-link">FAQs</a>
                                </li>

                                <li class="site-footer-link-item">
                                    <a href="#" class="site-footer-link">Contact</a>
                                </li>
                            </ul> --}}
                        </div>

                        <div class="col-lg-3 col-md-4 col-6 mb-4 mb-lg-0">
                            <h6 class="site-footer-title mb-3">Information</h6>

                            <p class="text-white d-flex mb-1">
                                <a href="tel:(0251) 8634644" class="site-footer-link">
                                    (0251) 8634644
                                </a>
                            </p>

                            <p class="text-white d-flex">
                                <a href="https://kecamatanciomas.bogorkab.go.id/" class="site-footer-link">
                                    kecamatanciomas.bogorkab.go.id
                                </a>
                            </p>
                        </div>

                        <div class="col-lg-3 col-md-4 col-12 mt-4 mt-lg-0 ms-auto">
                            {{-- <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                English</button>

                                <ul class="dropdown-menu">
                                    <li><button class="dropdown-item" type="button">Thai</button></li>

                                    <li><button class="dropdown-item" type="button">Myanmar</button></li>

                                    <li><button class="dropdown-item" type="button">Arabic</button></li>
                                </ul>
                            </div> --}}

                            <p class="copyright-text mt-lg-5 mt-4">Copyright © 2025 Kecamatan Ciomas. All rights reserved.
                            <br>Developer: <a rel="nofollow" href="https://www.linkedin.com/in/eryandi-angga-pratama-177159171" target="_blank">Eryandi Angga P.</a>
                            <br><br>Design: <a rel="nofollow" href="https://templatemo.com" target="_blank">TemplateMo</a> Distribution <a href="https://themewagon.com">ThemeWagon</a></p>
                            
                        </div>

                    </div>
                </div>
            </footer>
        </main>
 <!-- JAVASCRIPT FILES -->
        <script src="{{ asset('/theme') }}/js/jquery.min.js"></script>
        <script src="{{ asset('/theme') }}/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('/theme') }}/js/jquery.sticky.js"></script>
        <script src="{{ asset('/theme') }}/js/custom.js"></script>

        @stack('scripts') <!-- For JS stacks -->
    </body>
</html>