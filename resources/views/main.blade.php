@extends('layouts.app')
@section('content')
<div class="hero min-h-screen" style="background-image: url(img/hero-image.jpg);">
    <div class="hero-overlay bg-opacity-60"></div>
    <div class="hero-content text-center text-neutral-content">
      <div class="max-w-md">
        <img src="img/logo.svg" alt="creatilearn" class="mx-auto w-auto">
        <h1 class="mb-5 text-5xl font-bold">Selamat Datang</h1>
        <p class="mb-5">Tempat belajar dengan pendekatan Creative Problem Solving untuk siswa</p>
        <a href="/login">
            <button class="btn btn-warning" >Masuk</button>
        </a>
      </div>
    </div>
</div>
@endsection