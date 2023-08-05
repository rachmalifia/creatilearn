@extends('layouts.app')

@section('greetings')

@endsection

@section('content')
<a href="/courses" class="mx-6 mt-4 btn normal-case btn-neutral btn-ghost btn-sm mb-6 md:mb-1 text-xs md:text-sm">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" h-4 w-4 md:h-6 md:w-6">
    <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
  </svg>      
  Kembali ke beranda
</a>
<div class="container mx-auto mb-10 min-h-screen">
  {{-- Alert when data successfully created and edited --}}
  @if (session()->has('success'))
  <div class="alert alert-success w-auto m-4 ">
    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-4 w-4 md:h-6 md:w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
    <span class="text-xs md:text-sm grow">{{ session('success') }}</span>
    <strong class="text-base align-center cursor-pointer alert-del">&times;</strong>
  </div>
  @endif
  {{-- End alert --}}   

  <div class="border rounded-lg p-2 text-sm relative bg-base-300 m-4 md:text-base md:p-6">
    <h3 class="text-sm font-semibold leading-7 text-gray-900 md:text-base">Informasi Pengguna</h3>
    <div class="mt-1 max-w-2xl">
      <a href="/profile/{{ $user->username }}/edit" class="text-xs text-gray-500 md:text-sm flex gap-2">
        Edit Profil
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
          <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
        </svg>
      </a>
    </div>
    <div class="mt-4 border-t-2 border-gray-100 place-content-start">
      <div class="px-4 py-6 sm:px-0">
        <dt class="text-xs font-semibold leading-6 md:text-sm">Nama</dt>
        <dd class="mt-1 text-xs leading-6 text-gray-700 sm:mt-0 md:text-sm">{{ $user->name }}</dd>
      </div>
      <div class="px-4 py-6 sm:px-0">
        <dt class="text-xs font-semibold leading-6 md:text-sm">Username</dt>
        <dd class="mt-1 text-xs leading-6 text-gray-700 sm:mt-0 md:text-sm">{{ $user->username }}</dd>
      </div>
      <div class="px-4 py-6 sm:px-0">
        <dt class="text-xs font-semibold leading-6 md:text-sm">Email</dt>
        <dd class="mt-1 text-xs leading-6 text-gray-700 sm:mt-0 md:text-sm">{{ $user->email }}</dd>
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