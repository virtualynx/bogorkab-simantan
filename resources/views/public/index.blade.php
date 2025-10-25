@extends('template.temp')

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

                    <form method="get" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search" onsubmit="searchMarkers(event)">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bi-search" id="basic-addon1">
                                
                            </span>

                            <input name="keyword" type="search" class="form-control" id="keyword" placeholder="Nama sekolah ..." aria-label="Search" autocomplete="off">
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

    <script>
        function loadGoogleMaps() {
            return new Promise(function(resolve, reject) {
                if (typeof google === 'undefined' || typeof google.maps === 'undefined') {
                    // Load the Google Maps JavaScript API
                    var script = document.createElement('script');
                    script.src = 'https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initMap';
                    script.async = true;
                    script.defer = true;
                    script.onerror = reject;
                    script.onload = resolve;
                    document.head.appendChild(script);
                } else {
                    resolve();
                }
            });
        }

        var map;
        var markers = []; // Declare markers array to store marker objects

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -6.6020, lng: 106.7651},
                zoom: 14
            });

            var markerCoords = [
                {lat: -6.5971, lng: 106.8060},
                {lat: -6.5946, lng: 106.7904},
                {lat: -6.6030, lng: 106.7950},
                // Add more coordinates as needed
            ];

            // Function to add markers and bind popups
            function addMarkers() {
                for (var i = 0; i < markerCoords.length; i++) {
                    var marker = new google.maps.Marker({
                        position: markerCoords[i],
                        map: map,
                    });
                    marker.markID = i;
                    marker.markName = "sekolah " + (i + 1);

                    // Add click event listener to each marker
                    marker.addListener('click', function () {
                        openMarker(this);
                    });

                    markers.push(marker);
                }
            }

            // Function to open the sidebar and display marker information
            function openMarker(marker) {
                var infoWindowContent = getInfoWindowContent(marker);
                document.getElementById('sidebarContent').innerHTML = infoWindowContent;
                sidebarContainer.classList.add("open");
                document.getElementById('map').classList.add("map-with-sidebar"); 
            }

            // Function to close the sidebar
            function closeSidebar() {
                sidebarContainer.classList.remove("open");
                document.getElementById('map').classList.remove("map-with-sidebar");
            }

            // Attach click event listener to the close button
            var closeSidebarBtn = document.getElementById("closeSidebarBtn");
            closeSidebarBtn.addEventListener("click", function() {
                closeSidebar();
            });

            // Call the addMarkers function to add markers to the map initially
            addMarkers();
        }

        // Function to filter markers based on search keyword
        function searchMarkers(event) {
            event.preventDefault();

            var keyword = document.getElementById("keyword").value.toLowerCase();

                markers.forEach(function (marker) {
                    var popupContent = marker.get('content').toLowerCase();
                    if (popupContent.indexOf(keyword) > -1) {
                        marker.setVisible(true);
                    } else {
                        marker.setVisible(false);
                    }
                });
            }

        function getInfoWindowContent(marker) {
            var content = `
                <div class="text-center">
                    <h6 class="fs-10 mb-2">Sekolah ${marker.markID + 1}</h6>
                    <!-- Add more information as needed -->
                </div>
            `;
            return content;
        }

        loadGoogleMaps().then(function() {
            initMap();
        }).catch(function(error) {
            console.error('Failed to load Google Maps API:', error);
        });
    </script>
@endsection
