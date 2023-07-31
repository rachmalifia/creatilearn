@extends('layouts.app')

@section('greeting')
<div>
    <h5 class="mx-6 mt-4">Selamat datang, <span class="font-semibold">{{ auth()->user()->name }}</span></h5>
</div>
@endsection