@extends('layouts.app')

@section('greeting')
<div>
    <h5 class="mx-6 mt-4 text-sm md:text-base font-semibold">Data Kelompok Siswa per Pelajaran</h5>
</div>
@endsection

@section('content')
<div class="container mx-auto mb-10">
  <div class="border rounded-lg p-2 text-sm relative bg-base-100 m-4 md:text-base md:p-6 min-h-screen">
    <div class="flex flex-wrap md:flex-nowrap pt-3 pb-2 mb-6 border-b-2">
        <h1 class="font-semibold mx-auto ">Daftar Pelajaran</h1>
    </div>   
    
    @foreach ($courses as $course)
    <details class="collapse collapse-arrow bg-base-300 mb-4">
        <summary class="collapse-title font-medium text-xs md:text-base">
        {{ $course->title }}
        </summary>
        <div class="collapse-content">
            <a href="/student-group/{{ $course->slug }}">
                <button class="text-xs md:text-base btn btn-sm h-auto normal-case font-normal">Lihat daftar kelompok</button>
            </a>
    </details>
    @endforeach   
  </div>
</div>
@endsection