@extends('layouts.app')

@section('greeting')
<div>
    <h5 class="mx-6 mt-4 text-sm md:text-base font-semibold">Data Soal</h5>
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
            {{-- Table for Subject lists --}}
            <div class="overflow-x-auto grid place-content-start">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col" class="text-xs md:text-sm">Judul Materi</th>
                        <th scope="col" class="text-xs md:text-sm">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($subjects as $subject)
                        @if ($subject->course_id == $course->id)  
                            <tr>
                                <th class="text-xs md:text-sm">{{ $loop->iteration }}</th>
                                <td class="text-xs md:text-sm">{{ $subject->title }}</td>
                                <td>
                                    {{-- Show ALL Questions where ID Subject --}}
                                    <a href="/questions/{{ $subject->slug }}" class="badge badge-info gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 md:w-6 md:h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>              
                                    </a>
                                </td>
                            </tr>
                        @endif    
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </details>
    @endforeach   
</div>
</div>
@endsection
{{-- @else
    <div class="flex items-center justify-center">
        <p class="text-gray-600 text-xs md:text-sm text-center">Belum ada data materi pada mata pelajaran ini</p>
    </div>
@endif --}}