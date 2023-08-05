@extends('layouts.app')

@section('greeting')
  @if (auth()->user()->type == 'student')    
    <a href="/groups/{{ $course->slug }}/{{ $subject->slug }}" class="mx-6 mt-4 btn normal-case btn-neutral btn-ghost btn-sm mb-6 md:mb-1 text-xs md:text-sm">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" h-4 w-4 md:h-6 md:w-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
        </svg>      
        Kembali ke daftar kelompok
    </a>
  @else
    <a href="/student-group/{{ $course->slug }}" class="mx-6 mt-4 btn normal-case btn-neutral btn-ghost btn-sm mb-6 md:mb-1 text-xs md:text-sm">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" h-4 w-4 md:h-6 md:w-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
      </svg>      
      Kembali ke daftar kelompok
  </a>
  @endif
@endsection

@section('content')
<div class="container mx-auto mb-10">
  <div class="border rounded-lg p-2 text-sm relative bg-base-100 m-4 md:text-base md:p-6 min-h-screen">
    <div>
      <iframe class="w-2/3 h-screen mx-auto" src="{{ $discussion->case_study }}" frameborder="0"></iframe>
    </div>
    <a class="btn btn-sm capitalize mt-8 mb-3" href="https://docs.google.com/document/d/1PeR3WixpRynnXBTqUdcO7WNUYazeD96kFpzB6KKoHiA/edit?usp=sharing" target="_blank">Template jawaban</a>
    <hr/>
    <div>
      <form method="POST" action="/discussion/{{ $subject->slug }}/{{ $discussion->id }}">
        @method('put')
        @csrf
        <input type="hidden" name="case_study" id="case_study" value="{{ $discussion->case_study }}">
        <input type="hidden" name="group_id" id="group_id" value="{{ $discussion->group_id }}">
        <input type="hidden" name="subject_id" id="subject_id" value="{{ $discussion->subject_id }}">
        <div class="sm:col-span-4">
          <label for="project_result" class="block text-xs md:text-base font-semibold text-gray-900 mt-2">Pengumpulan hasil pengerjaan</label>
          <div class="mt-2">
              <textarea id="project_result" name="project_result" rows="2" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none  focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6" required placeholder="Masukkan link google docs hasil pengerjaan">{{ $discussion->project_result }}</textarea>
              @error('project_result')
                  <div>
                      <p class="text-red-500 text-sm m-1">
                          {{ $message }}
                      </p>                      
                  </div>
              @enderror
          </div>
        </div>
        <button type="submit" class="btn btn-warning capitalize mt-2">Kumpulkan</button>
      </form>
    </div>
    <hr class="mt-8"/>
    <div class="flex justify-between items-center mt-2 mb-4">
      <h2 class="text-xs md:text-lg font-semibold text-gray-900 ">Pendapat anggota {{ $group->name }}</h2>
    </div>
    @include('discuss.commentsDisplay', ['comments' => $discussion->comments, 'discussion_id' => $discussion->id])
  </div>
</div>
@endsection