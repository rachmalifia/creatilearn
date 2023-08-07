@extends('layouts.app')

@section('greeting')
<a href="/course/{{ $course->slug }}" class="mx-6 mt-4 btn normal-case btn-neutral btn-ghost btn-sm mb-1 text-xs md:text-sm">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" h-4 w-4 md:h-6 md:w-6">
    <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
  </svg>      
  Kembali ke daftar materi</a>
@endsection

@section('content')
<div class="container mb-10 -mt-3">
  <div class="m-6 md:p-6 w-auto min-h-screen flex justify-center items-center">
    <div class="card bg-base-100 shadow-xl md:mx-24 justify-center items-center md:w-2/3">
        @if (($examResult == null))  
            @if ($questions->count())
                <div class="card-body">
                    <div class="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="text-sm mx-4">Perhatian! Ujian hanya bisa dilakukan sekali!</span>
                    </div>
                    <h2 class="card-title">Konfirmasi</h2>
                    <div class="overflow-x-auto">
                        <table class="table grid place-content-start">
                        <!-- head -->
                        <thead>
                        </thead>
                        <tbody >
                            <tr>
                                <th>Nama</th>
                                <td>{{ auth()->user()->name }}</td>
                            </tr>
                            <!-- row 1 -->
                            <tr>
                            <th>Tipe Ujian</th>
                            <td>
                                @if ($questions[0]->code == 'pretest')
                                    Ujian Awal
                                @endif
                                @if ($questions[0]->code == 'quiz')
                                    Kuis
                                @endif
                                @if ($questions[0]->code == 'posttest')
                                    Ujian Akhir
                                @endif
                            </td>
                            </tr>
                            <!-- row 2 -->
                            <tr>
                            <th>Jumlah Soal</th>
                            <td>{{ $questions->count() }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Soal</th>
                                <td>Pilihan Ganda</td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                    <div class="border-none">
                        <ul>
                            <li class="text-sm mx-4">
                                @if ($questions[0]->code == 'pretest')
                                    Ujian awal bertujuan untuk mengetahui kemampuan siswa sebelum melaksanakan pembelajaran 
                                @endif
                                @if ($questions[0]->code == 'posttest')
                                    Ujian akhir bertujuan untuk mengetahui kemampuan siswa setelah melaksanakan pembelajaran 
                                @endif
                            </li>
                        </ul>
                    </div>
                    <div class="card-actions justify-end mt-2">
                        <a href="{{ '/' . $subject->slug . '/' . $questions[0]->code }}" >
                            <button class="btn btn-warning normal-case">Mulai</button>
                        </a>
                    </div>
                </div>
            @else
                <div class="flex items-center justify-center h-screen">
                    <p class="text-gray-500 text-sm md:text-base text-center">Soal ujian belum tersedia</p>
                </div>
            @endif
        @else
            <div class="flex items-center justify-center h-screen">
                <p class="text-sm md:text-base text-center font-semibold p-2">Terima kasih! Kamu sudah mengerjakan ujian 😊</p>
            </div>
        @endif
    </div>
  </div>
</div>
@endsection