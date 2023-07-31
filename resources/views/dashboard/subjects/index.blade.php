{{-- DASHBOARD SUBJECTS LIST FOR STUDENT --}}
@extends('layouts.app')

@section('greeting')
<a href="/courses" class="mx-6 mt-4 btn normal-case btn-neutral btn-ghost btn-sm mb-1 h-auto text-xs md:text-sm">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" h-4 w-4 md:h-6 md:w-6">
    <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
  </svg>      
  Kembali ke daftar pelajaran</a>
</div>
@endsection

@section('content')

{{-- Alert when account successfully created --}}
@if(session()->has('success'))
  <div class="alert alert-success w-auto m-4">
    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-4 w-4 md:h-6 md:w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    <span class="text-xs md:text-sm grow">{{ session('success') }}</span>
    <strong class="text-base md:text-lg align-center cursor-pointer alert-del">&times;</strong>
  </div>
@endif 
{{-- End Alert Success --}}

<div class="container mx-auto mb-10">
  <div class="border rounded-lg p-2 text-sm relative bg-base-100 m-4 md:text-base md:p-6 min-h-screen">
    @if ($subjects->count())
      <div>
        <h5 class="mb-5 text-center text-xs md:text-base">Daftar materi dari pelajaran <span class="font-semibold">{{ $course->title }}</span></h5>
      </div>
      @foreach ($subjects as $subject)
        <details class="collapse collapse-arrow bg-base-300 mb-4">
          <summary class="collapse-title font-medium text-xs md:text-base">
            {{ $subject->title }}
          </summary>
          <div class="flex flex-wrap gap-3 collapse-content justify-center md:justify-start"> 
            <ul class="mx-4 text-xs md:text-base -mt-2">
              <li class="mt-4" >
                <a href="/confirmation/{{ $subject->slug  }}/pretest">
                  <button class="text-xs md:text-base btn btn-sm h-auto capitalize font-normal">1. Ujian Awal</button>
                </a>
              </li>
              <li class="mt-4">
                <a href="/subject/{{ $subject->slug }}">
                  <button class="text-xs md:text-base btn btn-sm h-auto capitalize font-normal">2. Belajar</button>
                </a>
              </li>
              <li class="mt-4">
                <a href="/groups/{{ $course->slug }}/{{ $subject->slug }}">
                  <button class="text-xs md:text-base btn btn-sm h-auto capitalize font-normal">3. Diskusi</button>
                </a>
              </li>
              <li class="mt-4">
                <a href="/confirmation/{{ $subject->slug }}/posttest">
                  <button class="text-xs md:text-base btn btn-sm h-auto capitalize font-normal">4. Ujian Akhir</button>
                </a>
              </li>
              <li class="mt-4 mb-4">
                <a href="/result/{{ $subject->slug }}">
                  <button class="text-xs md:text-base btn btn-sm h-auto capitalize font-normal">5. Hasil Belajar</button>
                </a>
              </li>
            </ul>
          </div>
        </details>
      @endforeach
    @else
      <div class="flex items-center justify-center h-screen">
        <p class="text-gray-400 text-sm md:text-base text-center">Belum ada data materi pada pelajaran {{ $course->title }}</p>
      </div>
    @endif
  </div>
</div>

<script>
  var alert_del = document.querySelectorAll('.alert-del');
  alert_del.forEach((x) => x.addEventListener('click', function () {
    x.parentElement.classList.add('hidden');
  }));
</script>
@endsection