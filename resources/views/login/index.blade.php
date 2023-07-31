@extends('layouts.app')

@section('content')
<div class="flex flex-col justify-center px-6 py-12 lg:px-8 bg-base-200 min-h-screen" >

    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <img class="mx-auto h-12 w-auto" src="img/logo.svg" alt="creatilearn">

      <h2 class="mt-6 text-center text-2xl font-semibold leading-9 tracking-tight text-gray-900">Selamat Datang</h2>
      <h5 class="text-center text-sm text-gray-900">Masuk ke akun Anda</h5>

      <div class="mt-6">
        {{-- Alert when account successfully created --}}
        @if(session()->has('success'))
        <div class="alert alert-success flex">
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-4 w-4 md:h-6 md:w-6 flex-none" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
          <span class="text-xs md:text-sm grow">{{ session('success') }}</span>
          <strong class="text-base md:text-lg align-center cursor-pointer alert-del flex-none">&times;</strong>
        </div>
        @endif 
        {{-- End Alert Success --}}
      

        {{-- Alert when account can't login --}}
        @if (session()->has('loginError'))
        <div class="alert alert-error flex">
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-4 w-4 md:h-6 md:w-6 flex-none" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
          <span class="text-xs md:text-sm grow">{{ session('loginError') }}</span>
          <strong class="text-base align-center cursor-pointer alert-del flex-none">&times;</strong>
        </div>
        @endif
        {{-- End Alert Failed Login --}}
      </div>
    </div>
  
    <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm">
      <form class="space-y-5" action="/login" method="POST">
        @csrf
        <div>
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
          <div class="mt-2">
            <input id="email" name="email" type="email" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none  focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6" autofocus required value="{{ old('email') }}">
            @error('email')
              <div>
                <p class="text-red-500 text-sm m-1">
                  {{ $message }}
                </p>                      
              </div>
            @enderror
          </div>
        </div>
  
        <div>
          <div class="flex items-center justify-between">
            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Kata sandi</label>
          </div>
          <div class="mt-2">
            <input id="password" name="password" type="password" required class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6" required>
            @error('password')
              <div>
                <p class="text-red-500 text-sm m-1">
                  {{ $message }}
                </p>                      
              </div>
            @enderror
          </div>
        </div>
        <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-primary px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-primary-hover focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary">Masuk</button>
        </div>
      </form>
  
      <p class="mt-10 text-center text-sm text-gray-500">
        Belum punya akun?
        <a href="/register" class="font-semibold leading-6 text-primary hover:text-primary-hover">Daftar</a>
      </p>
    </div>
  </div>

<script>
  var alert_del = document.querySelectorAll('.alert-del');
  alert_del.forEach((x) => x.addEventListener('click', function () {
    x.parentElement.classList.add('hidden');
  }));
</script>
@endsection