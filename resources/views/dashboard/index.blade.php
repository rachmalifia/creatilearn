@extends('layouts.app')

@section('greeting')
<div>
    <h5 class="mx-6 mt-4 text-sm md:text-base">Selamat datang, <span class="font-semibold text-sm md:text-base">{{ auth()->user()->name }}</span></h5>
</div>
@endsection

@section('content')
<div class="min-h-screen">
    <div class="container mx-auto px-6 font-inter sm:flex flex-wrap gap-7 justify-evenly mt-10">
        @foreach ($courses as $course)
          <div class="card rounded-xl shadow-xl overflow-hidden mb-10 bg-base-100 w-64 md:w-80 lg:w-72">
            <div class="card-body">
              <h2 class="card-title text-lg">{{ $course->title }}</h2>
              <p class="text-sm">{{ $course->grade }}</p>
              <div class="card-actions justify-end">
                <a href="/{{ auth()->user()->type == 'teacher' ? $course->slug .'/subjects' : 'course/'. $course->slug }}">
                  <button id="button-materi" class="btn btn-warning rounded-md text-sm" type="submit" >Lihat</button>
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
</div>
@endsection