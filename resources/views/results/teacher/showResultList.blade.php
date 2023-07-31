@extends('layouts.app')

@section('greeting')
<div>
    <a href="/dashboard/student-result" class="mx-6 mt-4 btn normal-case btn-neutral btn-ghost btn-sm mb-1 text-xs md:text-sm h-auto">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" h-4 w-4 md:h-6 md:w-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
      </svg>      
      Kembali ke daftar pelajaran</a>
</div>
@endsection

@section('content')
<div class="container mx-auto mb-10">
  <div class="border rounded-lg p-2 text-sm relative bg-base-100 m-4 md:text-base md:p-6 min-h-screen">
    <div class="flex flex-wrap md:flex-nowrap pt-3 pb-2 mb-6 border-b-2">
        <h1 class="font-semibold mx-auto text-center">Data Nilai Siswa pada Materi {{ $subject->title }} Pelajaran {{ $course->title }} </h1>
    </div>   
    
    <details class="collapse collapse-arrow bg-base-300 mb-4">
        <summary class="collapse-title font-medium text-xs md:text-base">
        Ujian Awal
        </summary>
        <div class="collapse-content">
            {{-- Table for Subject lists --}}
            <div class="overflow-x-auto grid place-content-start">
                <table class="table">
                    @if ($pretestResults->count())
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col" class="text-xs md:text-sm">Nama Siswa</th>
                                <th scope="col" class="text-xs md:text-sm">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pretestResults as $pretestResult)   
                                <tr>
                                    <th class="text-xs md:text-sm">{{ $loop->iteration }}</th>
                                    <td class="text-xs md:text-sm">{{  $pretestResult->name  }}</td>
                                    <td class="text-xs md:text-sm">{{ $pretestResult->score }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    @else
                        <div class="flex items-center justify-center">
                            <p class="text-gray-600 text-xs md:text-sm text-center">Belum ada nilai siswa</p>
                        </div>
                    @endif
                </table>
            </div>
        </div>
    </details> 
    <details class="collapse collapse-arrow bg-base-300 mb-4">
        <summary class="collapse-title font-medium text-xs md:text-base">
        Kuis
        </summary>
        <div class="collapse-content">
            {{-- Table for Subject lists --}}
            <div class="overflow-x-auto grid place-content-start">
                <table class="table">
                    @if ($quizResults->count())
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col" class="text-xs md:text-sm">Nama Siswa</th>
                                <th scope="col" class="text-xs md:text-sm">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quizResults as $quizResult)    
                                <tr>
                                    <th class="text-xs md:text-sm">{{ $loop->iteration }}</th>
                                    <td class="text-xs md:text-sm">{{ $quizResult->name  }}</td>
                                    <td class="text-xs md:text-sm">{{ $quizResult->score }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    @else
                        <div class="flex items-center justify-center">
                            <p class="text-gray-600 text-xs md:text-sm text-center">Belum ada nilai siswa</p>
                        </div>
                    @endif
                </table>
            </div>
        </div>
    </details> 
    <details class="collapse collapse-arrow bg-base-300 mb-4">
        <summary class="collapse-title font-medium text-xs md:text-base">
        Ujian Akhir
        </summary>
        <div class="collapse-content">
            {{-- Table for Subject lists --}}
            <div class="overflow-x-auto grid place-content-start">
                <table class="table">
                    @if ($posttestResults->count())    
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col" class="text-xs md:text-sm">Nama Siswa</th>
                                <th scope="col" class="text-xs md:text-sm">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posttestResults as $posttestResult)
                                <tr>
                                    <th class="text-xs md:text-sm">{{ $loop->iteration }}</th>
                                    <td class="text-xs md:text-sm">{{ $posttestResult->name }}</td>
                                    <td class="text-xs md:text-sm">{{ $posttestResult->score }}</td>
                                    {{-- <td class="text-xs md:text-sm">{{ $posttestResults != null ? $posttestResult->score : '' }}</td> --}}
                                    {{-- <td class="text-xs md:text-sm">{{ $posttestResults != null ? $posttestResult->name : '' }}</td> --}}        
                                </tr>
                            @endforeach
                        </tbody>
                    @else
                        <div class="flex items-center justify-center">
                            <p class="text-gray-600 text-xs md:text-sm text-center">Belum ada nilai siswa</p>
                        </div>
                    @endif
                </table>
            </div>
        </div>
    </details> 
  </div>
</div>
@endsection