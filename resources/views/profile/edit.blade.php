@extends('layouts.app')

@section('content')
<div class="container mx-auto mb-10">
    <div class="border rounded-lg p-2 text-sm relative bg-base-300 m-4 md:text-base md:p-6 min-h-screen">
        <div class="flex flex-wrap md:flex-nowrap pt-3 pb-2 mb-2 border-b-2">
            <h1 class="font-semibold mx-auto">Ubah data akun</h1>
        </div>
        
        <form class="mt-4 px-3" method="POST" action="/profile/{{ $user->username }}">
            @method('put')
            @csrf
            <div>
                <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nama</label>
                        <div class="mt-2">
                            <input id="name" name="name" type="text"  class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none  focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6" placeholder="Nama" required autofocus value="{{ old('name', $user->name) }}">
                            @error('name')
                                <div>
                                    <p class="text-red-500 text-sm m-1">
                                        {{ $message }}
                                    </p>                      
                                </div>
                            @enderror
                        </div>
                    </div>
                
                
                    <div class="sm:col-span-4">
                        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username <span class="text-xs">(pastikan tidak ada spasi pada input username)</span></label>
                        <div class="mt-2">
                            <input type="text" name="username" id="username" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none  focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6" required placeholder="Username" value="{{ old('username', $user->username) }}">
                            @error('username')
                                <div>
                                    <p class="text-red-500 text-sm m-1">
                                            {{ $message }}
                                    </p>                      
                                </div>
                            @enderror
                        </div>
                    </div>
        
                    <div class="sm:col-span-4">
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                        <div class="mt-2">
                            <input type="email" name="email" id="email" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none  focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6" required placeholder="name@example.com" value="{{ old('email', $user->email) }}">
                            @error('email')
                                <div>
                                    <p class="text-red-500 text-sm m-1">
                                        {{ $message }}
                                    </p>                      
                                </div>
                            @enderror
                        </div>
                    </div>
            
        
                </div>
            </div>
          
            <div class="mt-6 flex items-center justify-start">
              <button type="submit" class="rounded-md bg-primary px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-hover focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary">Ubah</button>
            </div>
        </form>
    </div>
</div> 
@endsection