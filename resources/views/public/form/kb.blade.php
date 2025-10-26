@extends('template.temp')

@section('content')
    <section class="hero-section-2 d-flex justify-content-center align-items-center" id="section_1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12 mx-auto">
                        <h1 class="text-white text-center">SARPAS KB</h1>
                    </div>
                </div>
            </div>
    </section>
    <section class="faq-section section-padding">
        <div class="container d-flex align-items-center justify-content-center">
            <div class="card col-lg-10 shadow">
                <div class="card-title">
                    <div class="text-center pt-5">
                        <h5 class="fs-0">FASILITASI PENCAPAIAN STANDAR PELAYANAN MINIMAL(SPM) KB</h5>
                    </div>
                </div>
                <hr>
                <form id="form-tk" class="needs-validation" novalidate action="{{ route('sarpas.kb') }}" method="post" autocomplete="off">
                    @csrf

                    <input name="spm_level_id" type="hidden" value="SPM_KB">

                    <div class="row gx-2">
                        <div class="col-lg-12 col-md-9 p-5">
                            <div class="row gx-2 mb-3">
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="school_name">Nama Sekolah<span class="icn-req">*</span></label>
                                    <div class="col">
                                        <input id="school_name" name="school_name" type="text" class="form-control @error('school_name') is-invalid @enderror" required="" placeholder="Nama Sekolah" value="{{ old('school_name') }}">
                                        <input name="school_id" type="hidden" value="">
                                        <div id="school_search_loading" class="spinner-border spinner-border-sm d-none" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                        @error('school_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="school_npsn">NPSN</label>
                                    <div class="col">
                                        <input id="school_npsn" name="school_npsn" type="text" class="form-control @error('school_npsn') is-invalid @enderror" required="" placeholder="NPSN" value="{{ old('school_npsn') }}">
                                        @error('school_npsn')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row gx-2 mb-3">
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="headmaster_name">Nama Kepala Sekolah<span class="icn-req">*</span></label>
                                    <div class="col">
                                        <input id="headmaster_name" name="headmaster_name" type="text" class="form-control @error('headmaster_name') is-invalid @enderror" required="" placeholder="Nama Kepala Sekolah" value="{{ old('headmaster_name') }}">
                                        @error('headmaster_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="headmaster_nip">NIP (No Induk Pegawai)</label>
                                    <div class="col">
                                        <input id="headmaster_nip" name="headmaster_nip" type="text" class="form-control @error('headmaster_nip') is-invalid @enderror" required="" placeholder="NIP" value="{{ old('headmaster_nip') }}">
                                        @error('headmaster_nip')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4" />

                            <div class="row gx-2 mb-3">
                                <div class="col-3">
                                    <label class="col-form-label text-capitalize" for="teacher_count">Jumlah Guru<span class="icn-req">*</span></label>
                                    <div class="col">
                                        <input id="teacher_count" name="teacher_count" type="text" class="form-control @error('teacher_count') is-invalid @enderror" required="" placeholder="Jumlah Guru" value="{{ old('teacher_count') }}">
                                        @error('teacher_count')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            @foreach (['S3', 'S2', 'S1', 'Diploma', 'SMA', 'SMP', 'SD'] as $row)
                                <div class="row gx-2 mb-3">
                                    <div class="col-6">
                                        <label class="col-form-label text-capitalize" for="kualifikasi_count_{{ $row }}">Jumlah Tenaga Pendidik {{ $row }}</label>
                                        <div class="col">
                                            <input id="kualifikasi_count_{{ $row }}" name="kualifikasi_count_{{ $row }}" type="text" class="form-control @error('kualifikasi_count_'.$row) is-invalid @enderror" required="" placeholder="Jumlah Guru {{ $row }}" value="{{ old('kualifikasi_count_'.$row) }}">
                                            @error('kualifikasi_count_'.$row)
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <hr class="my-4" />

                            <div class="row gx-2 mb-3">
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="rombel_a">Rombel-A<span class="icn-req">*</span></label>
                                    <div class="col">
                                        <input id="rombel_a" name="rombel_a" type="text" class="form-control @error('rombel_a') is-invalid @enderror" required="" placeholder="" value="{{ old('rombel_a') }}">
                                        @error('rombel_a')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="rombel_b">Rombel-B<span class="icn-req">*</span></label>
                                    <div class="col">
                                        <input id="rombel_b" name="rombel_b" type="text" class="form-control @error('rombel_b') is-invalid @enderror" required="" placeholder="" value="{{ old('rombel_b') }}">
                                        @error('rombel_b')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="student_count">Total Siswa<span class="icn-req">*</span></label>
                                    <div class="col">
                                        <input id="student_count" name="student_count" type="text" class="form-control @error('student_count') is-invalid @enderror" required="" placeholder="" value="{{ old('student_count') }}">
                                        @error('student_count')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row gx-2 mb-3">
                                <div class="col-lg-4">
                                    <label class="col-form-label text-capitalize" for="accreditation">Akreditasi</label>
                                    <div class="col">
                                        <select id="accreditation" name="accreditation" class="form-control" required>
                                            <option value="">-- Belum --</option>
                                            <option value="A">Akreditasi A</option>
                                            <option value="B">Akreditasi B</option>
                                            <option value="C">Akreditasi C</option>
                                        </select>
                                        @error('accreditation')
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

                            {{-- @include('component.address_map') --}}

                            <h5 class="fs-0 mt-3 mb-1">Alamat</h5>

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

@push('head_stacks')
    <style>
        .dropdown-menu {
            max-height: 200px;
            overflow-y: auto;
            z-index: 1000;
        }
    </style>
@endpush
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const schoolNameInput = document.getElementById('school_name');
            const schoolIdInput = document.querySelector('input[name="school_id"]');
            const schoolNpsnInput = document.getElementById('school_npsn');
            const headmasterNameInput = document.getElementById('headmaster_name');
            const headmasterNipInput = document.getElementById('headmaster_nip');
            const loadingSpinner = document.getElementById('school_search_loading');
            
            let searchTimeout;
            let schoolResults = [];

            // Create dropdown for school results
            const resultsDropdown = document.createElement('div');
            resultsDropdown.className = 'dropdown-menu w-100';
            resultsDropdown.style.display = 'none';
            schoolNameInput.parentNode.appendChild(resultsDropdown);

            schoolNameInput.addEventListener('input', function(e) {
                clearTimeout(searchTimeout);
                const query = e.target.value.trim();
                
                if (query.length < 3) {
                    hideResults();
                    return;
                }

                loadingSpinner.classList.remove('d-none');
                
                searchTimeout = setTimeout(() => {
                    fetchSchools(query);
                }, 500);
            });

            function fetchSchools(query) {
                fetch(`/api/history/school/byname?q=${encodeURIComponent(query)}`)
                    .then(response => response.json())
                    .then(data => {
                        loadingSpinner.classList.add('d-none');
                        if (data.success && data.data.length > 0) {
                            schoolResults = data.data;
                            showResults(schoolResults);
                        } else {
                            hideResults();
                        }
                    })
                    .catch(error => {
                        loadingSpinner.classList.add('d-none');
                        console.error('Error fetching schools:', error);
                        hideResults();
                    });
            }

            function showResults(schools) {
                resultsDropdown.innerHTML = '';
                schools.forEach(school => {
                    const item = document.createElement('a');
                    item.className = 'dropdown-item';
                    item.href = '#';
                    item.innerHTML = `
                        <strong>${school.name}</strong>
                        ${school.NPSN ? `<br><small class="text-muted">NPSN: ${school.NPSN}</small>` : ''}
                        ${school.headmaster_name ? `<br><small class="text-muted">Kepala: ${school.headmaster_name}</small>` : ''}
                    `;
                    
                    item.addEventListener('click', function(e) {
                        e.preventDefault();
                        selectSchool(school);
                    });
                    
                    resultsDropdown.appendChild(item);
                });
                
                resultsDropdown.style.display = 'block';
            }

            function hideResults() {
                resultsDropdown.style.display = 'none';
                resultsDropdown.innerHTML = '';
            }

            function selectSchool(school) {
                // Fill form fields with school data
                schoolNameInput.value = school.name;
                schoolIdInput.value = school.school_id;
                schoolNpsnInput.value = school.NPSN || '';
                headmasterNameInput.value = school.headmaster_name || '';
                headmasterNipInput.value = school.headmaster_nip || '';
                
                hideResults();
                
                // Optional: Check if school already answered
                checkIfAnswered(school.school_id);
            }

            function checkIfAnswered(schoolId) {
                fetch(`/api/history/checkanswer/by_schoolname?school_id=${schoolId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success && data.data === 'already_answered') {
                            // Show warning that school already submitted
                            alert('Peringatan: Sekolah ini sudah pernah mengisi formulir untuk tahun ini.');
                        }
                    });
            }

            // Hide results when clicking outside
            document.addEventListener('click', function(e) {
                if (!schoolNameInput.contains(e.target) && !resultsDropdown.contains(e.target)) {
                    hideResults();
                }
            });
        });
    </script>
@endpush
