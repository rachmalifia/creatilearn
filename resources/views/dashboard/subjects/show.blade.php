@extends('layouts.app')
@section('greeting')
<div>
    <a href="/{{ auth()->user()->type == 'teacher' ? $course->slug . '/subjects' : 'course/'. $course->slug }}" class="mx-6 mt-4 btn normal-case btn-neutral btn-ghost btn-sm mb-1 text-xs md:text-sm">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" h-4 w-4 md:h-6 md:w-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
      </svg>      
      Kembali ke daftar materi</a>
</div>
@endsection

@section('content') 
<div class="container mx-auto mb-10">
    <div class="border rounded-lg p-2 text-sm relative bg-base-100 m-4 md:text-base md:p-6 min-h-screen">
        <h2 class="font-semibold mb-4 text-sm md:text-base">{{ $subject->title }}</h2>
        <div class="src-mulmed">
            <iframe class="mx-auto w-full h-auto md:max-w-xl md:h-96"  src="{{ $subject->url_video }}" frameborder="0" allowfullscreen ></iframe>
        </div>
        @if ($subject->url_pdf != null)
        <div>
            <iframe class="mx-auto mt-10 w-4/5" src="{{ $subject->url_pdf }}" allow="autoplay"></iframe>
        </div>
        @endif
        @if (auth()->user()->type == 'student')    
            <div class="flex mt-12 justify-end">
                {{-- /confirmation/{subject}/{question:code} --}}
                <a href="{{ $result == null ? '/confirmation' .'/' . $subject->slug . '/quiz' : ''}}" style="{{ $result == null ? '' : 'pointer-events: none' }}">
                    <button class="btn btn-warning rounded-md text-sm capitalize" {{ $result == null ? '' : 'disabled'}} type="submit">Kuis</button>
                </a>
            </div>
        @endif
    </div>
</div>
@endsection