@extends('template.temp')

@push('head_stacks')
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <!-- Awesomplete CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/awesomplete/1.1.5/awesomplete.min.css" />

    <style>
        .awesomplete {
            width: 100%;
            position: relative;
        }

        .awesomplete > input {
            width: 100%;
            padding: 12px 45px 12px 15px;
            font-size: 16px;
            border: 2px solid #ddd;
            border-radius: 8px;
            transition: border-color 0.3s ease;
        }

        .awesomplete > input:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
        }

        .awesomplete > ul {
            position: absolute;
            left: 0;
            right: 0;
            z-index: 1000;
            background: white;
            border: 1px solid #007bff;
            border-top: none;
            border-radius: 0 0 8px 8px;
            max-height: 200px;
            overflow-y: auto;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: -1px;
        }

        .awesomplete > ul > li {
            padding: 12px 15px;
            cursor: pointer;
            border-bottom: 1px solid #f0f0f0;
            font-size: 15px;
        }

        .awesomplete > ul > li:hover {
            background-color: #f8f9fa;
        }

        .awesomplete > ul > li[aria-selected="true"] {
            background-color: #007bff;
            color: white;
        }

        .awesomplete mark {
            background-color: #fff3cd;
            padding: 0;
        }
    </style>
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
            z-index: 1001;
        }

        .sidebar-container {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            padding: 20px;
            background-color: #fff;
            box-shadow: 2px 0 4px rgba(0, 0, 0, 0.2);
            width: 320px;
            display: none;
            z-index: 1000;
            overflow-y: auto;
        }

        .sidebar-container.open {
            display: block;
        }

        .close-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            background: none;
            border: none;
            font-size: 24px;
            color: #333;
            cursor: pointer;
            z-index: 1001;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.2s ease;
        }

        .close-btn:hover {
            background-color: #f0f0f0;
        }

        #map {
            position: relative;
            z-index: 1;
            height: 500px;
            width: 100%;
        }

        .search-container {
            position: relative;
        }

        .clear-search {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: #999;
            display: none;
            z-index: 1002;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.2s ease;
        }

        .clear-search:hover {
            color: #333;
            background-color: #f0f0f0;
        }

        .search-container {
            position: relative;
            margin-bottom: 10px;
        }

        .custom-form {
            position: relative;
        }
    </style>
    <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 mx-auto">
                    <h1 class="text-white text-center">SIMANTAN</h1>

                    <h6 class="text-center">Sistem Informasi Pendidikan Kecamatan</h6>

                    <div class="custom-form mt-4 pt-2 mb-lg-0 mb-5">
                        <div class="search-container">
                            <input 
                                type="search" 
                                class="form-control form-control-lg" 
                                id="schoolSearch" 
                                placeholder="Cari nama sekolah ..." 
                                aria-label="Search"
                                autocomplete="off"
                            >
                            <button type="button" class="clear-search" id="clearSearch">×</button>
                        </div>
                    </div>
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
                                <button id="closeSidebarBtn" class="close-btn" title="Tutup panel">×</button>
                                <div id="sidebarContent" class="content">
                                    <!-- School info will be loaded here -->
                                </div>
                                <!-- Add gauge container -->
                                <style>
                                    #completionGaugeContainer {
                                        border-top: 1px solid #eee;
                                        padding-top: 15px;
                                        margin-top: 15px;
                                    }

                                    #completionGauge {
                                        margin: 0 auto;
                                        display: block;
                                    }
                                </style>
                                <div id="completionGaugeContainer" style="text-align: center; display: none;">
                                    <canvas id="completionGauge" width="200" height="120"></canvas>
                                    <div id="gaugeLabel" style="margin-top: 10px; font-weight: bold;"></div>
                                </div>
                            </div>
                            <!-- Map container -->
                            <style>
                                .sidebar-container {
                                    pointer-events: auto;
                                }

                                #map {
                                    pointer-events: all;
                                }
                            </style>
                            <div id="map" style="height: 500px;"></div>
                            <div class="section-overlay"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- Awesomplete JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/awesomplete/1.1.5/awesomplete.min.js"></script>

    <!-- Gauge.js -->
    <script src="https://cdn.jsdelivr.net/npm/gaugeJS/dist/gauge.min.js"></script>

    <script>
        let map, markers = {};
        let schoolDataList = [];
        let awesomplete;

        $(document).ready(function() {
            initMap();

            map.on('click', function() {
                document.getElementById('sidebarContainer').classList.remove('open');
            });

            // Clear search button
            $('#clearSearch').on('click', function() {
                $('#schoolSearch').val('');
                $(this).hide();
                showAllMarkers();
            });

            // Show/hide clear button based on input
            $('#schoolSearch').on('input', function() {
                $('#clearSearch').toggle($(this).val().length > 0);
            });

            // Close sidebar when clicking close button
            $('#closeSidebarBtn').on('click', function(e) {
                e.stopPropagation(); // Prevent event from bubbling to map
                document.getElementById('sidebarContainer').classList.remove('open');
            });
            
            // Load school data
            $.ajax({
                url: '{{ url("api/history/school/answered_list") }}',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        schoolDataList = response.data;
                        response.data.forEach(row => {
                            if(row.lat){
                                addMarker(row.lat, row.lng, row);
                            }
                        });
                        fitMapToMarkers();
                        initAutocomplete();
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
                    alert('Gagal memuat data sekolah');
                }
            });
        });

        function initMap() {
            const defaultLat = -6.6027;
            const defaultLng = 106.7653;
            
            map = L.map('map').setView([defaultLat, defaultLng], 15);
            
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
        }

        function initAutocomplete() {
            const schoolNames = schoolDataList.map(school => school.name || '').filter(name => name);
            
            awesomplete = new Awesomplete(document.getElementById('schoolSearch'), {
                list: schoolNames,
                minChars: 1,
                maxItems: 10,
                autoFirst: true
            });

            // Handle selection from autocomplete
            $('#schoolSearch').on('awesomplete-selectcomplete', function() {
                const selectedSchoolName = $(this).val();
                const selectedSchool = schoolDataList.find(school => school.name === selectedSchoolName);
                
                if (selectedSchool) {
                    // Hide all markers
                    Object.values(markers).forEach(marker => {
                        marker.setOpacity(0.0);
                    });
                    
                    // Find and show the selected marker
                    const marker = Object.values(markers).find(m => 
                        m.schoolData && m.schoolData.name === selectedSchoolName
                    );
                    
                    if (marker) {
                        marker.setOpacity(1);
                        map.setView(marker.getLatLng(), 16);
                        showSchoolInfo(selectedSchool);
                    }
                }
            });

            // Handle enter key press
            $('#schoolSearch').on('keydown', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    const searchTerm = $(this).val().toLowerCase().trim();
                    
                    if (searchTerm === '') {
                        showAllMarkers();
                        return;
                    }
                    
                    // Hide all markers first
                    Object.values(markers).forEach(marker => {
                        marker.setOpacity(0.0);
                    });
                    
                    // Show matching markers
                    const visibleMarkers = [];
                    Object.entries(markers).forEach(([id, marker]) => {
                        const schoolName = marker.schoolData?.name?.toLowerCase() || '';
                        if (schoolName.includes(searchTerm)) {
                            marker.setOpacity(1);
                            visibleMarkers.push(marker);
                        }
                    });
                    
                    // Fit map to visible markers
                    if (visibleMarkers.length > 0) {
                        const group = new L.featureGroup(visibleMarkers);
                        map.fitBounds(group.getBounds(), { padding: [20, 20] });
                    } else {
                        alert('Tidak ada sekolah yang sesuai dengan pencarian: ' + searchTerm);
                    }
                    
                    document.getElementById('sidebarContainer').classList.remove('open');
                }
            });
        }

        function addMarker(lat, lng, schoolData){
            const markerId = `marker_${lat}_${lng}_${Date.now()}`;
            const marker = L.marker([lat, lng], { 
                draggable: false,
                opacity: 1
            }).addTo(map);
            
            marker.schoolData = schoolData;
            markers[markerId] = marker;
            
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
            const gaugeContainer = document.getElementById('completionGaugeContainer');
            
            // Show basic school info immediately
            // sidebarContent.innerHTML = `
            //     <h3>${schoolData.name || 'N/A'}</h3>
            //     <p><strong>NPSN:</strong> ${schoolData.NPSN || 'N/A'}</p>
            //     <p><strong>Kepala Sekolah:</strong> ${schoolData.headmaster_name || 'N/A'}</p>
            //     <p><strong>Alamat:</strong> ${schoolData.address || 'N/A'}</p>
            //     <p><strong>Akreditasi:</strong> ${schoolData.accreditation || 'N/A'}</p>
            // `;
            
            sidebarContent.innerHTML = `
                <h3>${schoolData.name || 'N/A'}</h3>
                <p><strong>NPSN:</strong> ${schoolData.NPSN || 'N/A'}</p>
                <p><strong>Kepala Sekolah:</strong> ${schoolData.headmaster_name || 'N/A'}</p>
                <p><strong>Alamat:</strong> ${schoolData.address || 'N/A'}</p>
                <p><strong>Akreditasi:</strong> ${schoolData.accreditation || 'N/A'}</p>
                <div class="mt-3">
                    <a href="{{ url('/school/answers') }}?school_id=${schoolData.school_id}" class="btn btn-primary btn-sm" target="_blank">
                        Lihat Laporan SPM
                    </a>
                </div>
            `;
            
            document.getElementById('sidebarContainer').classList.add('open');
            
            if (!completionGauge) {
                try {
                    initCompletionGauge();
                } catch (error) {
                    console.error('Gauge initialization failed:', error);
                    gaugeContainer.style.display = 'none';
                }
            }
            
            $.ajax({
                url: '{{ url("api/completion-rate") }}',
                type: 'GET',
                data: { 
                    school_id: schoolData.school_id,
                    year: new Date().getFullYear()
                },
                success: function(response) {
                    if (response.success && response.data.completion_rate !== null) {
                        const completionRate = response.data.completion_rate;
                        gaugeContainer.style.display = 'block';
                        
                        if (completionGauge) {
                            completionGauge.set(completionRate);
                            document.getElementById('gaugeLabel').textContent = 
                                `Tingkat Kelengkapan: ${completionRate}%`;
                        }
                    } else {
                        gaugeContainer.style.display = 'none';
                        sidebarContent.innerHTML += '<p><strong>Tingkat Kelengkapan:</strong> Data tidak tersedia</p>';
                    }
                },
                error: function() {
                    gaugeContainer.style.display = 'none';
                    sidebarContent.innerHTML += '<p><strong>Tingkat Kelengkapan:</strong> Data tidak tersedia</p>';
                }
            });
        }

        function showAllMarkers() {
            Object.values(markers).forEach(marker => {
                marker.setOpacity(1);
            });
            fitMapToMarkers();
            document.getElementById('sidebarContainer').classList.remove('open');
        }

        let completionGauge = null;

        function initCompletionGauge() {
            const opts = {
                angle: -0.25,
                lineWidth: 0.2,
                radiusScale: 0.8,
                pointer: {
                    length: 0.6,
                    strokeWidth: 0.035,
                    color: '#000000'
                },
                limitMax: true,
                limitMin: true,
                colorStart: '#6F6EA0',
                colorStop: '#C0C0DB',
                strokeColor: '#E0E0E0',
                generateGradient: true,
                highDpiSupport: true,
                percentColors: [[0.0, "#ff0000"], [0.5, "#f9c802"], [1.0, "#00ff00"]],
                staticZones: [
                    {strokeStyle: "#FF0000", min: 0, max: 60},
                    {strokeStyle: "#F9C802", min: 60, max: 80},
                    {strokeStyle: "#00FF00", min: 80, max: 100}
                ]
            };
            
            const target = document.getElementById('completionGauge');
            completionGauge = new Gauge(target).setOptions(opts);
            completionGauge.maxValue = 100;
            completionGauge.setMinValue(0);
            completionGauge.animationSpeed = 32;
            completionGauge.set(0);
        }
    </script>
@endpush