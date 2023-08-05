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
    <hr class="mt-8"/>
    {{-- <div class="flex justify-between items-center mt-2 mb-4">
      <h2 class="text-xs md:text-lg font-semibold text-gray-900 ">Diskusi</h2>
    </div> --}}
    {{-- @include('discuss.commentsDisplay', ['comments' => $discussion->comments, 'discussion_id' => $discussion->id]) --}}
    {{-- <hr class="mt-8"/> --}}
    <div class="flex justify-between items-center mt-2 mb-2">
      <h2 class="text-xs md:text-lg font-semibold text-gray-900 ">Masukkan pendapat</h2>
    </div>
    <form method="POST" action="/discussion/comment">
        @csrf
        <textarea id="body" name="body" rows="4" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none  focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6 mb-2"  required placeholder="Ketikan pendapatmu.."></textarea>
        @error('body')
          <div>
              <p class="text-red-500 text-sm m-1">
                  {{ $message }}
              </p>                      
          </div>
        @enderror
        <input type="hidden" name="discussion_id" id="discussion_id" value="{{ $discussion->id }}" />
        <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}" />
        <input type="hidden" name="likes" id="likes" value="0" />
        
        {{-- <button type="submit" class="btn btn-warning capitalize">Kirim</button> --}}
        <!-- The button to open modal -->
        <label for="my_modal" class="btn btn-warning text-sm capitalize">Kirim</label>

        <!-- Put this part before </body> tag -->
        <input type="checkbox" id="my_modal" class="modal-toggle" />
        <div class="modal md:modal-bottom">
          <div class="modal-box">
            <h3 class="font-bold">Konfirmasi</h3>
            <div class="alert mt-1 p-2">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6 md:w-6 md:h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
              <span>Setelah mengirimkan, kamu tidak bisa mengubahnya</span>
            </div>
            <div class="py-4">
              <p>Apakah kamu yakin mengirimkan pendapatmu?</p>
              <p class="mt-2">Jangan khawatirkan pendapat salah! Karena tahap ini merupakan bagian dari proses belajar mu! &#128521;</p>
            </div>
            <div class="modal-action">
              <label for="my_modal" class="btn capitalize">Batalkan</label>
              <a>
                  <button class="btn btn-neutral capitalize" type="submit">Ya</button>
              </a>
            </div>
          </div>
        </div>
    </form>
  </div>
</div>
@endsection