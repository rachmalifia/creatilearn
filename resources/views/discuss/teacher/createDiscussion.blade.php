@extends('layouts.app')

@section('content')
<div class="container mx-auto mb-10">
    <div class="border rounded-lg p-2 text-sm relative bg-base-100 m-4 md:text-base md:p-6 min-h-screen">
        <div class="flex flex-wrap md:flex-nowrap pt-3 pb-2 mb-2 border-b-2">
            <h1 class="mx-auto">Tambah forum diskusi pada pelajaran <span class="font-semibold">{{ $course->title }}</span> untuk <span class="font-semibold">{{ $group->name }}</span></h1>
        </div>
        
        <form class="mt-4 px-3" method="POST" action="/discussions/{{ $course->slug }}">
            @csrf
            <div>
                <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-3 sm:grid-cols-6">
                    <input type="hidden" name="group_id" id="group_id" value="{{ $group->id }}">
                    <div class="sm:col-span-4">
                        <div class="mt-2 mb-4">
                            <label for="subject_id" class="block text-sm font-medium leading-6 text-gray-900">
                                <span class="label-text">Pilih Materi untuk Studi Kasus</span>
                            </label>
                            <div class="mt-2">
                                <select name="subject_id" id="subject_id" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
                                    @foreach ($subjects as $subject)
                                        @if (old('subject_id') == $subject->id)
                                            <option value="{{ $subject->id }}" selected>{{ $subject->title }}</option>
                                        @else 
                                            <option value="{{ $subject->id }}">{{ $subject->title }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>  
                    {{-- Mau pake trix atau pake link embed 
                        embed aja dah --}}
                    <div class="sm:col-span-4">
                        <label for="case_study" class="block text-sm font-medium leading-6 text-gray-900">Studi Kasus</label>
                        <div class="mt-2">
                            <textarea id="case_study" name="case_study" rows="3" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none  focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6" required placeholder="Masukkan embedded link google docs" value="{{ old('case_study') }}"></textarea>
                            @error('case_study')
                                <div>
                                    <p class="text-red-500 text-sm m-1">
                                        {{ $message }}
                                    </p>                      
                                </div>
                            @enderror
                        </div>
                        <p class="mt-2 text-sm text-gray-600">Berikan studi kasus sesuai dengan materi yang sedang diajarkan</p>
                    </div>
                </div>
            </div>
          
            <div class="mt-6 flex items-center justify-start">
              <button type="submit" class="rounded-md bg-primary px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-hover focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary">Tambahkan</button>
            </div>
        </form>
    </div>
</div>
@endsection
