@extends('layouts.app')
@section('greeting')
<div>
    <a href="/questions/{{ $subject->slug }}" class="mx-6 mt-4 btn normal-case btn-neutral btn-ghost btn-sm mb-1 text-xs md:text-sm h-auto">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" h-4 w-4 md:h-6 md:w-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
      </svg>      
      Kembali ke daftar soal</a>
</div>
@endsection

@section('content')   
<div class="container mx-auto mb-10">
    <div class="border rounded-lg p-2 text-sm relative bg-base-100 m-4 md:text-base md:p-6 min-h-screen">
        <h2 class="font-semibold mb-2 text-sm md:text-base">Detail Soal</h2>
        <fieldset>
            @if ($question->img_question)
                <img src="{{ asset('storage/' . $question->img_question) }}" alt="{{ $question->img_question }}" class="mt-3 h-auto w-auto md:h-48">
            @endif
            <p class="mt-1 text-sm leading-6 text-gray-900">{{ $question->question }}</p>
            <div class="mt-6 space-y-4">
                <div class="flex items-center gap-x-3">
                    <input id="a" name="a" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    <label for="a" class="block text-sm font-medium leading-6 text-gray-900">{{ $question->option_a }}</label>
                </div>
                <div class="flex items-center gap-x-3">
                    <input id="b" name="b" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    <label for="b" class="block text-sm font-medium leading-6 text-gray-900">{{ $question->option_b }}</label>
                </div>
                <div class="flex items-center gap-x-3">
                    <input id="c" name="c" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    <label for="c" class="block text-sm font-medium leading-6 text-gray-900">{{ $question->option_c }}</label>
                </div>
                <div class="flex items-center gap-x-3">
                    <input id="d" name="d" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    <label for="d" class="block text-sm font-medium leading-6 text-gray-900">{{ $question->option_d }}</label>
                </div>
                <div class="flex items-center gap-x-3">
                    <input id="e" name="e" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    <label for="e" class="block text-sm font-medium leading-6 text-gray-900">{{ $question->option_e }}</label>
                </div>
            </div>
        </fieldset>
    </div>
</div>
@endsection