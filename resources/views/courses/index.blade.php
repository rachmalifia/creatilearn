@extends('layouts.app')

@section('greeting')
<div>
    <h5 class="mx-6 mt-4">Selamat datang, <span class="font-semibold">{{ auth()->user()->name }}</span></h5>
</div>
@endsection

@section('content')
<div class="container mx-auto mb-10">
  <div class="border rounded-lg p-2 text-sm relative bg-base-100 m-4 md:text-base md:p-6 min-h-screen">
    <div class="flex flex-wrap md:flex-nowrap pt-3 pb-2 mb-2 border-b-2">
        <h1 class="font-semibold mx-auto">Semua Pelajaran</h1>
    </div>   
    
    {{-- Alert when data successfully created and edited --}}
    @if (session()->has('success'))
    <div class="alert alert-success flex md:w-3/4">
      <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-4 w-4 md:h-6 md:w-6 flex-none" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
      <span class="text-xs md:text-sm grow">{{ session('success') }}</span>
      <strong class="text-base align-center cursor-pointer alert-del flex-none">&times;</strong>
    </div>
    @endif
    {{-- End alert --}}
    
    {{-- Table --}}
    <div class="mt-4">
      <div class="grid md:w-3/4 place-content-end">
          <a href="/dashboard/courses/create" class="btn btn-neutral btn-sm mb-3 normal-case text-xs md:text-sm ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 md:w-6 md:h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>      
            <span class="text-xs md:text-sm">Mata pelajaran baru</span>
          </a>
      </div>
      <div class="overflow-x-auto">
        @if ($courses->count())    
          <table class="table table-sm md:table-md w-auto md:w-3/4">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col" class="text-xs md:text-sm">Judul</th>
                <th scope="col" class="text-xs md:text-sm">Tingkat</th>
                <th scope="col" class="text-xs md:text-sm">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($courses as $course)    
              <tr>
                <th class="text-xs md:text-sm">{{ $loop->iteration }}</th>
                <td class="text-xs md:text-sm">{{ $course->title }}</td>
                <td class="text-xs md:text-sm">{{ $course->grade }}</td>
                <td class="flex gap-2">
                  <a href="/dashboard/courses/{{ $course->slug }}/edit" class="badge badge-warning gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 md:w-6 md:h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>                  
                  </a>
                  <form action="/dashboard/courses/{{ $course->slug }}" method="POST" class="inline">
                    @method('delete')
                    @csrf
                    <button class="badge badge-error border-0 gap-2" onclick="return confirm('Apakah yakin menghapus data?')">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 md:w-6 md:h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                      </svg>                    
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        @else
        <div class="flex items-center justify-center h-screen">
          <p class="text-gray-500 text-sm md:text-base text-center">Belum ada data Pelajaran</p>
        </div>
        @endif
      </div>
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