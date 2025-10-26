<div class="row mb-3">
    <div class="col-md-12">
        <label class="form-label">Pilih titik lokasi <span class="mandatory-tag">*</span></label>
        <div id="mapContainer" style="display: block; height: 300px; border-radius: 8px; overflow: hidden;">
            <div id="map" style="height: 100%;"></div>
        </div>
        
        <input type="hidden" name="lat">
        <input type="hidden" name="lng">
    </div>
</div>

@push('head-stacks')
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <!-- Leaflet Locate Control CSS -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.76.0/dist/L.Control.Locate.min.css" /> --}}
@endpush

{{-- OSM map --}}
@push('scripts')
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- Leaflet Locate Control JS -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.76.0/dist/L.Control.Locate.min.js"></script> --}}

    <script>
        // Add this script after your existing document ready function
        let map, marker;

        $(document).ready(function() {
            initMap();

            // setTimeout(function() {
            //     if(marker){
            //         map.setView(marker.getLatLng(), 15);
            //     }
            // }, 300);
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
            
            // Add marker
            // marker = L.marker([defaultLat, defaultLng], {draggable: true}).addTo(map);
            
            // Set initial coordinates
            // $('#latitude').val(defaultLat);
            // $('#longitude').val(defaultLng);
            
            // Update marker position when map is clicked
            map.on('click', async function(event) {
                const {lat, lng} = event.latlng;

                if(!marker){
                    initMarker(lat, lng);
                }

                marker.setLatLng([lat, lng]);
                $('[name="lat"]').val(lat);
                $('[name="lng"]').val(lng);

                // Show loading state in address field
                // $('textarea[name="address"]').val('Mendapatkan alamat...');

                // Get address from coordinates
                // const address = await getAddressFromCoordinates(lat, lng);
                // if (address) {
                //     $('textarea[name="address"]').val(address);
                // } else {
                //     $('textarea[name="address"]').val('Alamat tidak dapat ditemukan. Silakan ketik manual.');
                // }

                // Get address when marker is dragged
                const address = await getAddressFromCoordinates(lat, lng);
            });
            
            // Add locate control
            // const locateControl = L.control.locate({
            //     position: 'topright',
            //     strings: {
            //         title: "Tunjukkan lokasi saya"
            //     }
            // }).addTo(map);
        }

        function initMarker(lat, lng){
            marker = L.marker([lat, lng], {draggable: true}).addTo(map);
                    
            // Update coordinates when marker is dragged
            marker.on('dragend', async function(event) {
                const position = marker.getLatLng();
                $('[name="lat"]').val(position.lat);
                $('[name="lng"]').val(position.lng);

                // Show loading state in address field
                $('textarea[name="address"]').val('Mendapatkan alamat...');
                
                // Get address when marker is dragged
                const address = await getAddressFromCoordinates(position.lat, position.lng);
            });
        }

        // Function to get address from coordinates using Nominatim (OSM)
        async function getAddressFromCoordinates(lat, lng) {
            if($('textarea[name="address"]').data('manual-input') == true)return;

            try {
                // Show loading state in address field
                $('textarea[name="address"]').val('Mendapatkan alamat...');

                const response = await fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}&zoom=18&addressdetails=1`);
                const data = await response.json();
                
                if (data && data.display_name) {
                    $('textarea[name="address"]').val(data.display_name);

                    return data.display_name;
                }else{
                    $('textarea[name="address"]').val('Alamat tidak dapat ditemukan. Silakan ketik manual.');
                }

                return null;
            } catch (error) {
                console.error('Error getting address:', error);
                $('textarea[name="address"]').val('Error getting address');
                return null;
            }
        }
    </script>
@endpush