@extends('template.temp')

@section('content')
<style>
    .badge {
        font-size: 0.85em;
        padding: 0.5em 0.75em;
    }
</style>

@php
    $year = date('Y');
@endphp
<section class="hero-section-2 d-flex justify-content-center align-items-center" id="section_1">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 mx-auto">
                <h1 class="text-white text-center">DETAIL JAWABAN SURVEY - {{ $school->name }}</h1>
                <p class="text-white text-center">Data Kelengkapan Survey Sarana Prasarana Pendidikan Tahun {{ $year }}</p>
            </div>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">{{ $school->name }}</h4>
                            <a href="{{ url('/') }}" class="btn btn-light btn-sm">Kembali ke Peta</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <p class="mb-2"><strong>NPSN:</strong> {{ $school->NPSN }}</p>
                                <p class="mb-2"><strong>Kepala Sekolah:</strong> {{ $school->headmaster_name }}</p>
                                <p class="mb-2"><strong>Alamat:</strong> {{ $school->address }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-2"><strong>Akreditasi:</strong> {{ $school->accreditation }}</p>
                                <p class="mb-2"><strong>Jumlah Siswa:</strong> {{ $school->student_count }}</p>
                                <p class="mb-2"><strong>Tahun Periode:</strong> {{ date('Y') }}</p>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th width="50">No</th>
                                        <th>Pertanyaan</th>
                                        <th width="150">Jawaban</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($answers as $answer)
                                    <tr>
                                        <td class="text-center">{{ $answer->order }}</td>
                                        <td>{{ $answer->question }}</td>
                                        <td class="text-center">
                                            @if($answer->answer == 'Sudah')
                                                <span class="badge bg-success">Sudah</span>
                                            @elseif($answer->answer == 'Belum')
                                                <span class="badge bg-warning">Belum</span>
                                            @else
                                                <span class="badge bg-info">{{ $answer->answer }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Belum ada data jawaban untuk tahun ini.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection