@extends('layouts.app')

@section('content')
<div class="container mx-auto mb-10">
    <div class="border rounded-lg p-2 text-sm relative bg-base-100 m-4 md:text-base md:p-6 min-h-screen">
        <div class="flex flex-wrap md:flex-nowrap pt-3 pb-2 mb-2 border-b-2">
            <h1 class="font-semibold mx-auto">Tambah kelompok baru pada Pelajaran {{ $course->title }}</h1>
        </div>
        
        <form class="mt-4 px-3" method="POST" action="/student-group/{{ $course->slug }}">
            @csrf
            <div>
                <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-3 sm:grid-cols-6">
                    <input type="hidden" name="course_id" id="course_id" value="{{ $course->id }}">
                    <div class="sm:col-span-4">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Kelompok</label>
                        <div class="mt-2 mb-4">
                            <input id="name" name="name" type="text" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none  focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6" required placeholder="Kelompok 1" autofocus value="{{ old('name') }}">
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
                        <label for="member" class="block text-sm font-medium leading-6 text-gray-900">Anggota <span class="text-xs">opsional</span></label>
                        <div class="mt-2 mb-4">
                            <input type="text" name="member" id="member" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none  focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6" placeholder="Ariana, Jamal, Sekar" value="{{ old('member') }}">
                            @error('member')
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
          
            <div class="mt-4 flex items-center justify-start">
              <button type="submit" class="rounded-md bg-primary px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-hover focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary">Tambahkan</button>
            </div>
        </form>
    </div>
</div>
  
{{-- Automatically slug generate from title --}}
<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/courses/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
</script>
@endsection
