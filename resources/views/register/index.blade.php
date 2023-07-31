@extends('layouts.app')

@section('content')
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 bg-base-200" >
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-12 w-auto" src="img/logo.svg" alt="creatilearn">
        <h2 class="mt-6 text-center text-2xl font-semibold leading-9 tracking-tight text-gray-900">Selamat Datang</h2>
        <h5 class="text-center text-sm text-gray-900">Buat akun Anda</h5>
    </div>
  
    <div class="mt-6 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-5" action="/register" method="POST">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nama</label>
                <div class="mt-2">
                    <input id="name" name="name" type="text" required class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none  focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6"  value="{{ old('name') }}">
                    @error('name')
                    <div>
                        <p class="text-red-500 text-sm m-1">
                            {{ $message }}
                        </p>                   
                    </div>
                    @enderror
                </div>
            </div>
            <div>
                <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                <div class="mt-2">
                    <input id="username" name="username" type="text" required class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none  focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6"  value="{{ old('username') }}">
                    @error('username')
                    <div>
                        <p class="text-red-500 text-sm m-1">
                            {{ $message }}
                        </p>                   
                       
                    </div>
                    @enderror
                </div>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                <div class="mt-2">
                    <input id="email" name="email" type="email" required class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none  focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6"  value="{{ old('email') }}">
                    @error('email')
                    <div>
                        <p class="text-red-500 text-sm m-1">
                            {{ $message }}
                        </p>                   
                       
                    </div>
                    @enderror
                </div>
            </div>
            <div >
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Kata sandi</label>
                </div>
                <div class="mt-2">
                    <input id="password" name="password" type="password" required class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
                    @error('password')
                    <div>
                        <p class="text-red-500 text-sm m-1">
                            {{ $message }}
                        </p>                      
                    </div>
                    @enderror
                    <label class="flex items-center  justify-start px-1 py-2">
                        <input type="checkbox" class="checkbox mr-2" onclick="showHideFunction()"/>
                        <span class="text-xs">Tampilkan kata sandi</span> 
                    </label>

                </div>
            </div>
            <div>
                <input type="hidden" name="type" id="type" value="2">
                {{-- <label class="label">
                    <span class="label-text">Daftar sebagai</span>
                </label>
                <select name="type" id="type" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
                    <option value="0">Admin</option>
                    <option value="1">Guru</option>
                    <option value="2">Siswa</option>
                </select> --}}
            </div>

            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-primary px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-primary-hover focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary">Daftar</button>
            </div>
        </form>
  
        <p class="mt-10 text-center text-sm text-gray-500">
            Sudah punya akun?
            <a href="/login" class="font-semibold leading-6 text-primary hover:text-primary-hover">Masuk</a>
        </p>
    </div>
</div>

<script>
    function showHideFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

</script>
@endsection