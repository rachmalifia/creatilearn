@extends('layouts.app')

@section('content')
<div class="container mx-auto mb-10">
    <div class="border rounded-lg p-2 text-sm relative bg-base-100 m-4 md:text-base md:p-6 min-h-screen">
        <div class="flex flex-wrap md:flex-nowrap pt-3 pb-2 mb-2 border-b-2">
            <h1 class="font-semibold mx-auto">Ubah data materi untuk mata pelajaran <span class="font-semibold">{{ $course->title }}</span></h1>
        </div>
        
        <form class="mt-4 px-3" method="POST" action="/{{ $course->slug }}/subjects/{{ $subject->slug }}">
            @method('put')
            @csrf
            <div>
                <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <input id="course_id" name="course_id" type="hidden" value="{{ $course->id}}">
                    </div>

                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Judul Materi</label>
                        <div class="mt-2">
                            <input id="title" name="title" type="text" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none  focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6" required placeholder="Judul materi" autofocus value="{{ old('title', $subject->title) }}">
                            @error('title')
                                <div>
                                    <p class="text-red-500 text-sm m-1">
                                        {{ $message }}
                                    </p>                      
                                </div>
                            @enderror
                        </div>
                    </div>
                
                    <div class="sm:col-span-4">
                        <label for="slug" class="block text-sm font-medium leading-6 text-gray-900">Slug</label>
                        <div class="mt-2">
                            <input type="text" name="slug" id="slug" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none  focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6" required placeholder="judul-materi" value="{{ old('slug', $subject->slug) }}">
                            @error('slug')
                                <div>
                                    <p class="text-red-500 text-sm m-1">
                                            {{ $message }}
                                    </p>                      
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="highlight" class="block text-sm font-medium leading-6 text-gray-900">Materi Pokok</label>
                        <div class="mt-2">
                            <input type="text" name="highlight" id="highlight" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none  focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6" required placeholder="Pokok dari pembahasan materi" value="{{ old('highlight', $subject->highlight) }}">
                            @error('highlight')
                                <div>
                                    <p class="text-red-500 text-sm m-1">
                                            {{ $message }}
                                    </p>                      
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="url_video" class="block text-sm font-medium leading-6 text-gray-900">Link Video <span class="text-xs">upload video ke youtube dan pastikan visibilitas video publik atau unlisted</span></label></label>
                        <div class="mt-2">
                            <input type="text" name="url_video" id="url_video" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none  focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6" required placeholder="https://youtu.be/example" value="{{ old('url_video', $subject->url_video) }}">
                            @error('url_video')
                                <div>
                                    <p class="text-red-500 text-sm m-1">
                                            {{ $message }}
                                    </p>                      
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="url_pdf" class="block text-sm font-medium leading-6 text-gray-900">Link Materi <span class="text-xs">upload materi dalam format (pdf) ke google drive dan pastikan akses file untuk publik</span></label>
                        <div class="mt-2">
                            <input type="text" name="url_pdf" id="url_pdf" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none  focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6" placeholder="https://drive.google.com/file/d/example" value="{{ old('url_pdf', $subject->url_pdf) }}">
                            @error('url_pdf')
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
  
{{-- Automatically slug generate from title --}}
<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/subjects/checkSubjectSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
</script>
@endsection
