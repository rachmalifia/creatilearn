@extends('layouts.app')

@section('greeting')
<a href="/course/{{ $course->slug }}" class="mx-6 mt-4 btn normal-case btn-neutral btn-ghost btn-sm mb-6 md:mb-1 text-xs md:text-sm">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" h-4 w-4 md:h-6 md:w-6">
    <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
  </svg>      
  Kembali ke daftar materi</a>
@endsection

@section('content')
<div class="container mb-10 flex items-center justify-center">
  <div class="border rounded-lg p-2 relative bg-base-100 m-4 md:p-6 min-h-screen w-2/3">
    @if ($quiz != null || $pretest != null || $posttest != null)   
      <div>
        <h5 class="mb-5 text-center text-xs md:text-base">Hasil belajar materi <span class="font-semibold">{{ $subject->title }}</span></h5>
      </div>
      <div class="overflow-x-auto">
        <table class="table table-sm md:table-md grid place-content-start">
          <thead>
          </thead>
          <tbody>
            <tr>
              <th class="text-xs md:text-sm">Ujian Awal</th>
              <td class="text-xs md:text-sm">:</td>
              <td class="text-xs md:text-sm">{{ $pretest == null ? 'Belum ada nilai' : $pretest->score }}</td>
            </tr> 
            <tr>
              <th class="text-xs md:text-sm">Kuis</th>
              <td class="text-xs md:text-sm">:</td>
              <td class="text-xs md:text-sm">{{ $quiz == null ? 'Belum ada nilai' : $quiz->score }}</td>
            </tr> 
            <tr>
              <th class="text-xs md:text-sm">Ujian Akhir</th>
              <td class="text-xs md:text-sm">:</td>
              <td class="text-xs md:text-sm">{{ $posttest == null ? 'Belum ada nilai' : $posttest->score }}</td>
            </tr> 
          </tbody>
        </table>
      </div>
    @else 
      <div class="flex items-center justify-center h-screen">
          <p class="text-sm md:text-base text-center text-gray-500">Kamu belum mengerjakan ujian!</p>
      </div>
    @endif
  </div>
</div>
{{-- <div class="container mb-10 -mt-24">
  <div class="m-6 md:p-6 w-auto min-h-screen flex justify-center items-center">
    <div class="card bg-base-100 shadow-xl md:mx-24 justify-center items-center md:w-2/3">
        @if (($quiz->count()) || ($pretest->count()) || ($posttest->count()))  
          <div class="card-body">
            <div>
              <h5 class="mb-5 text-center text-xs md:text-base">Hasil belajar materi <span class="font-semibold">{{ $subject->title }}</span></h5>
            </div>
              <div class="overflow-x-auto">
                <table class="table grid place-content-start">
                  <thead>
                    <tr>
                      <th>Ujian Awal</th>
                      <th>Kuis</th>
                      <th>Ujian Akhir</th>
                    </tr>
                  </thead>
                  <tbody> 
                    <tr>
                      <td>{{ $pretest->score }}</td>
                      <td>{{ $quiz->score }}</td>
                      <td>{{ $posttest->score }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
          </div>
        @else
          <div class="flex items-center justify-center h-screen">
              <p class="text-sm md:text-base text-center font-semibold">Kamu belum mengerjakan ujian!</p>
          </div>
        @endif
    </div>
  </div>
</div> --}}
{{-- 
<div class="container mx-auto mb-10">
  <div class="border rounded-lg p-2 text-sm relative bg-base-100 m-4 md:text-base md:p-6 min-h-screen">
    <div>
      <h5 class="mb-5 text-center text-xs md:text-base">Hasil belajar materi <span class="font-semibold">{{ $subject->title }}</span></h5>
    </div>
    <div class="overflow-x-auto w-1/4">
      <table class="table">
        <!-- head -->
        <thead>
          <tr>
            <th>Ujian Awal</th>
            <th>Kuis</th>
            <th>Ujian Akhir</th>
          </tr>
        </thead>
        <tbody> 
          <tr>
            <td>{{ $pretest->score }}</td>
            <td>{{ $quiz->score }}</td>
            <td>{{ $posttest->score }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div> --}}
@endsection