@extends('layouts.app')
@include('layouts.navbar')
@section('content')
<div class="container text-sm breadcrumbs px-6 mt-4">
    <ul>
        <li>Kelas</li> 
        <li>Materi</li> 
        <li><a class="active">Kuis</a></li> 
    </ul>
  </div>
@include('partials.questions-content')
@endsection