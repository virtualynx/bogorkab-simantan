@extends('template.temp')

@section('content')
    <section class="hero-section-2 d-flex justify-content-center align-items-center" id="section_1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12 mx-auto">
                        <h1 class="text-white text-center">SARPAS TK</h1>
                    </div>
                </div>
            </div>
    </section>
    <section class="faq-section section-padding">
        <div class="container d-flex align-items-center justify-content-center">
            <div class="card col-lg-10 shadow">
                <div class="card-title">
                    <div class="text-center pt-5">
                        <h5 class="fs-0">FASILITASI PENCAPAIAN STANDAR PELAYANAN MINIMAL(SPM)</h5>
                    </div>
                </div>
                <hr>
                <form id="form-tk" class="needs-validation" novalidate action="{{ route('sarpas.tk') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="row gx-2">
                        <div class="col-lg-12 col-md-9 p-5">
                            <div class="row gx-2 mb-3">
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="name-school">Nama Sekolah<span class="icn-req">*</span></label>
                                    <div class="col">
                                        <input id="name-school" name="name-school" type="text" class="form-control @error('name-school') is-invalid @enderror" required="" placeholder="Nama Sekolah" value="{{ old('name-school') }}">
                                        @error('name-school')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="name-headmaster">Nama Kepala Sekolah<span class="icn-req">*</span></label>
                                    <div class="col">
                                        <input id="name-headmaster" name="name-headmaster" type="text" class="form-control @error('name-headmaster') is-invalid @enderror" required="" placeholder="Nama Kepala Sekolah" value="{{ old('name-headmaster') }}">
                                        @error('name-headmaster')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row gx-2 mb-3">
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="teacher">Jumlah Guru<span class="icn-req">*</span></label>
                                    <div class="col">
                                        <input id="teacher" name="teacher" type="text" class="form-control @error('teacher') is-invalid @enderror" required="" placeholder="Jumlah Guru" value="{{ old('teacher') }}">
                                        @error('teacher')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="nip">NIP (No Induk Pegawai)</label>
                                    <div class="col">
                                        <input id="nip" name="nip" type="text" class="form-control @error('nip') is-invalid @enderror" required="" placeholder="NIP" value="{{ old('nip') }}">
                                        @error('nip')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <div class="row gx-2 mb-3">
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="kualifikasi-akademik-guru">Kualifikasi Akademik Guru<span class="icn-req">*</span></label>
                                    <div class="col">
                                        <input id="kualifikasi-akademik-guru" name="kualifikasi-akademik-guru" type="text" class="form-control @error('kualifikasi-akademik-guru') is-invalid @enderror" required="" placeholder="" value="{{ old('kualifikasi-akademik-guru') }}">
                                        @error('kualifikasi-akademik-guru')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row gx-2 mb-3">
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="rombel-a">Rombel A<span class="icn-req">*</span></label>
                                    <div class="col">
                                        <input id="rombel-a" name="rombel-a" type="text" class="form-control @error('rombel-a') is-invalid @enderror" required="" placeholder="" value="{{ old('rombel-a') }}">
                                        @error('rombel-a')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="rombel-b">Rombel B<span class="icn-req">*</span></label>
                                    <div class="col">
                                        <input id="rombel-b" name="rombel-b" type="text" class="form-control @error('rombel-b') is-invalid @enderror" required="" placeholder="" value="{{ old('rombel-b') }}">
                                        @error('rombel-b')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="total-siswa">Total Siswa<span class="icn-req">*</span></label>
                                    <div class="col">
                                        <input id="total-siswa" name="total-siswa" type="text" class="form-control @error('total-siswa') is-invalid @enderror" required="" placeholder="" value="{{ old('total-siswa') }}">
                                        @error('total-siswa')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row gx-2 mb-3">
                                <div class="col-lg-2">
                                    <label class="col-form-label text-capitalize" for="akreditasi">Akreditasi<span class="icn-req">*</span></label>
                                    <div class="col">
                                        <div>
                                            <input type="radio" id="akreditasi_sudah" name="akreditasi" value="1" @if(old('akreditasi') === '1') checked @endif>
                                            <label for="akreditasi_sudah">Sudah</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="akreditasi_belum" name="akreditasi" value="0" @if(old('akreditasi') === '0') checked @endif>
                                            <label for="akreditasi_belum">Belum</label>
                                        </div>
                                        @error('akreditasi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="peringkat">Peringkat</label>
                                    <div class="col">
                                        <input id="peringkat" name="peringkat" type="text" class="form-control @error('peringkat') is-invalid @enderror" required="" placeholder="Jika sudah tulis peringkatnya" value="{{ old('peringkat') }}">
                                        @error('peringkat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4" />

                            <h5 class="fs-0 mb-1">Lokasi Pada Maps<span class="icn-req">*</span></h5>
                            {{-- MAPS --}}
                            {{-- <div id="map" style="height: 400px;"></div>
                            <input id="lokasi" type="hidden" name="lokasi" value="{{ old('lokasi') }}" required>
                            @error('lokasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror --}}
                            {{-- MAPS --}}

                            @include('component.address_map')

                            <h5 class="fs-0 mt-3 mb-1">Alamat<span class="icn-req">*</span></h5>

                            <div class="row gx-2">
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="address_province">Provinsi</label>
                                    <div class="col">
                                        <select id="address_province" name="address_province" class="form-control" required readonly>
                                            @if(isset($default_province))
                                                <option value="{{ $default_province['code'] }}" selected>{{ $default_province['name'] }}</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="address_regency">Kabupaten/Kota</label>
                                    <div class="col">
                                        <select id="address_regency" name="address_regency" class="form-control" required readonly>
                                            @if(isset($default_regency))
                                                <option value="{{ $default_regency['code'] }}" selected>{{ $default_regency['name'] }}</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row gx-2">
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="address_district">Kecamatan</label>
                                    <div class="col">
                                        <select id="address_district" name="address_district" class="form-control" required readonly>
                                            @if(isset($default_district))
                                                <option value="{{ $default_district['code'] }}" selected>{{ $default_district['name'] }}</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="address_village">Desa/Kelurahan<span class="icn-req">*</span></label>
                                    <div class="col">
                                        <select id="address_village" name="address_village" class="form-control @error('address_village') is-invalid @enderror" required>
                                            <option value="">-- Pilih Desa/Kelurahan --</option>
                                            @foreach($villages as $village)
                                                <option value="{{ $village['code'] }}" data-postal="{{ $village['postal'] ?? '' }}" 
                                                    {{ old('address_village') == $village['code'] ? 'selected' : '' }}>
                                                    {{ $village['name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('address_village')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row gx-2 mb-3">
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="address_detail">Detail RT/RW, Jalan, Dusun, Kode Pos</label>
                                    <div class="col">
                                        <textarea id="address_detail" name="address_detail" type="text" class="form-control @error('address_detail') is-invalid @enderror" required placeholder="Alamat Detail" value="{{ old('address_detail') }}"></textarea>
                                        @error('address_detail')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="row gx-2 mb-3">
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="alamat-5">Kode Pos</label>
                                    <div class="col">
                                        <input id="alamat-5" name="alamat-5" type="text" class="form-control @error('alamat-5') is-invalid @enderror" required readonly placeholder="Kode pos akan terisi otomatis" value="{{ old('alamat-5') }}">
                                        @error('alamat-5')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div> --}}

                            <hr class="my-4" />

                            <h5 class="fs-0 mb-1">{{ $spm_title }}<span class="icn-req">*</span></h5>
                            
                            @foreach($survey_questions as $index => $question)
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="k-{{ $question->survey_question_id }}">
                                        {{ $index + 1 }}. {!! $question->question !!}
                                    </label>
                                    <div class="col">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="k-{{ $question->survey_question_id }}-sudah" 
                                                name="k-{{ $question->survey_question_id }}" value="1" 
                                                @if(old('k-'.$question->survey_question_id) === '1') checked @endif>
                                            <label class="form-check-label" for="k-{{ $question->survey_question_id }}-sudah">Sudah</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="k-{{ $question->survey_question_id }}-belum" 
                                                name="k-{{ $question->survey_question_id }}" value="0" 
                                                @if(old('k-'.$question->survey_question_id) === '0') checked @endif>
                                            <label class="form-check-label" for="k-{{ $question->survey_question_id }}-belum">Belum</label>
                                        </div>
                                        @error('k-'.$question->survey_question_id)
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach

                            <div class="col mt-5">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        /*
        // Load province data on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-fill postal code when village is selected
            const villageSelect = document.getElementById('village');
            const postalInput = document.getElementById('alamat-5');
            
            villageSelect.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const postalCode = selectedOption.getAttribute('data-postal');
                
                if (postalCode) {
                    postalInput.value = postalCode;
                } else {
                    postalInput.value = '';
                }
            });
            
            // Trigger change event if there's already a selected value (for form validation errors)
            if (villageSelect.value) {
                villageSelect.dispatchEvent(new Event('change'));
            }
        });
        */
    </script>

    {{-- <script>
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
        var marker;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -6.5976289, lng: 106.7995698},
                zoom: 15
            });

            // Function to update the marker's popup content with address information
            function updateMarkerPopupContent(latlng) {
                var geocoder = new google.maps.Geocoder();
                geocoder.geocode({ 'location': latlng }, function(results, status) {
                    if (status === google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            var address = results[0].formatted_address;
                            marker.setPopupContent(address);
                        }
                    }
                });
            }

            // Function to update the hidden input value with the new latitude and longitude
            function updateHiddenInput(latlng) {
                document.getElementById('lokasi').value = latlng.lat() + ',' + latlng.lng();
            }

            // Add a marker for the initial view
            marker = new google.maps.Marker({
                position: {lat: -6.5976289, lng: 106.7995698},
                map: map,
                draggable: true // Enable marker dragging
            });

            marker.addListener('dragend', function() {
                var newPosition = marker.getPosition();
                updateMarkerPopupContent(newPosition);
                updateHiddenInput(newPosition);
            });

            // Add the geocoder control for searching locations
            var input = document.createElement('input');
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            var searchBox = new google.maps.places.SearchBox(input);
            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });

            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();

                if (places.length === 0) {
                    return;
                }

                // Clear out the old marker
                if (marker) {
                    marker.setMap(null);
                }

                // For each place, get the icon, name, and location.
                var place = places[0];
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }

                // Create a new marker and center the map on the selected location
                marker = new google.maps.Marker({
                    map: map,
                    position: place.geometry.location,
                    draggable: true // Enable marker dragging
                });
                map.setCenter(place.geometry.location);

                // Update the marker's popup content and hidden input value
                updateMarkerPopupContent(place.geometry.location);
                updateHiddenInput(place.geometry.location);

                marker.addListener('dragend', function() {
                    var newPosition = marker.getPosition();
                    updateMarkerPopupContent(newPosition);
                    updateHiddenInput(newPosition);
                });
            });
        }

        loadGoogleMaps().then(function() {
            initMap();
        }).catch(function(error) {
            console.error('Failed to load Google Maps API:', error);
        });
    </script> --}}
@endpush