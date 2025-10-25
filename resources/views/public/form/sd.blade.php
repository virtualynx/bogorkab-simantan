@extends('template.temp')

@section('content')
    <style>
        .border-right {
            border-right: 1px solid #dee2e6;
            padding-right: 20px;
        }
    </style>

    <section class="hero-section-2 d-flex justify-content-center align-items-center" id="section_1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12 mx-auto">
                        <h1 class="text-white text-center">SARPAS SD</h1>
                    </div>
                </div>
            </div>
    </section>
    <section class="faq-section section-padding">
        <div class="container d-flex align-items-center justify-content-center">
            <div class="card col-lg-10 shadow">
                <div class="card-title">
                    <div class="text-center pt-5">
                        <h5 class="fs-0">FASILITASI PENCAPAIAN STANDAR PELAYANAN MINIMAL(SPM) SD</h5>
                    </div>
                </div>
                <hr>
                <form id="form-tk" class="needs-validation" novalidate="" action="#" method="post" autocomplete="off">
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
                                    <label class="col-form-label text-capitalize" for="npsn">NPSN<span class="icn-req">*</span></label>
                                    <div class="col">
                                        <input id="npsn" name="npsn" type="text" class="form-control @error('npsn') is-invalid @enderror" required="" placeholder="NPSN" value="{{ old('npsn') }}">
                                        @error('npsn')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row gx-2 mb-3">
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="name-headmaster">Nama Kepala Sekolah<span class="icn-req">*</span></label>
                                    <div class="col">
                                        <input id="name-headmaster" name="name-headmaster" type="text" class="form-control @error('name-headmaster') is-invalid @enderror" required="" placeholder="Nama Kepala Sekolah" value="{{ old('name-headmaster') }}">
                                        @error('name-headmaster')
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
                                    <label class="col-form-label text-capitalize" for="teacher">Jumlah Guru<span class="icn-req">*</span></label>
                                    <div class="col">
                                        <input id="teacher" name="teacher" type="text" class="form-control @error('teacher') is-invalid @enderror" required="" placeholder="Jumlah Guru" value="{{ old('teacher') }}">
                                        @error('teacher')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row gx-2 mb-3">
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="kualifikasi-akademik-guru-s3">Tenaga Pendidik S3<span class="icn-req">*</span></label>
                                    <div class="col">
                                        <input id="kualifikasi-akademik-guru-s3" name="kualifikasi-akademik-guru-s3" type="text" class="form-control @error('kualifikasi-akademik-guru-s3') is-invalid @enderror" required="" placeholder="" value="{{ old('kualifikasi-akademik-guru-s3') }}">
                                        @error('kualifikasi-akademik-guru-s3')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row gx-2 mb-3">
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="kualifikasi-akademik-guru-s2">Tenaga Pendidik S2<span class="icn-req">*</span></label>
                                    <div class="col">
                                        <input id="kualifikasi-akademik-guru-s2" name="kualifikasi-akademik-guru-s2" type="text" class="form-control @error('kualifikasi-akademik-guru-s2') is-invalid @enderror" required="" placeholder="" value="{{ old('kualifikasi-akademik-guru-s2') }}">
                                        @error('kualifikasi-akademik-guru-s2')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row gx-2 mb-3">
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="kualifikasi-akademik-guru-s1">Tenaga Pendidik S1<span class="icn-req">*</span></label>
                                    <div class="col">
                                        <input id="kualifikasi-akademik-guru-s1" name="kualifikasi-akademik-guru-s1" type="text" class="form-control @error('kualifikasi-akademik-guru-s1') is-invalid @enderror" required="" placeholder="" value="{{ old('kualifikasi-akademik-guru-s1') }}">
                                        @error('kualifikasi-akademik-guru-s1')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row gx-2 mb-3">
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="kualifikasi-akademik-guru-diploma">Tenaga Pendidik Diploma<span class="icn-req">*</span></label>
                                    <div class="col">
                                        <input id="kualifikasi-akademik-guru-diploma" name="kualifikasi-akademik-guru-diploma" type="text" class="form-control @error('kualifikasi-akademik-guru-diploma') is-invalid @enderror" required="" placeholder="" value="{{ old('kualifikasi-akademik-guru-diploma') }}">
                                        @error('kualifikasi-akademik-guru-diploma')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row gx-2 mb-3">
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="kualifikasi-akademik-guru-non">Tenaga Pendidik Non-Sarjana<span class="icn-req">*</span></label>
                                    <div class="col">
                                        <input id="kualifikasi-akademik-guru-non" name="kualifikasi-akademik-guru-non" type="text" class="form-control @error('kualifikasi-akademik-guru-non') is-invalid @enderror" required="" placeholder="" value="{{ old('kualifikasi-akademik-guru-non') }}">
                                        @error('kualifikasi-akademik-guru-non')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4" />

                            <div class="row gx-2 mb-3">
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="rombel-a">Jumlah Rombel<span class="icn-req">*</span></label>
                                    <div class="col">
                                        <input id="rombel-a" name="rombel-a" type="text" class="form-control @error('rombel-a') is-invalid @enderror" required="" placeholder="" value="{{ old('rombel-a') }}">
                                        @error('rombel-a')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="rombel-b">Jumlah Ruang Belajar<span class="icn-req">*</span></label>
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
                            <h5 class="fs-0 mb-3">Alamat<span class="icn-req">*</span></h5>
                            <div class="row gx-2 mb-3">
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="alamat-1">Jalan</label>
                                    <div class="col">
                                        <input id="alamat-1" name="alamat-1" type="text" class="form-control @error('alamat-1') is-invalid @enderror" required="" placeholder="Jalan Mantan" value="{{ old('alamat-1') }}">
                                        @error('alamat-1')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row gx-2 mb-3">
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="alamat-2">RT/RW, Desa/Kelurahan, Kecamatan</label>
                                    <div class="col">
                                        <input id="alamat-2" name="alamat-2" type="text" class="form-control @error('alamat-2') is-invalid @enderror" required="" placeholder="RT01/RW02 Desa Ciomas Kecamatan Ciomas" value="{{ old('alamat-2') }}">
                                        @error('alamat-2')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row gx-2 mb-3">
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="alamat-3">Kabupaten/Kota</label>
                                    <div class="col">
                                        <input id="alamat-3" name="alamat-3" type="text" class="form-control @error('alamat-3') is-invalid @enderror" required="" placeholder="Kabupaten Bogor" value="{{ old('alamat-3') }}">
                                        @error('alamat-3')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="alamat-4">Provinsi</label>
                                    <div class="col">
                                        <input id="alamat-4" name="alamat-4" type="text" class="form-control @error('alamat-4') is-invalid @enderror" required="" placeholder="Jawa Barat" value="{{ old('alamat-4') }}">
                                        @error('alamat-4')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="col-form-label text-capitalize" for="alamat-5">Kode Pos</label>
                                    <div class="col">
                                        <input id="alamat-5" name="alamat-5" type="text" class="form-control @error('alamat-5') is-invalid @enderror" required="" placeholder="16000" value="{{ old('alamat-5') }}">
                                        @error('alamat-5')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <h5 class="fs-0 mb-3">Lokasi Pada Maps<span class="icn-req">*</span></h5>
                            {{-- MAPS --}}
                            <div id="map" style="height: 400px;"></div>
                            <input id="lokasi" type="hidden" name="lokasi" value="" required>
                            {{-- MAPS --}}

                            <hr class="my-4" />
                            
                            <h5 class="fs-0 mb-3">Persyaratan SPM SD<span class="icn-req">*</span></h5>
                            
                            <!-- Prasarana Minimum Sesuai Pasal 25 huruf b -->
                            <div class="col mb-4">
                                <h6 class="fw-bold">A. Ketersediaan Prasarana Minimum</h6>
                                {{-- <p class="text-muted small">Berdasarkan Pasal 25 huruf b - Prasarana yang harus tersedia</p> --}}
                                
                                <div class="row gx-2 mb-3">
                                    <div class="col-md-6 border-right">
                                        <label class="col-form-label" for="ruang-kelas">1. Ruang Kelas<span class="icn-req">*</span></label>
                                        <div class="col">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="ruang-kelas-sudah" name="ruang-kelas" value="1" @if(old('ruang-kelas') === '1') checked @endif>
                                                <label class="form-check-label" for="ruang-kelas-sudah">Sudah</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="ruang-kelas-belum" name="ruang-kelas" value="0" @if(old('ruang-kelas') === '0') checked @endif>
                                                <label class="form-check-label" for="ruang-kelas-belum">Belum</label>
                                            </div>
                                            @error('ruang-kelas')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="col-form-label" for="ruang-perpustakaan">2. Ruang Perpustakaan<span class="icn-req">*</span></label>
                                        <div class="col">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="ruang-perpustakaan-sudah" name="ruang-perpustakaan" value="1" @if(old('ruang-perpustakaan') === '1') checked @endif>
                                                <label class="form-check-label" for="ruang-perpustakaan-sudah">Sudah</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="ruang-perpustakaan-belum" name="ruang-perpustakaan" value="0" @if(old('ruang-perpustakaan') === '0') checked @endif>
                                                <label class="form-check-label" for="ruang-perpustakaan-belum">Belum</label>
                                            </div>
                                            @error('ruang-perpustakaan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row gx-2 mb-3">
                                    <div class="col-md-6 border-right">
                                        <label class="col-form-label" for="ruang-administrasi">3. Ruang Administrasi<span class="icn-req">*</span></label>
                                        <div class="col">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="ruang-administrasi-sudah" name="ruang-administrasi" value="1" @if(old('ruang-administrasi') === '1') checked @endif>
                                                <label class="form-check-label" for="ruang-administrasi-sudah">Sudah</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="ruang-administrasi-belum" name="ruang-administrasi" value="0" @if(old('ruang-administrasi') === '0') checked @endif>
                                                <label class="form-check-label" for="ruang-administrasi-belum">Belum</label>
                                            </div>
                                            @error('ruang-administrasi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="col-form-label" for="ruang-kesehatan">4. Ruang Kesehatan<span class="icn-req">*</span></label>
                                        <div class="col">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="ruang-kesehatan-sudah" name="ruang-kesehatan" value="1" @if(old('ruang-kesehatan') === '1') checked @endif>
                                                <label class="form-check-label" for="ruang-kesehatan-sudah">Sudah</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="ruang-kesehatan-belum" name="ruang-kesehatan" value="0" @if(old('ruang-kesehatan') === '0') checked @endif>
                                                <label class="form-check-label" for="ruang-kesehatan-belum">Belum</label>
                                            </div>
                                            @error('ruang-kesehatan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row gx-2 mb-3">
                                    <div class="col-md-6 border-right">
                                        <label class="col-form-label" for="tempat-beribadah">5. Tempat Beribadah<span class="icn-req">*</span></label>
                                        <div class="col">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="tempat-beribadah-sudah" name="tempat-beribadah" value="1" @if(old('tempat-beribadah') === '1') checked @endif>
                                                <label class="form-check-label" for="tempat-beribadah-sudah">Sudah</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="tempat-beribadah-belum" name="tempat-beribadah" value="0" @if(old('tempat-beribadah') === '0') checked @endif>
                                                <label class="form-check-label" for="tempat-beribadah-belum">Belum</label>
                                            </div>
                                            @error('tempat-beribadah')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="col-form-label" for="tempat-bermain-olahraga">6. Tempat Bermain/Olahraga<span class="icn-req">*</span></label>
                                        <div class="col">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="tempat-bermain-olahraga-sudah" name="tempat-bermain-olahraga" value="1" @if(old('tempat-bermain-olahraga') === '1') checked @endif>
                                                <label class="form-check-label" for="tempat-bermain-olahraga-sudah">Sudah</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="tempat-bermain-olahraga-belum" name="tempat-bermain-olahraga" value="0" @if(old('tempat-bermain-olahraga') === '0') checked @endif>
                                                <label class="form-check-label" for="tempat-bermain-olahraga-belum">Belum</label>
                                            </div>
                                            @error('tempat-bermain-olahraga')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row gx-2 mb-3">
                                    <div class="col-md-6 border-right">
                                        <label class="col-form-label" for="kantin">7. Kantin<span class="icn-req">*</span></label>
                                        <div class="col">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="kantin-sudah" name="kantin" value="1" @if(old('kantin') === '1') checked @endif>
                                                <label class="form-check-label" for="kantin-sudah">Sudah</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="kantin-belum" name="kantin" value="0" @if(old('kantin') === '0') checked @endif>
                                                <label class="form-check-label" for="kantin-belum">Belum</label>
                                            </div>
                                            @error('kantin')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="col-form-label" for="toilet">8. Toilet<span class="icn-req">*</span></label>
                                        <div class="col">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="toilet-sudah" name="toilet" value="1" @if(old('toilet') === '1') checked @endif>
                                                <label class="form-check-label" for="toilet-sudah">Sudah</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="toilet-belum" name="toilet" value="0" @if(old('toilet') === '0') checked @endif>
                                                <label class="form-check-label" for="toilet-belum">Belum</label>
                                            </div>
                                            @error('toilet')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Standar Luas Ruang Kelas Sesuai Pasal 12 -->
                            <div class="col mb-4">
                                <h6 class="fw-bold">B. Standar Luas Ruang Kelas</h6>
                                {{-- <p class="text-muted small">Berdasarkan Pasal 12 - Rasio luas ruang kelas minimal 2 m² per Peserta Didik</p> --}}
                                
                                <div class="row gx-2 mb-3">
                                    <div class="col-md-6 border-right">
                                        <label class="col-form-label" for="luas-ruang-kelas">Apakah luas ruang kelas memenuhi standar 2 m² per siswa?<span class="icn-req">*</span></label>
                                        <div class="col">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="luas-ruang-kelas-sudah" name="luas-ruang-kelas" value="1" @if(old('luas-ruang-kelas') === '1') checked @endif>
                                                <label class="form-check-label" for="luas-ruang-kelas-sudah">Sudah Memenuhi</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="luas-ruang-kelas-belum" name="luas-ruang-kelas" value="0" @if(old('luas-ruang-kelas') === '0') checked @endif>
                                                <label class="form-check-label" for="luas-ruang-kelas-belum">Belum Memenuhi</label>
                                            </div>
                                            @error('luas-ruang-kelas')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="col-form-label" for="luas-total-kelas">Luas Total Ruang Kelas (m²)</label>
                                        <div class="col">
                                            <input id="luas-total-kelas" name="luas-total-kelas" type="number" class="form-control @error('luas-total-kelas') is-invalid @enderror" placeholder="Contoh: 200" value="{{ old('luas-total-kelas') }}">
                                            @error('luas-total-kelas')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Aksesibilitas untuk Penyandang Disabilitas -->
                            <div class="col mb-4">
                                <h6 class="fw-bold">C. Aksesibilitas untuk Penyandang Disabilitas</h6>
                                {{-- <p class="text-muted small">Berdasarkan Pasal 6, 9, dan 20 - Fasilitas yang ramah disabilitas</p> --}}
                                
                                <div class="row gx-2 mb-3">
                                    <div class="col-md-6 border-right">
                                        <label class="col-form-label" for="akses-disabilitas">Apakah sekolah memiliki fasilitas aksesibilitas untuk penyandang disabilitas?<span class="icn-req">*</span></label>
                                        <div class="col">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="akses-disabilitas-sudah" name="akses-disabilitas" value="1" @if(old('akses-disabilitas') === '1') checked @endif>
                                                <label class="form-check-label" for="akses-disabilitas-sudah">Sudah</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="akses-disabilitas-belum" name="akses-disabilitas" value="0" @if(old('akses-disabilitas') === '0') checked @endif>
                                                <label class="form-check-label" for="akses-disabilitas-belum">Belum</label>
                                            </div>
                                            @error('akses-disabilitas')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="col-form-label" for="toilet-disabilitas">Apakah tersedia toilet untuk penyandang disabilitas?<span class="icn-req">*</span></label>
                                        <div class="col">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="toilet-disabilitas-sudah" name="toilet-disabilitas" value="1" @if(old('toilet-disabilitas') === '1') checked @endif>
                                                <label class="form-check-label" for="toilet-disabilitas-sudah">Sudah</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="toilet-disabilitas-belum" name="toilet-disabilitas" value="0" @if(old('toilet-disabilitas') === '0') checked @endif>
                                                <label class="form-check-label" for="toilet-disabilitas-belum">Belum</label>
                                            </div>
                                            @error('toilet-disabilitas')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Sarana Pembelajaran -->
                            <div class="col mb-4">
                                <h6 class="fw-bold">D. Sarana Pembelajaran</h6>
                                {{-- <p class="text-muted small">Berdasarkan Pasal 5 dan 6 - Kelengkapan sarana pembelajaran</p> --}}
                                
                                <div class="row gx-2 mb-3">
                                    <div class="col-md-6 border-right">
                                        <label class="col-form-label" for="sarana-pembelajaran">Apakah sarana pembelajaran (bahan ajar, alat peraga) sudah memadai?<span class="icn-req">*</span></label>
                                        <div class="col">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="sarana-pembelajaran-sudah" name="sarana-pembelajaran" value="1" @if(old('sarana-pembelajaran') === '1') checked @endif>
                                                <label class="form-check-label" for="sarana-pembelajaran-sudah">Sudah Memadai</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="sarana-pembelajaran-cukup" name="sarana-pembelajaran" value="2" @if(old('sarana-pembelajaran') === '2') checked @endif>
                                                <label class="form-check-label" for="sarana-pembelajaran-cukup">Cukup</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="sarana-pembelajaran-belum" name="sarana-pembelajaran" value="0" @if(old('sarana-pembelajaran') === '0') checked @endif>
                                                <label class="form-check-label" for="sarana-pembelajaran-belum">Belum Memadai</label>
                                            </div>
                                            @error('sarana-pembelajaran')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="col-form-label" for="perpustakaan-lengkap">Apakah perpustakaan dilengkapi dengan sarana yang memadai?<span class="icn-req">*</span></label>
                                        <div class="col">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="perpustakaan-lengkap-sudah" name="perpustakaan-lengkap" value="1" @if(old('perpustakaan-lengkap') === '1') checked @endif>
                                                <label class="form-check-label" for="perpustakaan-lengkap-sudah">Sudah</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="perpustakaan-lengkap-belum" name="perpustakaan-lengkap" value="0" @if(old('perpustakaan-lengkap') === '0') checked @endif>
                                                <label class="form-check-label" for="perpustakaan-lengkap-belum">Belum</label>
                                            </div>
                                            @error('perpustakaan-lengkap')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Kondisi Bangunan dan Keselamatan -->
                            <div class="col mb-4">
                                <h6 class="fw-bold">E. Kondisi Bangunan dan Keselamatan</h6>
                                {{-- <p class="text-muted small">Berdasarkan Pasal 8 dan 9 - Standar keselamatan dan kesehatan bangunan</p> --}}
                                
                                <div class="row gx-2 mb-3">
                                    <div class="col-md-6 border-right">
                                        <label class="col-form-label" for="kondisi-bangunan">Apakah bangunan memenuhi standar keselamatan (konstruksi kuat, jalur evakuasi)?<span class="icn-req">*</span></label>
                                        <div class="col">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="kondisi-bangunan-sudah" name="kondisi-bangunan" value="1" @if(old('kondisi-bangunan') === '1') checked @endif>
                                                <label class="form-check-label" for="kondisi-bangunan-sudah">Sudah Memenuhi</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="kondisi-bangunan-belum" name="kondisi-bangunan" value="0" @if(old('kondisi-bangunan') === '0') checked @endif>
                                                <label class="form-check-label" for="kondisi-bangunan-belum">Belum Memenuhi</label>
                                            </div>
                                            @error('kondisi-bangunan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="col-form-label" for="pencahayaan-alami">Apakah ruangan memiliki pencahayaan dan penghawaan alami yang memadai?<span class="icn-req">*</span></label>
                                        <div class="col">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="pencahayaan-alami-sudah" name="pencahayaan-alami" value="1" @if(old('pencahayaan-alami') === '1') checked @endif>
                                                <label class="form-check-label" for="pencahayaan-alami-sudah">Sudah</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="pencahayaan-alami-belum" name="pencahayaan-alami" value="0" @if(old('pencahayaan-alami') === '0') checked @endif>
                                                <label class="form-check-label" for="pencahayaan-alami-belum">Belum</label>
                                            </div>
                                            @error('pencahayaan-alami')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Sanitasi dan Kesehatan -->
                            <div class="col mb-4">
                                <h6 class="fw-bold">F. Sanitasi dan Kesehatan</h6>
                                {{-- <p class="text-muted small">Berdasarkan Pasal 20 - Standar toilet dan sanitasi</p> --}}
                                
                                <div class="row gx-2 mb-3">
                                    <div class="col-md-6 border-right">
                                        <label class="col-form-label" for="toilet-berfungsi">Apakah toilet dalam kondisi bersih dan berfungsi dengan baik?<span class="icn-req">*</span></label>
                                        <div class="col">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="toilet-berfungsi-sudah" name="toilet-berfungsi" value="1" @if(old('toilet-berfungsi') === '1') checked @endif>
                                                <label class="form-check-label" for="toilet-berfungsi-sudah">Sudah</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="toilet-berfungsi-belum" name="toilet-berfungsi" value="0" @if(old('toilet-berfungsi') === '0') checked @endif>
                                                <label class="form-check-label" for="toilet-berfungsi-belum">Belum</label>
                                            </div>
                                            @error('toilet-berfungsi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="col-form-label" for="fasilitas-cuci-tangan">Apakah tersedia fasilitas cuci tangan dengan air mengalir?<span class="icn-req">*</span></label>
                                        <div class="col">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="fasilitas-cuci-tangan-sudah" name="fasilitas-cuci-tangan" value="1" @if(old('fasilitas-cuci-tangan') === '1') checked @endif>
                                                <label class="form-check-label" for="fasilitas-cuci-tangan-sudah">Sudah</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="fasilitas-cuci-tangan-belum" name="fasilitas-cuci-tangan" value="0" @if(old('fasilitas-cuci-tangan') === '0') checked @endif>
                                                <label class="form-check-label" for="fasilitas-cuci-tangan-belum">Belum</label>
                                            </div>
                                            @error('fasilitas-cuci-tangan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Ruang Terbuka Hijau -->
                            <div class="col mb-4">
                                <h6 class="fw-bold">G. Ruang Terbuka Hijau</h6>
                                {{-- <p class="text-muted small">Berdasarkan Pasal 8 - Ketersediaan ruang terbuka hijau</p> --}}
                                
                                <div class="row gx-2 mb-3">
                                    <div class="col-md-6">
                                        <label class="col-form-label" for="ruang-terbuka-hijau">Apakah sekolah memiliki ruang terbuka hijau?<span class="icn-req">*</span></label>
                                        <div class="col">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="ruang-terbuka-hijau-sudah" name="ruang-terbuka-hijau" value="1" @if(old('ruang-terbuka-hijau') === '1') checked @endif>
                                                <label class="form-check-label" for="ruang-terbuka-hijau-sudah">Sudah</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="ruang-terbuka-hijau-belum" name="ruang-terbuka-hijau" value="0" @if(old('ruang-terbuka-hijau') === '0') checked @endif>
                                                <label class="form-check-label" for="ruang-terbuka-hijau-belum">Belum</label>
                                            </div>
                                            @error('ruang-terbuka-hijau')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col mt-5">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
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
    </script>
@endsection()