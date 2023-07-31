@extends('layouts.app')

@section('greeting')
<a href="" class="mx-6 mt-4 btn normal-case btn-neutral btn-ghost btn-sm mb-6 md:mb-1 text-xs md:text-sm">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" h-4 w-4 md:h-6 md:w-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
    </svg>      
    Kembali ke daftar materi</a>
@endsection

@section('content')
<div class="min-h-screen">
    <div class="container mx-auto px-6 font-inter sm:flex flex-wrap gap-7 justify-evenly mt-10">
        {{-- @foreach ($courses as $course) --}}
          <div class="card rounded-xl shadow-xl overflow-hidden mb-10 bg-base-100 w-64 md:w-80 lg:w-72">
            <div class="card-body">
              <h2 class="card-title text-lg">Kelompok 1</h2>
              <div class="card-actions justify-end">
                <a href="/group-discussion">
                  <button id="button-materi" class="btn btn-warning rounded-md text-sm capitalize" type="submit" >Lihat</button>
                </a>
              </div>
            </div>
          </div>
          <div class="card rounded-xl shadow-xl overflow-hidden mb-10 bg-base-100 w-64 md:w-80 lg:w-72">
            <div class="card-body">
              <h2 class="card-title text-lg">Kelompok 2</h2>
              <div class="card-actions justify-end">
                <a href="/group-discussion">
                  <button id="button-materi" class="btn btn-warning rounded-md text-sm capitalize" type="submit" >Lihat</button>
                </a>
              </div>
            </div>
          </div>
          <div class="card rounded-xl shadow-xl overflow-hidden mb-10 bg-base-100 w-64 md:w-80 lg:w-72">
            <div class="card-body">
              <h2 class="card-title text-lg">Kelompok 3</h2>
              <div class="card-actions justify-end">
                <a href="/group-discussion">
                  <button id="button-materi" class="btn btn-warning rounded-md text-sm capitalize" type="submit" >Lihat</button>
                </a>
              </div>
            </div>
          </div>
          <div class="card rounded-xl shadow-xl overflow-hidden mb-10 bg-base-100 w-64 md:w-80 lg:w-72">
            <div class="card-body">
              <h2 class="card-title text-lg">Kelompok 4</h2>
              <div class="card-actions justify-end">
                <a href="/group-discussion">
                  <button id="button-materi" class="btn btn-warning rounded-md text-sm capitalize" type="submit" >Lihat</button>
                </a>
              </div>
            </div>
          </div>
        {{-- @endforeach --}}
      </div>
</div>
@endsection