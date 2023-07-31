@extends('layouts.app')

@section('greeting')
<div>
    <a href="/dashboard/student-group" class="mx-6 mt-4 btn normal-case btn-neutral btn-ghost btn-sm mb-1 text-xs md:text-sm h-auto">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" h-4 w-4 md:h-6 md:w-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
      </svg>      
      Kembali ke daftar pelajaran</a>
</div>
@endsection

@section('content')
<div class="container mx-auto mb-10">
  <div class="border rounded-lg p-2 text-sm relative bg-base-100 m-4 md:text-base md:p-6 min-h-screen">
    <div class="flex flex-wrap md:flex-nowrap pt-3 pb-2 mb-2 border-b-2">
        <h1 class="font-semibold mx-auto text-center">Data Kelompok pada Pelajaran {{ $course->title }}</h1>
    </div>   
    
    {{-- Alert when data successfully created and edited --}}
    @if (session()->has('success'))
    <div class="alert alert-success flex">
      <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-4 w-4 md:h-6 md:w-6 flex-none" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
      <span class="text-xs md:text-sm grow">{{ session('success') }}</span>
      <strong class="text-base align-center cursor-pointer alert-del flex-none">&times;</strong>
    </div>
    @endif
    {{-- End alert --}}
    
    {{-- Table --}}
    <div class="mt-4">
      <div class="grid place-content-end">
          <a href="/student-group/{{ $course->slug }}/create" class="btn btn-neutral btn-sm mb-3 normal-case text-xs md:text-sm h-auto ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 md:w-6 md:h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>      
            <span class="text-xs md:text-sm">Kelompok</span>
          </a>
      </div>    
      @if ($groups->count())
        @foreach ($groups as $group)
          <details class="collapse collapse-arrow bg-base-300 mb-4">
            <summary class="collapse-title font-medium text-xs md:text-base">
              <div class="flex gap-x-2">
                {{ $group->name }}
                <a href="/student-group/{{ $course->slug }}/{{ $group->id }}/edit" class="text-xs text-gray-500 md:text-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 md:w-5 md:h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                  </svg>
                </a>
              </div>
            </summary>
              <div class="collapse-content">                
                <div class="flex gap-x-2 -mt-2">
                  @if ($group->member != null)
                  <p class="mb-3 text-xs md:text-base">Anggota: {{ $group->member }}</p>
                  @endif
                  <form action="/student-group/{{ $course->slug }}/{{ $group->id }}" method="POST" class="inline">
                    @method('delete')
                    @csrf
                    <button class="text-gray-500" onclick="return confirm('Apakah Anda yakin akan menghapus data?')">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 md:w-5 md:h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                      </svg>
                    </button>
                  </form>
                </div>
                {{-- Button Add Discussion --}}
                <div class="grid place-content-start">
                  <a href="/discussions/{{ $course->slug }}/{{ $group->id }}/create" class="btn btn-sm mb-3 normal-case text-xs md:text-sm h-auto ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 md:w-6 md:h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>      
                    <span class="text-xs md:text-sm">Diskusi</span>
                  </a>
              </div>   
              <div class="overflow-x-auto">
                <table class="table table-sm md:table-md w-auto md:w-3/4">
                    <thead>
                      <tr>
                        <th scope="col"></th>
                        <th scope="col" class="text-xs md:text-sm">Materi</th>
                        <th scope="col" class="text-xs md:text-sm">Studi Kasus</th>
                        <th scope="col" class="text-xs md:text-sm">Hasil Proyek</th>
                        <th scope="col" class="text-xs md:text-sm">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($discussions as $discussion)  
                        @if ($discussion->group_id == $group->id)    
                          <tr>
                            <th class="text-xs md:text-sm">{{ $loop->iteration }}</th>
                            <td class="text-xs md:text-sm">{{ $discussion->title }}</td>
                            <td class="text-xs md:text-sm">{{ $discussion->case_study }}</td>
                            <td class="text-xs md:text-sm">{{ $discussion->project_result }}</td>
                            <td class="flex gap-2">
                              <a href="/discussions/{{ $course->slug }}/{{ $discussion->id }}/show" class="badge badge-info gap-2">   
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 md:w-6 md:h-6">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                                 
                              </a>
                              <a href="/discussions/{{ $course->slug }}/{{ $discussion->id }}/edit" class="badge badge-warning gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 md:w-6 md:h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                  </svg>                  
                              </a>
                              <form action="/discussions/{{ $course->slug }}/{{ $discussion->id }}" method="POST" class="inline">
                                @method('delete')
                                @csrf
                                <button class="badge badge-error border-0 gap-2" onclick="return confirm('Apakah Anda yakin akan menghapus data?')">
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 md:w-6 md:h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                  </svg>                    
                                </button>
                              </form>
                            </td>
                        @endif  
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </details>
        @endforeach
      @else
        <div class="flex items-center justify-center">
          <p class="text-gray-600 text-sm md:text-base text-center">Belum ada data kelompok pada pelajaran ini</p>
        </div>
        @endif
      </div>
    </div>
  </div>
  
  
  <script>
  var alert_del = document.querySelectorAll('.alert-del');
  alert_del.forEach((x) => x.addEventListener('click', function () {
    x.parentElement.classList.add('hidden');
  }));
</script>
@endsection
{{-- @else
  <div class="flex items-center justify-center">
    <p class="text-gray-600 text-sm md:text-base text-center">Belum ada data diskusi pada kelompok siswa ini</p>
  </div>
@endif --}}
  {{-- <ul>
    @foreach ($subjects as $subject)
      <li>
        <a href="/discussion/{{ $subject->slug }}/{{ $group->id }}" class="inline-block">
          <button class="text-xs md:text-base btn btn-sm h-auto normal-case font-normal mt-2">Studi Kasus {{ $subject->title }} </button>
        </a>
      </li>
    @endforeach
  </ul> --}}