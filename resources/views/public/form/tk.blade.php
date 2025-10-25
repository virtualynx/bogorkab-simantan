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
                            <div class="row gx-2 mb-5">
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
                            <input id="lokasi" type="hidden" name="lokasi" value="{{ old('lokasi') }}" required>
                            @error('lokasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            {{-- MAPS --}}
                            <hr class="my-4" />
                            <h5 class="fs-0 mb-3">Persyaratan SPM<span class="icn-req">*</span></h5>
                            <div class="col">
                                <label class="col-form-label text-capitalize" for="k-1">1. Berasal Dari Guru</label>
                                <div class="col">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-1-sudah" name="k-1" value="1" @if(old('k-1') === '1') checked @endif>
                                        <label class="form-check-label" for="k-1-sudah">Sudah</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-1-belum" name="k-1" value="0" @if(old('k-1') === '0') checked @endif>
                                        <label class="form-check-label" for="k-1-belum">Belum</label>
                                    </div>
                                    @error('k-1')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label class="col-form-label text-capitalize" for="k-2">2. Memiliki Kualifikasi Akademik (D-VI atau Sarjana Paud/BK/Psikologi)</label>
                                <div class="col">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-2-sudah" name="k-2" value="1" @if(old('k-2') === '1') checked @endif>
                                        <label class="form-check-label" for="k-2-sudah">Sudah</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-2-belum" name="k-2" value="0" @if(old('k-2') === '0') checked @endif>
                                        <label class="form-check-label" for="k-2-belum">Belum</label>
                                    </div>
                                    @error('k-2')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label class="col-form-label text-capitalize" for="k-3">3. Memiliki Sertifikast Pendidik</label>
                                <div class="col">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-3-sudah" name="k-3" value="1" @if(old('k-3') === '1') checked @endif>
                                        <label class="form-check-label" for="k-3-sudah">Sudah</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-3-belum" name="k-3" value="0" @if(old('k-3') === '0') checked @endif>
                                        <label class="form-check-label" for="k-3-belum">Belum</label>
                                    </div>
                                    @error('k-3')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label class="col-form-label text-capitalize" for="k-4">4. Memiliki Pengalaman Manajeral Paling Sedikit 2 Tahun</label>
                                <div class="col">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-4-sudah" name="k-4" value="1" @if(old('k-4') === '1') checked @endif>
                                        <label class="form-check-label" for="k-4-sudah">Sudah</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-4-belum" name="k-4" value="0" @if(old('k-4') === '0') checked @endif>
                                        <label class="form-check-label" for="k-4-belum">Belum</label>
                                    </div>
                                    @error('k-4')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label class="col-form-label text-capitalize" for="k-5">5. Memiliki STTPL Calon Kepala Sekolah atau Sertifikat Guru Penggerak</label>
                                <div class="col">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-5-sudah" name="k-5" value="1" @if(old('k-5') === '1') checked @endif>
                                        <label class="form-check-label" for="k-5-sudah">Sudah</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-5-belum" name="k-5" value="0" @if(old('k-5') === '0') checked @endif>
                                        <label class="form-check-label" for="k-4-belum">Belum</label>
                                    </div>
                                    @error('k-5')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label class="col-form-label text-capitalize" for="k-6">6. Memiliki Usia Peserta Didik <span class="text-lowercase">yang</span> Diterima 5 - 6 Tahun</label>
                                <div class="col">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-6-sudah" name="k-6" value="1" @if(old('k-6') === '1') checked @endif>
                                        <label class="form-check-label" for="k-6-sudah">Sudah</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-6-belum" name="k-6" value="0" @if(old('k-6') === '0') checked @endif>
                                        <label class="form-check-label" for="k-4-belum">Belum</label>
                                    </div>
                                    @error('k-6')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label class="col-form-label text-capitalize" for="k-7">7. Luas Lahan 300m<sup>2</sup></label>
                                <div class="col">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-7-sudah" name="k-7" value="1" @if(old('k-7') === '1') checked @endif>
                                        <label class="form-check-label" for="k-7-sudah">Sudah</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-7-belum" name="k-7" value="0" @if(old('k-7') === '0') checked @endif>
                                        <label class="form-check-label" for="k-4-belum">Belum</label>
                                    </div>
                                    @error('k-7')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label class="col-form-label text-capitalize" for="k-8">8. Memiliki Ruang Kegiatan <span class="text-lowercase">yang</span> Aman <span class="text-lowercase">dan</span> Sehat dengan rasio 3 m<sup>2</sup> per anak</label>
                                <div class="col">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-8-sudah" name="k-8" value="1" @if(old('k-8') === '1') checked @endif>
                                        <label class="form-check-label" for="k-8-sudah">Sudah</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-8-belum" name="k-8" value="0" @if(old('k-8') === '0') checked @endif>
                                        <label class="form-check-label" for="k-4-belum">Belum</label>
                                    </div>
                                    @error('k-8')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label class="col-form-label text-capitalize" for="k-9">9. Tersedia Fasilitas Cuci Tangan Dengan Air Bersih</label>
                                <div class="col">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-9-sudah" name="k-9" value="1" @if(old('k-9') === '1') checked @endif>
                                        <label class="form-check-label" for="k-9-sudah">Sudah</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-9-belum" name="k-9" value="0" @if(old('k-9') === '0') checked @endif>
                                        <label class="form-check-label" for="k-4-belum">Belum</label>
                                    </div>
                                    @error('k-9')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label class="col-form-label text-capitalize" for="k-10">10. Memiliki Ruang Guru/ Ruang Administrasi</label>
                                <div class="col">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-10-sudah" name="k-10" value="1" @if(old('k-10') === '1') checked @endif>
                                        <label class="form-check-label" for="k-10-sudah">Sudah</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-10-belum" name="k-10" value="0" @if(old('k-10') === '0') checked @endif>
                                        <label class="form-check-label" for="k-4-belum">Belum</label>
                                    </div>
                                    @error('k-10')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label class="col-form-label text-capitalize" for="k-11">11. Memiliki Ruang Kepala Sekolah</label>
                                <div class="col">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-11-sudah" name="k-11" value="1" @if(old('k-11') === '1') checked @endif>
                                        <label class="form-check-label" for="k-11-sudah">Sudah</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-11-belum" name="k-11" value="0" @if(old('k-11') === '0') checked @endif>
                                        <label class="form-check-label" for="k-4-belum">Belum</label>
                                    </div>
                                    @error('k-11')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label class="col-form-label text-capitalize" for="k-12">12. Memiliki Ruang UKS dengan Kelengkapan P3K</label>
                                <div class="col">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-12-sudah" name="k-12" value="1" @if(old('k-12') === '1') checked @endif>
                                        <label class="form-check-label" for="k-12-sudah">Sudah</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-12-belum" name="k-12" value="0" @if(old('k-12') === '0') checked @endif>
                                        <label class="form-check-label" for="k-4-belum">Belum</label>
                                    </div>
                                    @error('k-12')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label class="col-form-label text-capitalize" for="k-13">13. Memiliki Jamban dengan Air Bersih</label>
                                <div class="col">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-13-sudah" name="k-13" value="1" @if(old('k-13') === '1') checked @endif>
                                        <label class="form-check-label" for="k-13-sudah">Sudah</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-13-belum" name="k-13" value="0" @if(old('k-13') === '0') checked @endif>
                                        <label class="form-check-label" for="k-4-belum">Belum</label>
                                    </div>
                                    @error('k-13')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label class="col-form-label text-capitalize" for="k-14">14. Memiliki Ruang Lainnya <span class="text-lowercase">yang</span> Relevan dengan kebutuhan kegiatan anak</label>
                                <div class="col">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-14-sudah" name="k-14" value="1" @if(old('k-14') === '1') checked @endif>
                                        <label class="form-check-label" for="k-14-sudah">Sudah</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-14-belum" name="k-14" value="0" @if(old('k-14') === '0') checked @endif>
                                        <label class="form-check-label" for="k-4-belum">Belum</label>
                                    </div>
                                    @error('k-14')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label class="col-form-label text-capitalize" for="k-15">15. memiliki alat permainan edukatif <span class="text-lowercase">yang</span> aman <span class="text-lowercase">dan</span> sehat sesuai SNI</label>
                                <div class="col">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-15-sudah" name="k-15" value="1" @if(old('k-15') === '1') checked @endif>
                                        <label class="form-check-label" for="k-15-sudah">Sudah</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-15-belum" name="k-15" value="0" @if(old('k-15') === '0') checked @endif>
                                        <label class="form-check-label" for="k-4-belum">Belum</label>
                                    </div>
                                    @error('k-15')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label class="col-form-label text-capitalize" for="k-16">16. memiliki fasilitas bermain di dalam maupun diluar ruangan</label>
                                <div class="col">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-16-sudah" name="k-16" value="1" @if(old('k-16') === '1') checked @endif>
                                        <label class="form-check-label" for="k-16-sudah">Sudah</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-16-belum" name="k-16" value="0" @if(old('k-16') === '0') checked @endif>
                                        <label class="form-check-label" for="k-4-belum">Belum</label>
                                    </div>
                                    @error('k-16')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label class="col-form-label text-capitalize" for="k-17">17. memiliki tempat sampah <span class="text-lowercase">yang</span> tertutup <span class="text-lowercase">dan</span> tidak tercemar</label>
                                <div class="col">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-17-sudah" name="k-17" value="1" @if(old('k-17') === '1') checked @endif>
                                        <label class="form-check-label" for="k-17-sudah">Sudah</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-17-belum" name="k-17" value="0" @if(old('k-17') === '0') checked @endif>
                                        <label class="form-check-label" for="k-4-belum">Belum</label>
                                    </div>
                                    @error('k-17')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label class="col-form-label text-capitalize" for="k-18">18. memiliki ruang tempat beribadah</label>
                                <div class="col">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-18-sudah" name="k-18" value="1" @if(old('k-18') === '1') checked @endif>
                                        <label class="form-check-label" for="k-18-sudah">Sudah</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-18-belum" name="k-18" value="0" @if(old('k-18') === '0') checked @endif>
                                        <label class="form-check-label" for="k-4-belum">Belum</label>
                                    </div>
                                    @error('k-18')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label class="col-form-label text-capitalize" for="k-19">19. memiliki ruang literasi</label>
                                <div class="col">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-19-sudah" name="k-19" value="1" @if(old('k-19') === '1') checked @endif>
                                        <label class="form-check-label" for="k-19-sudah">Sudah</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-19-belum" name="k-19" value="0" @if(old('k-19') === '0') checked @endif>
                                        <label class="form-check-label" for="k-4-belum">Belum</label>
                                    </div>
                                    @error('k-19')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label class="col-form-label text-capitalize" for="k-20">20. memiliki ruang laktasi (ruang penampung ASI untuk putra/putrinya di rumah)</label>
                                <div class="col">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-20-sudah" name="k-20" value="1" @if(old('k-20') === '1') checked @endif>
                                        <label class="form-check-label" for="k-20-sudah">Sudah</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="k-20-belum" name="k-20" value="0" @if(old('k-20') === '0') checked @endif>
                                        <label class="form-check-label" for="k-4-belum">Belum</label>
                                    </div>
                                    @error('k-20')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="col-md-6">
                                    {!! RecaptchaV3::field('tk') !!}
                                    @if ($errors->has('g-recaptcha-response'))
                                        <div class="invalid-feedback">{{ $errors->first('g-recaptcha-response') }}</div>
                                    @endif
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