@extends('layouts.app')
@include('layouts.navbar')
@section('content')
<div class="container text-sm breadcrumbs px-6 mt-4">
    <ul>
        <li><a>Kelas</a></li> 
        <li><a>Materi</a></li>
        <li><a>Ujian</a></li>
    </ul>
</div>
@include('partials.questions-content')
@endsection