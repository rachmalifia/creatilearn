{{-- DASHBOARD SUBJECTS LIST FOR STUDENT --}}
@extends('layouts.app')

@section('greeting')
<a href="/courses" class="mx-6 mt-4 btn normal-case btn-neutral btn-ghost btn-sm mb-1 text-xs md:text-sm">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" h-4 w-4 md:h-6 md:w-6">
    <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
  </svg>      
  Kembali ke daftar pelajaran</a>
</div>
@endsection

@section('content')
<div class="container mx-auto mb-10">
  <div class="border rounded-lg p-2 text-sm relative bg-base-100 m-4 md:text-base md:p-6 min-h-screen">
    <div>
      <h5 class="mb-5 text-center text-xs md:text-base">Daftar materi dari pelajaran <span class="font-semibold">{{ $course->title }}</span></h5>
    </div>
    @foreach ($subjects as $subject)
      <details class="collapse collapse-arrow bg-base-300 mb-4">
        <summary class="collapse-title font-medium text-xs md:text-base">
          {{ $subject->title }}
        </summary>
        <div class="collapse-content"> 
            <div class="flex w-full">
                <div class="grid h-20 flex-grow card bg-base-300 rounded-box place-items-center">
                    <a href="">
                        <button class="btn btn-warning rounded-md text-xs md:text-sm normal-case" type="submit" >Kerjakan Ujian Awal
                        </button>
                    </a>
                </div>
                <div class="divider divider-horizontal"></div>
                <div class="grid h-20 flex-grow card bg-base-300 rounded-box place-items-center">
                    <a href="">
                        <button class="btn btn-warning rounded-md text-xs md:text-sm normal-case" type="submit" >Kerjakan Ujian Akhir
                        </button>
                    </a>
                </div>
            </div>
          {{-- <a href="/subject/{{ $subject->slug }}">
            <button class="btn btn-warning rounded-md text-xs md:text-sm normal-case" type="submit" >Lihat Detail</button>
          </a> --}}

        </div>
      </details>
    @endforeach
  </div>
</div>
@endsection