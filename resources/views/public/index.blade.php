@extends('template.temp')

@push('head_stacks')
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <!-- Leaflet Locate Control CSS -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.76.0/dist/L.Control.Locate.min.css" /> --}}
@endpush

@section('content')    
    <style>
        .close-btn {
            position: absolute;
            top: -3.5rem;
            background: none;
            border: none;
            font-size: 32px;
            color: #fdfdfd;
            cursor: pointer;
            z-index: 1001; /* Increase z-index to make sure it appears above the sidebar */
        }

        .sidebar-container {
            position: absolute;
            top: 50px;
            padding: 10px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            width: 320px;
            display: none;
            z-index: 1000;
        }
        .sidebar-container.open {
            display: block;
        }

        #map {
            position: relative;
            z-index: 1;
        }

        #map.map-with-sidebar {
            margin-left: 320px; /* Set the left margin to give space for the sidebar */
        }

    </style>
    <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 mx-auto">
                    <h1 class="text-white text-center">SIMANTAN</h1>

                    <h6 class="text-center">Sistem Informasi Pendidikan Kecamatan</h6>

                    {{-- <form method="get" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search" onsubmit="searchMarkers(event)">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bi-search" id="basic-addon1">
                                
                            </span>

                            <input name="keyword" type="search" class="form-control" id="keyword" placeholder="Nama sekolah ..." aria-label="Search" autocomplete="off">
                            <button type="submit" class="form-control">Search</button>
                        </div>
                    </form> --}}

                    <style>
                        #clearSearchBtn {
                            border: 1px solid #ced4da;
                            background: white;
                            font-size: 18px;
                            padding: 0 12px;
                            cursor: pointer;
                        }
                    </style>
                    <form method="get" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search" onsubmit="searchMarkers(event)">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bi-search" id="basic-addon1"></span>
                            
                            <input name="keyword" type="search" class="form-control" id="keyword" placeholder="Nama sekolah ..." aria-label="Search" autocomplete="off">
                            
                            <button type="button" class="btn btn-outline-secondary" id="clearSearchBtn" style="display: none;">×</button>
                            
                            <button type="submit" class="form-control">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="featured-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="custom-block custom-block-overlay">
                        <div class="d-flex flex-column h-100">
                            <!-- Sidebar container to display marker information -->
                            <div id="sidebarContainer" class="sidebar-container">
                                <button id="closeSidebarBtn" class="close-btn">&#8249;</button>
                                <div id="sidebarContent" class="content">

                                </div>
                            </div>
                            <!-- Map container -->
                            <div id="map" style="height: 500px;"></div>
                            <div class="section-overlay"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

{{-- OSM map --}}
@push('scripts')
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- Leaflet Locate Control JS -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.76.0/dist/L.Control.Locate.min.js"></script> --}}

    <script>
        // Add this script after your existing document ready function
        let map, markers = {};

        $(document).ready(function() {
            initMap();

            $.ajax({
                url: '{{ url("api/history/school/answered_list") }}',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        response.data.forEach(row => {
                            if(row.lat){
                                addMarker(row.lat, row.lng, row);
                            }
                        });
                        fitMapToMarkers(); // Add this line
                    } else {
                        alert('Gagal memuat data sekolah');
                    }
                },
                error: function(xhr, status, error) {
                    let errorMessage = `Error ${xhr.status}: `;
                    errorMessage += xhr.statusText || 'Unknown error';
                    
                    try {
                        const response = JSON.parse(xhr.responseText);
                        errorMessage = response.message || response.error || errorMessage;
                    } catch (e) {
                        // Not JSON response
                    }

                    console.error('AJAX Error', xhr.status, error);
                    console.log('errorMessage', errorMessage);
                    alert('Gagal memuat data sekolah');
                },
                complete: function() {
                }
            });

            $('#clearSearchBtn').on('click', function() {
                showAllMarkers();
            });
            
            $('#keyword').on('input', function() {
                toggleClearButton();
            });
            
            // Initialize clear button state
            toggleClearButton();
        });

        function initMap() {
            // Default location (you can set to user's current location or a default)
            const defaultLat = -6.6027;
            const defaultLng = 106.7653;
            
            // Initialize map
            map = L.map('map').setView([defaultLat, defaultLng], 15);
            // map = L.map('map');
            
            // Add OSM tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
        }

        function addMarker(lat, lng, schoolData){
            const markerId = `marker_${lat}_${lng}_${Date.now()}`;
            const marker = L.marker([lat, lng], { 
                draggable: false,
                opacity: 1
            }).addTo(map);
            
            // Store school data with marker
            marker.schoolData = schoolData;
            markers[markerId] = marker;
            
            // Add click event to show school info
            marker.on('click', function() {
                showSchoolInfo(schoolData);
            });
            
            return marker;
        }

        function fitMapToMarkers() {
            if (Object.keys(markers).length > 0) {
                const group = new L.featureGroup(Object.values(markers));
                map.fitBounds(group.getBounds(), { padding: [20, 20] });
            }
        }

        function showSchoolInfo(schoolData) {
            const sidebarContent = document.getElementById('sidebarContent');
            sidebarContent.innerHTML = `
                <h3>${schoolData.name || 'N/A'}</h3>
                <p>Alamat: ${schoolData.address || 'N/A'}</p>
                <!-- Add more school info as needed -->
            `;
            document.getElementById('sidebarContainer').classList.add('open');
        }

        function searchMarkers(event) {
            event.preventDefault();
            const keyword = $('#keyword').val().toLowerCase().trim();
            
            // Hide all markers first
            Object.values(markers).forEach(marker => {
                marker.setOpacity(0.3);
            });
            
            // Show only matching markers
            Object.entries(markers).forEach(([id, marker]) => {
                const schoolName = marker.schoolData?.name?.toLowerCase() || '';
                if (schoolName.includes(keyword)) {
                    marker.setOpacity(1);
                }
            });
            
            // Fit map to visible markers
            const visibleMarkers = Object.values(markers).filter(marker => 
                marker.options.opacity === 1
            );
            
            if (visibleMarkers.length > 0) {
                const group = new L.featureGroup(visibleMarkers);
                map.fitBounds(group.getBounds(), { padding: [20, 20] });
            }

            document.getElementById('sidebarContainer').classList.remove('open');
        }

        // Function to show all markers
        function showAllMarkers() {
            Object.values(markers).forEach(marker => {
                marker.setOpacity(1);
            });
            fitMapToMarkers();
            $('#keyword').val('');
            $('#clearSearchBtn').hide();
            document.getElementById('sidebarContainer').classList.remove('open');
        }

        // Function to handle clear search button visibility
        function toggleClearButton() {
            const hasValue = $('#keyword').val().trim() !== '';
            $('#clearSearchBtn').toggle(hasValue);
        }
    </script>
@endpush
